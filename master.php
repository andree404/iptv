<?php
echo '#EXTM3U
#EXT-X-VERSION:3
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1500000,NAME=720p,RESOLUTION=1280x720'."\n";
echo hayooo ('https://app-etslive-2.vidio.com/live/' ,'205')."\n";

function hayooo($url, $aktv){
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_URL, 'https://www.vidio.com/live/'.$aktv.'/tokens');
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = 'Authority: www.vidio.com';
    $headers[] = 'Content-Length: 0';
    $headers[] = 'Origin: https://www.vidio.com';
    $headers[] = 'X-UA-Device: mobile-smart';
    $headers[] = 'Dnt: 1';
    $headers[] = 'Accept: */*';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Referer: https://www.vidio.com/live/205-live-streaming-indosiar-tv-online-indonesia-vidio-com';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
 
    $result = json_decode($result, true);
    $token = $result['token'];
    curl_close($ch);
   
    if (preg_match("/@/", $url)) {
        $urlreq = $url.'/master.m3u8?'.$token;
    }else{
        $urlreq = $url.$aktv.'/master.m3u8?'.$token;
    }
    // echo $urlreq;
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_URL, $urlreq);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
 
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
 
    $headers = array();
    $headers[] = 'Authority: app-etslive-2.vidio.com';
    $headers[] = 'Origin: https://www.vidio.com';
    $headers[] = 'X-UA-Device: mobile-smart';
    $headers[] = 'Dnt: 1';
    $headers[] = 'Accept: */*';
    $headers[] = 'Sec-Fetch-Site: same-site';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Referer: https://www.vidio.com/';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    $result = preg_replace('/#(.*?)\n/', '', $result);
    // $result = explode("\n", );
    $result = preg_replace('/#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=(.*?)RESOLUTION(.*?)\n/', '', $result);
    $tot = count(explode("\n", $result));
    if ($tot <= 2) {
        echo " Chosthea ";
    }else{
        $dat = explode("\n", $result);
        echo $dat[0];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1200000,NAME=480p,RESOLUTION=854x480'."\n";
         $dat = explode("\n", $result);
        echo $dat[1];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=625000,NAME=360p,RESOLUTION=640x360'."\n";
         $dat = explode("\n", $result);
        echo $dat[2];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=375000,NAME=240p,RESOLUTION=426x240'."\n";
         $dat = explode("\n", $result);
        echo $dat[3];

echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1500000,NAME=720p,RESOLUTION=1280x720'."\n";
        $dat = explode("\n", $result);
        echo $dat[4];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1200000,NAME=480p,RESOLUTION=854x480'."\n";
        $dat = explode("\n", $result);
        echo $dat[5];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=625000,NAME=360p,RESOLUTION=640x360'."\n";
$dat = explode("\n", $result);
        echo $dat[6];
echo '
#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=375000,NAME=240p,RESOLUTION=426x240'."\n";
        $dat = explode("\n", $result);
        echo $dat[7];
        preg_match_all('/(.*?)_720(.*?)\n/', $result, $match);
         preg_match_all('/(.*?)_480(.*?)\n/', $result, $match);
          preg_match_all('/(.*?)_360(.*?)\n/', $result, $match);
          preg_match_all('/(.*?)_240(.*?)\n/', $result, $match);
        // preg_match_all('/(.*?)_720(.*?)\n/', $result, $match);
        if (count($match[0])<=1) {
            preg_match_all('/(.*?)_720(.*?)\n/', $result, $match);
                if (count($match[0])<=1) {
                preg_match_all('/(.*?)_720(.*?)\n/', $result, $match);
            }
        }
        // var_dump($match[0]); //ini buat manggil result cuman resolusi 720p
        // var_dump(explode("\n", $result)); // Ini buat liat semua resolusi
        // echo $result[5]; // ini buat manggil result index ke 5 /hls-b/ ingest_205_720p
    }
 
    curl_close($ch);
 
   
}
?>