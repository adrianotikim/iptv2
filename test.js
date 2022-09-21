var fs = require('fs');
var crypto = require('crypto');
var iv = new Buffer(16);
//iv.fill(0);

var key = fs.readFileSync('hls.key');

var decipher = crypto.createDecipheriv('aes128', key, iv);
var encrypted = fs.createReadStream('abc.ts');
var output;
encrypted.on('data', (chunk) => {
  if(!output){
      output = decipher.update(chunk);
  } else {
      output = Buffer.concat([output, decipher.update(chunk)]);
  }
});
setTimeout(() => {
   var t = fs.createWriteStream('test.ts');
   t.write(output);
   t.end();
  console.log('def');
}, 3000);
