<?php
header('Content-type: text/plain');
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
$IP = $_SERVER['REMOTE_ADDR'] . "\n";
$file = fopen('logs.txt', 'a');
fwrite($file, $IP);
fclose($file);
?>
#EXTM3U

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Canal_Sony_logo.svg/1113px-Canal_Sony_logo.svg.png" group-title="TOP PLUS", Sony TP+
http://tv.topflash.ml:8880/channel/sony/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Natgeo_Kids_logo.svg/1200px-Natgeo_Kids_logo.svg.png" group-title="TOP PLUS", Nat Geo Kids TP+
http://tv.topflash.ml:8880/channel/natgeokids/auto.m3u8

#EXTINF:-1 tvg-logo="http://midia.gruposinos.com.br/_midias/png/2016/03/15/history_channel_logo-1375411.png" group-title="TOP PLUS", History TP+
http://tv.topflash.ml:8880/channel/history/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/2015_Discovery_theater_HD_logo.svg/1280px-2015_Discovery_theater_HD_logo.svg.png" group-title="TOP PLUS", Discovery Theater TP+
http://tv.topflash.ml:8880/channel/discoverytheater/auto.m3u8

#EXTINF:-1 tvg-logo="https://s2.glbimg.com/YmzFXfqM7A_fRwhbMp3AzjPpwEw=/s3.glbimg.com/v1/AUTH_180b9dd048d9434295d27c4b6dadc248/media_kit/3c/45/8e98b42584b1a930aee9241e73fa.png" group-title="TOP PLUS", Megapix TP+
http://tv.topflash.ml:8880/channel/megapix/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2018/05/gloob-logo.png" group-title="TOP PLUS", Gloob TP+
http://tv.topflash.ml:8880/channel/gloob/auto.m3u8

#EXTINF:-1 tvg-logo="http://ik.imagekit.io/ulangotv/image/upload/3783270_logo_discovery_science_1_uk.png" group-title="TOP PLUS", Discovery Science TP+
http://tv.topflash.ml:8880/channel/discoveryscience/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/e/e6/Maxup.png" group-title="TOP PLUS", Max Up TP+
http://tv.topflash.ml:8880/channel/maxup/auto.m3u8

#EXTINF:-1 tvg-logo="https://fontmeme.com/images/disney-xd-logo.png" group-title="TOP PLUS", Disney XD TP+
http://tv.topflash.ml:8880/channel/disneyxd/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/kXOuYAB.png" group-title="TOP PLUS", Discovery Civilization TP+
http://tv.topflash.ml:8880/channel/discoverycivilization/auto.m3u8

#EXTINF:-1 tvg-logo="http://www.blogdasky.com.br/wp-content/uploads/2019/07/maxprime-hd.png" group-title="TOP PLUS", Max Prime TP+
http://tv.topflash.ml:8880/channel/maxprime/auto.m3u8

#EXTINF:-1 tvg-logo="http://1.bp.blogspot.com/-3qUYaC7kdPM/TX5g5ewPLKI/AAAAAAAAAfk/uuezfFY76to/s1600/DisneyJunior.png" group-title="TOP PLUS", Disney Junior TP+
http://tv.topflash.ml:8880/channel/disneyjunior/auto.m3u8

#EXTINF:-1 tvg-logo="https://cf-media.press.discovery.com/ugc/logos/2009/08/22/DSC_D_pos.png" group-title="TOP PLUS", Discovery TP+
http://tv.topflash.ml:8880/channel/discovery/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Max_%28channel%29.svg/1200px-Max_%28channel%29.svg.png" group-title="TOP PLUS", Max TP+
http://tv.topflash.ml:8880/channel/max/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/Gz91k2L.jpg" group-title="TOP PLUS", Disney TP+
http://tv.topflash.ml:8880/channel/disney/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/CicS5Nw.jpg" group-title="TOP PLUS", Animal Planet TP+
http://tv.topflash.ml:8880/channel/animalplanet/auto.m3u8

#EXTINF:-1 tvg-logo="https://cdn.reweb.io/hagah/image/pR8JkJoEn-xGIY1l9RcsU8XHVhQ=/300x300/top/smart/hagah/4/48/hbo-signature-hd-4884f78c.jpg" group-title="TOP PLUS", HBO Signature TP+
http://tv.topflash.ml:8880/channel/hbosignature/auto.m3u8

#EXTINF:-1 tvg-logo="http://cm1.narvii.com/7087/ec88f2f7d9805eb341824f5fa6acca09457d308b_00.jpg" group-title="TOP PLUS", Cartoon Network TP+
http://tv.topflash.ml:8880/channel/cartoon/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/79dNtTP.jpg" group-title="TOP PLUS", Food Network TP+
http://tv.topflash.ml:8880/channel/foodnetwork/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/3/3d/HBO_Plus.png" group-title="TOP PLUS", HBO Plus TP+
http://tv.topflash.ml:8880/channel/hboplus/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/6/62/Discovery_kids_logo.png" group-title="TOP PLUS", Discovery Kids TP+
http://tv.topflash.ml:8880/channel/discoverykids/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/a/af/TLC-Logo_2016.png" group-title="TOP PLUS", TLC TP+
http://tv.topflash.ml:8880/channel/tlc/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/3/3a/HBO_Family_logo.png" group-title="TOP PLUS", HBO Family TP+
http://tv.topflash.ml:8880/channel/hbofamily/auto.m3u8

#EXTINF:-1 tvg-logo="https://www.directv.com/images/logos/channels/dark/large/217.png" group-title="TOP PLUS", Boomerang TP+
http://tv.topflash.ml:8880/channel/boomerang/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/e/ee/Logo_Canal_OFF.png" group-title="TOP PLUS", OFF TP+
http://tv.topflash.ml:8880/channel/off/auto.m3u8

#EXTINF:-1 tvg-logo="https://cdn.mitvstatic.com/channels/mx_hbo-2_m.png" group-title="TOP PLUS", HBO 2 TP+
http://tv.topflash.ml:8880/channel/hbo2/auto.m3u8

#EXTINF:-1 tvg-logo="https://multiplaytelecom.com.br/wp-content/uploads/canais/-13.png" group-title="TOP PLUS", Premiere Clubes TP+
http://tv.topflash.ml:8880/channel/premiereclubes/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2017/03/multishow-logo.png" group-title="TOP PLUS", Multi Show TP+
http://tv.topflash.ml:8880/channel/multishow/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2017/04/hbo-logo.png" group-title="TOP PLUS", HBO TP+
http://tv.topflash.ml:8880/channel/hbo/auto.m3u8

#EXTINF:-1 tvg-logo="https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/premiere.jpg" group-title="TOP PLUS", Premiere 2 TP+
http://tv.topflash.ml:8880/channel/premiere2/auto.m3u8

#EXTINF:-1 tvg-logo="https://www.freepnglogos.com/uploads/mtv-png-logo/mtv-music-awards-png-logo-3.png" group-title="TOP PLUS", MTV TP+
http://tv.topflash.ml:8880/channel/mtv/auto.m3u8

#EXTINF:-1 tvg-logo="https://help.foxplay.com/hc/article_attachments/360023498272/FOX_Premium_2_HD.png" group-title="TOP PLUS", Fox Premium 2 TP+
http://tv.topflash.ml:8880/channel/foxpremium2/auto.m3u8

#EXTINF:-1 tvg-logo="https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/premiere.jpg" group-title="TOP PLUS", Premiere 3 TP+
http://tv.topflash.ml:8880/channel/premiere3/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Globosat_wordmark.svg/1280px-Globosat_wordmark.svg.png" group-title="TOP PLUS", Globosat TP+
http://tv.topflash.ml:8880/channel/maisbobosat/auto.m3u8

#EXTINF:-1 tvg-logo="https://help.foxplay.com/hc/article_attachments/360023532651/FOX_Premium.png" group-title="TOP PLUS", Fox Premium 1 TP+
http://tv.topflash.ml:8880/channel/foxpremium1/auto.m3u8

#EXTINF:-1 tvg-logo="https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/premiere.jpg" group-title="TOP PLUS", Premiere 4 TP+
http://tv.topflash.ml:8880/channel/premiere4/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/UOfJSRs.jpg" group-title="TOP PLUS", Lifetime TP+
http://tv.topflash.ml:8880/channel/lifetime/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/FOX_wordmark-orange.svg/1200px-FOX_wordmark-orange.svg.png" group-title="TOP PLUS", Fox TP+
http://tv.topflash.ml:8880/channel/fox/auto.m3u8

#EXTINF:-1 tvg-logo="https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/premiere.jpg" group-title="TOP PLUS", Premiere 5 TP+
http://tv.topflash.ml:8880/channel/premiere5/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/0/0a/Investiga%C3%A7%C3%A3o_Discovery_1.png" group-title="TOP PLUS", Investigacao Discovery TP+
http://tv.topflash.ml:8880/channel/investigacaodiscovery/auto.m3u8

#EXTINF:-1 tvg-logo="http://imagem.natelinha.uol.com.br/grande/cinemax-novologo.jpg" group-title="TOP PLUS", Cinemax TP+
http://tv.topflash.ml:8880/channel/cinemax/auto.m3u8

#EXTINF:-1 tvg-logo="https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/premiere.jpg" group-title="TOP PLUS", Premiere 6 TP+
http://tv.topflash.ml:8880/channel/premiere6/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/c/cc/Gnt_logo.jpg" group-title="TOP PLUS", GNT TP+
http://tv.topflash.ml:8880/channel/gnt/auto.m3u8

#EXTINF:-1 tvg-logo="https://seeklogo.net/wp-content/uploads/2015/11/axn-logo-vector-download.jpg" group-title="TOP PLUS", AXN TP+
http://tv.topflash.ml:8880/channel/anx/auto.m3u8

#EXTINF:-1 tvg-logo="https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/premiere.jpg" group-title="TOP PLUS", Premiere 7 TP+
http://tv.topflash.ml:8880/channel/premiere7/auto.m3u8

#EXTINF:-1 tvg-logo="https://4.bp.blogspot.com/-e4Hwf6_-Zwc/VaBmzm0DgUI/AAAAAAAAkyU/A4fPY75Fj40/s1600/Fox_life_it.png" group-title="TOP PLUS", Fox Life TP+
http://tv.topflash.ml:8880/channel/foxlife/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/AMC_logo_2016.svg/1280px-AMC_logo_2016.svg.png" group-title="TOP PLUS", AMC TP+
http://tv.topflash.ml:8880/channel/amc/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Item_sem_imagem.svg/498px-Item_sem_imagem.svg.png" group-title="TOP PLUS", Record SP TP+
http://tv.topflash.ml:8880/channel/recordsp/auto.m3u8

#EXTINF:-1 tvg-logo="https://fujixweekly.files.wordpress.com/2018/12/img_9590.jpg?w=291&h=300" group-title="TOP PLUS", Paramount TP+
http://tv.topflash.ml:8880/channel/paramount/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/PrRgYhM.jpg" group-title="TOP PLUS", Fish TV TP+
http://tv.topflash.ml:8880/channel/fishtv/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/A%26E_Network_logo.svg/1280px-A%26E_Network_logo.svg.png" group-title="TOP PLUS", A&E TP+
http://tv.topflash.ml:8880/channel/ae/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Item_sem_imagem.svg/498px-Item_sem_imagem.svg.png" group-title="TOP PLUS", Rede Bandeirantes TP+
http://tv.topflash.ml:8880/channel/redebandeirantes/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/SYFY.svg/1280px-SYFY.svg.png" group-title="TOP PLUS", Syfy TP+
http://tv.topflash.ml:8880/channel/syfy/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/World_Discovery_HD_logo.svg/1200px-World_Discovery_HD_logo.svg.png" group-title="TOP PLUS", Discovery World TP+
http://tv.topflash.ml:8880/channel/discoveryworld/auto.m3u8

#EXTINF:-1 tvg-logo="https://sport-tv-guide.live/images/stations/a1242.png" group-title="TOP PLUS", SporTV 3 TP+
http://tv.topflash.ml:8880/channel/sportv3/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Item_sem_imagem.svg/498px-Item_sem_imagem.svg.png" group-title="TOP PLUS", SBT TP+
http://tv.topflash.ml:8880/channel/sbt/auto.m3u8

#EXTINF:-1 tvg-logo="https://www.lamac.org/system/channels/logos/000/000/122/original/pic_studiouniversal.png?1522179174" group-title="TOP PLUS", Studio Universal TP+
http://tv.topflash.ml:8880/channel/studiouniversal/auto.m3u8

#EXTINF:-1 tvg-logo="http://2.bp.blogspot.com/-J72Tsxq1uWo/VG1hwAAg98I/AAAAAAAAkDs/CP1NNsI_Ayk/s1600/_0040_discovery_hh.png" group-title="TOP PLUS", Discovery Home Health TP+
http://tv.topflash.ml:8880/channel/discoveryhomehealth/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/d/d2/SporTV_2_logo_2016.png" group-title="TOP PLUS", SporTV 2 TP+
http://tv.topflash.ml:8880/channel/sportv2/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/pt/2/22/Logotipo_da_Rede_Globo.png" group-title="TOP PLUS", Globo RJ TP+
http://tv.topflash.ml:8880/channel/globorj/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.pinimg.com/originals/6e/bc/67/6ebc6747054e38075f835398fe5ee3c8.png" group-title="TOP PLUS", Space TP+
http://tv.topflash.ml:8880/channel/space/auto.m3u8

#EXTINF:-1 tvg-logo="https://pbs.twimg.com/profile_images/1158491387307974656/88fr9ZBb_400x400.jpg" group-title="TOP PLUS", Comedy Central TP+
http://tv.topflash.ml:8880/channel/comedycentral/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2017/07/sportv-logo.png" group-title="TOP PLUS", SporTV TP+
http://tv.topflash.ml:8880/channel/sportv/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/FX_International_logo.svg/1280px-FX_International_logo.svg.png" group-title="TOP PLUS", Fx TP+
http://tv.topflash.ml:8880/channel/fx/auto.m3u8

#EXTINF:-1 tvg-logo="https://pbs.twimg.com/profile_images/1080522229492998144/Eckl0Y2H.jpg" group-title="TOP PLUS", BIS TP+
http://tv.topflash.ml:8880/channel/bis/auto.m3u8

#EXTINF:-1 tvg-logo="https://www.tvmagazine.com.br/imagens/icones/600/foxsports2.png" group-title="TOP PLUS", Fox Sports 2 TP+
http://tv.topflash.ml:8880/channel/foxsports2/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Warner2018LA.png/200px-Warner2018LA.png" group-title="TOP PLUS", Warner TP+
http://tv.topflash.ml:8880/channel/warner/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Logo_of_Curta%21.svg/528px-Logo_of_Curta%21.svg.png" group-title="TOP PLUS", Curta TP+
http://tv.topflash.ml:8880/channel/curta/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/pt/d/dd/Fox_Sports_Logo.png" group-title="TOP PLUS", Fox Sports TP+
http://tv.topflash.ml:8880/channel/foxsports/auto.m3u8

#EXTINF:-1 tvg-logo="https://www.lamac.org/system/channels/logos/000/000/122/original/pic_studiouniversal.png?1522179174" group-title="TOP PLUS", Universal TP+
http://tv.topflash.ml:8880/channel/universal/auto.m3u8

#EXTINF:-1 tvg-logo="https://sigaband.files.wordpress.com/2013/11/8502a-arte_1_logo-svg.png" group-title="TOP PLUS", Arte 1 TP+
http://tv.topflash.ml:8880/channel/arte1/auto.m3u8

#EXTINF:-1 tvg-logo="https://3.bp.blogspot.com/-TNq_WQvu70w/WVrJrd2fhWI/AAAAAAAA8KQ/J02VFD8ys-sKxshHsgbLuXVBJIH_IYlawCLcBGAs/s1600/espnextra.png" group-title="TOP PLUS", ESPN Extra TP+
http://tv.topflash.ml:8880/channel/espnextra/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/7/75/TNT_Series_Logo_2016.png" group-title="TOP PLUS", TNT Series TP+
http://tv.topflash.ml:8880/channel/tntseries/auto.m3u8

#EXTINF:-1 tvg-logo="https://www.lamac.org/system/channels/logos/000/000/121/original/pic_e.png?1522179166" group-title="TOP PLUS", E! TP+
http://tv.topflash.ml:8880/channel/eentertainmenttelevision/auto.m3u8

#EXTINF:-1 tvg-logo="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/052016/untitled-1_242.png?itok=nRWq5scp" group-title="TOP PLUS", ESPN TP+
http://tv.topflash.ml:8880/channel/espn/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/6/68/Logo_TNT_Series.png" group-title="TOP PLUS", TNT TP+
http://tv.topflash.ml:8880/channel/tnt/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/en/thumb/6/66/Viva_%28UK_%26_Ireland%29.svg/1200px-Viva_%28UK_%26_Ireland%29.svg.png" group-title="TOP PLUS", Canal Viva TP+
http://tv.topflash.ml:8880/channel/viva/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/pt/2/22/Logotipo_da_Rede_Globo.png" group-title="TOP PLUS", Globo Nordeste
http://tv.topflash.ml:8880/channel/globonordeste/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/ESPN2_logo.svg/1280px-ESPN2_logo.svg.png" group-title="TOP PLUS", ESPN 2 TP+
http://tv.topflash.ml:8880/channel/espn2/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/3/3b/Telecine_Cult.png" group-title="TOP PLUS", Telecine Cult TP+
http://tv.topflash.ml:8880/channel/telecinecult/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/pt/c/c7/Logotipo_da_Record_News_%282016%29.png" group-title="TOP PLUS", Record News TP+
http://tv.topflash.ml:8880/channel/recordnews/auto.m3u8

#EXTINF:-1 tvg-logo="https://pbs.twimg.com/profile_images/430750962920067072/xfNoZ7Rz_400x400.jpeg" group-title="TOP PLUS", ESPN Brasil TP+
http://tv.topflash.ml:8880/channel/espnbrasil/auto.m3u8

#EXTINF:-1 tvg-logo="https://cdn.mitvstatic.com/channels/br_telecine-pipoca-hd_m.png" group-title="TOP PLUS", Telecine Pipoca TP+
http://tv.topflash.ml:8880/channel/telecinepipoca/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2017/07/globo-news-logo.png" group-title="TOP PLUS", Globo News TP+
http://tv.topflash.ml:8880/channel/globonews/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/4MhDi01.png" group-title="TOP PLUS", Discovery Turbo TP+
http://tv.topflash.ml:8880/channel/discoveryturbo/auto.m3u8

#EXTINF:-1 tvg-logo="https://cdn.mitvstatic.com/channels/br_telecine-fun_m.png" group-title="TOP PLUS", Telecine Fun TP+
http://tv.topflash.ml:8880/channel/telecinefun/auto.m3u8

#EXTINF:-1 tvg-logo="https://i2.wp.com/www.polemicaparaiba.com.br/wp-content/uploads/2016/03/band-news-logo.jpg?ssl=1" group-title="TOP PLUS", Bands News TP+
http://tv.topflash.ml:8880/channel/bandsnews/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/HIQZ5Bu.png" group-title="TOP PLUS", Combate TP+
http://tv.topflash.ml:8880/channel/combate/auto.m3u8

#EXTINF:-1 tvg-logo="https://cdn.mitvstatic.com/channels/br_telecine-touch_m.png" group-title="TOP PLUS", Telecine Touch TP+
http://tv.topflash.ml:8880/channel/telecinetouch/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/ZooMoo_logo.svg/1200px-ZooMoo_logo.svg.png" group-title="TOP PLUS", Zoomoo TP+
http://tv.topflash.ml:8880/channel/zoomoo/auto.m3u8

#EXTINF:-1 tvg-logo="https://2.bp.blogspot.com/-5Os7PC_lrg4/Wwb55yA3e8I/AAAAAAAAyyg/KbCQuquBQ5clveFRbdz8ludy-oES-xLYwCLcBGAs/s1600/logo-bandsports.jpg" group-title="TOP PLUS", Band Sports TP+
http://tv.topflash.ml:8880/channel/bandsports/auto.m3u8

#EXTINF:-1 tvg-logo="https://sky.vteximg.com.br/arquivos/ids/156144/telecine-action-hd.png?v=636446361920170000" group-title="TOP PLUS", Telecine Action TP+
http://tv.topflash.ml:8880/channel/telecineaction/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Tooncast_logo.svg/1200px-Tooncast_logo.svg.png" group-title="TOP PLUS", Tooncast TP+
http://tv.topflash.ml:8880/channel/tooncast/auto.m3u8

#EXTINF:-1 tvg-logo="http://prn.fm/wp-content/uploads/2015/04/natgeo.png" group-title="TOP PLUS", Nat Geo TP+
http://tv.topflash.ml:8880/channel/natgeo/auto.m3u8

#EXTINF:-1 tvg-logo="https://sky.vteximg.com.br/arquivos/ids/156152/telecine-premium-hd.png?v=636446362769900000" group-title="TOP PLUS", Telecine Premium TP+
http://tv.topflash.ml:8880/channel/telecinepremium/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2018/11/nick-jr-logo.png" group-title="TOP PLUS", Nick Jr TP+
http://tv.topflash.ml:8880/channel/nickjr/auto.m3u8

#EXTINF:-1 tvg-logo="https://yt3.ggpht.com/a/AGF-l79MrcMepj4fnV0aaam0uq0P3zVDDfjqgirC9A=s900-c-k-c0xffffffff-no-rj-mo" group-title="TOP PLUS", Nat Geo Wild TP+
http://tv.topflash.ml:8880/channel/natgeowild/auto.m3u8

#EXTINF:-1 tvg-logo="https://upload.wikimedia.org/wikipedia/commons/e/ef/Turner_Classic_Movies_%28TCM%2C_Latin_America%29_-_2015_logo.png" group-title="TOP PLUS", TCM TP+
http://tv.topflash.ml:8880/channel/tcm/auto.m3u8

#EXTINF:-1 tvg-logo="https://logodownload.org/wp-content/uploads/2018/11/nickelodeon-logo.png" group-title="TOP PLUS", Nick TP+
http://tv.topflash.ml:8880/channel/nick/auto.m3u8

#EXTINF:-1 tvg-logo="https://i.imgur.com/8or06cR.jpg" group-title="TOP PLUS", History 2 TP+
http://tv.topflash.ml:8880/channel/history2/auto.m3u8
