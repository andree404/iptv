<?php 
header('Content-type: Application/x-mpegURL');  
  
error_reporting(0); 
  
$v4nt4t = "http://tvn.x10.bz/xchannel/master-18.m3u8";  
$chn = curl_init($v4nt4t);  
curl_setopt($chn, CURLOPT_RETURNTRANSFER, true);  
$kops = 'User-Agent: Mozilla/5.0 (Linux; Android 11; vivo 1904) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.115 Mobile Safari/537.36';  
curl_setopt($chn, CURLOPT_HTTPHEADER, $kops);  
$get = curl_exec($chn); 
echo $get; 
 
?>
