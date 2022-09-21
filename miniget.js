const http        = require('http');
const https       = require('https');
const urlParse    = require('url').parse;
const PassThrough = require('stream').PassThrough;
const randomIpv6  = require('random-ipv6');

const httpLibs = { 'http:': http, 'https:': https };
const redirectCodes = { 301: true, 302: true, 303: true, 307: true };
const defaults = {
  no_encoding: true,
  maxRedirects: 2,
  maxRetries: 2,
  maxReconnects: 0,
  backoff: { inc: 100, max: 10000 },
  highWaterMark: null,
  transform: null,
  acceptEncoding: null,
  timeout: 10000
};

/**
* @param {string} url
* @param {!Object} options
* @param {!Function(Error, http.IncomingMessage, string)} callback
* @return {stream.Readable}
*/
module.exports = (url, options, callback) => {
  if (typeof options === 'function') {
    callback = options;
    options = {};
  } else if (!options) {
    options = {};
  }
  options = Object.assign({}, defaults, options);
  const stream = new PassThrough({ highWaterMark: options.highWaterMark });
  let myreq, myres;
  let aborted = false;
  let redirects = 0;
  let retries = 0;
  let retryTimeout;
  let reconnects = 0;
  let contentLength;
  let acceptRanges = false;
  let rangeStart = 0, rangeEnd;
  let downloaded = 0;

  // Check if this is a ranged request.
  if (options.headers && options.headers.Range) {
    let r = /bytes=(\d+)-(\d+)?/.exec(options.headers.Range);
    if (r) {
      rangeStart = parseInt(r[1], 10);
      rangeEnd = parseInt(r[2], 10);
    }
  }

  // Add `Accept-Encoding` header.
  if (options.acceptEncoding) {
    options.headers = Object.assign({
      'Accept-Encoding': Object.keys(options.acceptEncoding).join(', ')
    }, options.headers);
  }

  const doRetry = (err, statusCode) => {
    if (aborted) { return false; }
    // If there is an error when the download has already started,
    // but not finished, try reconnecting.
    if (myres && 0 < downloaded) {
      if (acceptRanges && downloaded < contentLength &&
        reconnects++ < options.maxReconnects) {
        myres = null;
        retries = 0;
        let ms = Math.min(options.backoff.inc, options.backoff.max);
        retryTimeout = setTimeout(doDownload, ms);
        stream.emit('reconnect', reconnects, err);
        return true;
      }
    } else if ((!statusCode || err.message === 'ENOTFOUND') &&
      retries++ < options.maxRetries) {
      let ms = Math.min(retries * options.backoff.inc, options.backoff.max);
      retryTimeout = setTimeout(doDownload, ms);
      stream.emit('retry', retries, err);
      return true;
    }
    return false;
  };

  const onRequestError = (err, statusCode) => {
    if (!doRetry(err, statusCode)) {
      stream.emit('error', err);
    }
  };

  const doDownload = () => {
    if (!url || aborted) { return; }

    let parsed = urlParse(url);
	
	if(options.headers){
		if(options.headers.proxy_url){
			if(options.headers.sessions){
				Object.keys(options.headers.sessions).forEach((key) => {
					var ret = options.headers.sessions[key]();
					options.headers.proxy_url = options.headers.proxy_url.replace('{'+key+'}', ret);
				});
			}
			var host = options.headers.proxy_url.split('@');
			host = host[host.length - 1];
			var port = host.split(':').length > 1 ? host.split(':')[1] : '80';
			host = host.split(':')[0];
			
			var protocol = 'http';
			
			var user_pass = options.headers.proxy_url.split(host)[0];
			if(user_pass[user_pass.length - 1] == '@'){
			   user_pass = user_pass.substr(0, user_pass.length - 1);
			}
			if(user_pass.includes('://')){
				protocol = user_pass.includes('http:') ? 'http' : 'https';
				user_pass = user_pass.split('://')[1];
			}
			
			var auth = 'Basic ' + new Buffer(user_pass).toString('base64');
			
			let or_host = parsed.host;
			parsed.host = host;
			parsed.hostname = host;
			parsed.port = port;
			parsed.path = url;
			options.headers = Object.assign(options.headers, {
				"Host": or_host,
				"Proxy-Authorization": auth
			});
		}
	}
    let httpLib = httpLibs[parsed.protocol];
    if (!httpLib) {
      stream.emit('error', Error('Invalid URL: ' + url));
      return;
    }

    Object.assign(parsed, options);
    for (let key in defaults) {
      delete parsed[key];
    }
    if (acceptRanges && downloaded > 0) {
      let start = downloaded + rangeStart;
      let end = rangeEnd || '';
      parsed.headers = Object.assign({}, parsed.headers, {
        Range: `bytes=${start}-${end}`
      });
    }

    if (options.transform) {
      parsed = options.transform(parsed);
      if (parsed.protocol) {
        httpLib = httpLibs[parsed.protocol];
      }
    }

    if(parsed.ipv6){
        parsed.localAddress = parsed.ipv6.ip;
        if(parsed.ipv6.random)
            parsed.localAddress = randomIpv6(parsed.ipv6.ip, parsed.ipv6.random);
    }
    myreq = httpLib.get(parsed, (res) => {
      if (redirectCodes[res.statusCode] === true) {
        if (redirects++ >= options.maxRedirects) {
          stream.emit('error', Error('Too many redirects'));
        } else {
          url = res.headers.location;
          stream.emit('redirect', url);
          doDownload();
        }
        return;
      } else if (res.statusCode < 200 || 400 <= res.statusCode) {
        let err = Error('Status code: ' + res.statusCode);
        //process.exit(0);
        if (res.statusCode >= 500) {
          onRequestError(err, res.statusCode);
        } else {
          stream.emit('error', err);
        }
        return;
      }
      let decoded = res;
      const cleanup = () => {
        res.removeListener('data', ondata);
        decoded.removeListener('end', onend);
        decoded.removeListener('error', onerror);
        res.removeListener('error', onerror);
      };
      const ondata = (chunk) => { downloaded += chunk.length; };
      const onend = () => {
        cleanup();
        if (!doRetry()) {
          stream.end();
        }
      };
      const onerror = (err) => {
        cleanup();
        onRequestError(err);
      };

      if (options.acceptEncoding && res.headers['content-encoding']) {
        for (let enc of res.headers['content-encoding'].split(', ').reverse()) {
          let fn = options.acceptEncoding[enc];
          if (fn != null) {
            decoded = decoded.pipe(fn(decoded));
            decoded.on('error', onerror);
          }
        }
      }
      if (!contentLength) {
        contentLength = parseInt(res.headers['content-length'], 10);
        acceptRanges = res.headers['accept-ranges'] === 'bytes' &&
          contentLength > 0 && options.maxReconnects > 0;
      }
      res.on('data', ondata);
      decoded.on('end', onend);
      decoded.pipe(stream, { end: !acceptRanges });
      myres = decoded;
      stream.emit('response', res);
      res.on('error', onerror);
    });
    myreq.on('error', onRequestError);
    stream.emit('request', myreq);
	
	myreq.setTimeout( options.timeout, function( ) {
		myreq.abort();
	});
	
  };

  stream.abort = () => {
    aborted = true;
    stream.emit('abort');
    if (myreq) { myreq.abort(); }
    if (myres) { myres.unpipe(stream); }
    clearTimeout(retryTimeout);
  };

  process.nextTick(doDownload);
  if (callback) {
    let body = '';
	if(!options.no_encoding)
       stream.setEncoding('utf8');
   
    stream.on('data', (chunk) => { body += chunk; });
    stream.on('end', () => { callback(null, myres, body); });
    stream.on('error', callback);
  }
  return callback ? null : stream;
};
