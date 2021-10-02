<?php
   

 $ip='0.0.0.0';
 $ip=$_SERVER['REMOTE_ADDR'];
 $clientDetails = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
 


 if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'] ;
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check if ip is pass from proxy
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'] ;
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }

$file = 'ip-data.txt';  //file to which the IP address will be written.

$fp = fopen($file, 'a');
$str = "\r\n[".$ipaddress.'-'. date("Y/m/d").':'. date("h:m").'] -' .$clientDetails->country  ;
$str = $str.'-' .$clientDetails->city .'-' .$clientDetails->region;
$str = $str.'-' .$clientDetails->org;

 fwrite($fp, $str);
//echo $str;
fclose($fp);




 ?>