  <?php 

include("simple_html_dom.php");
 


function WebScan(){
	
	$cellTag = 'td[class=listItem] a em';
    $ArtistTag = 'td[class=listItem]';
	$url  = 'http://www.the-athenaeum.org/art/random.php';
	$html = file_get_html($url);	
 
   foreach( $html->find($cellTag) as $key => $info) {
	         $title[$key] =  $info->plaintext;
    }
 
  foreach( $html->find( $ArtistTag) as $key => $info) {
	         $artist[$key] =  $info->plaintext;
   }


  $i=0;
  foreach ( $title as $t) {
     $artist[$i] = substr( $artist[$i], strlen ($t)+3);
	$parts = explode("(", $artist[$i]);
    $artist[$i]= $parts['0'];	
 
 	$i++;
 }
 
  $paintinglnk='http://www.the-athenaeum.org/';
 $i=0;
  foreach($html->find('a') as $e) {  //find all links
    $lnk[ $i] = $paintinglnk . $e->href; 
    $i++;
  }
  
 $max = sizeof($title);
 for($i = 0; $i < $max;$i++){
    $lnk[$i]=$lnk[3+2* $i];
  }
 

// Retrieve all images and print their SRCs
$i = 0;
foreach($html->find('img') as $e){
   $imag[$i]= $paintinglnk.$e->src;
  $i++;
}
 
 return array($lnk, $imag,$title,$artist);
  
}

  


function  PaintingTable($ar){
   
 
 $lnk = $ar[0];
 $imag= $ar[1];
 $title= $ar[2];
 $artist= $ar[3];
 
echo '<table width="98%" bgcolor="#0c0F0F" cellspacing="0" cellpadding="6" border="0" bordercolor="#F9F9F9">';
  $i=0;  
 
  
 for ($row = 0; $row < 3; $row ++) {
 echo "<tr>";
  for ($col = 1; $col <= 4; $col ++) {
   $id_num = substr($lnk[$i], strpos($lnk[$i], "=") + 1); 
   echo '<td class="listItem" valign="top" align="center" width="33%">';
   echo  '<form action="GetPainting.php" method="POST" target="_blank">';
   echo    '<input type="hidden" name="pic_id" value="'.$id_num.'"/>';
   echo    '<input type="hidden" name="artist_name"" value="'.$artist[$i].'"/>';
   
   echo    '<input type="hidden" name="title" value="'.$title[$i].'"/>';
   echo    '<button type="submit" width="48" height="48">';
   echo         '<img src="'.$imag[$i].'"  />';
   echo    '</button>';
  
   echo  '</form>';
   
   echo   '<b><font color="gray">'.$title[$i].'</font></b><br>';
   $artist_name = str_replace(' ', '_', $artist[$i]);   
   echo  '<a href="https://en.wikipedia.org/wiki/'. $artist_name.'">';
   echo  '<font color="white">'.$artist[$i].'</font></a><br>';
   
   
   $yandex = 'https://www.yandex.com/images/search?text='. $imag[$i];
    $yandex = $yandex.'&img_url='. $imag[$i] .'&rpt=imageview';
    echo '<a href = "'. $yandex.'" target="_blank">Ydx </a>';
        
	$google = 'https://www.google.co.il/search?tbm=isch&q='.$imag[$i];
	echo '<a href = "'. $google.'" target="_blank">'.' Gg</a>';
   
   
   
   echo "</td>";
   $i++;
  }                
 
 echo "</tr>";
}
echo "<tr>";
    echo '<td  valign="top" align="center">';
	echo '</td>';
 echo "</tr>";
echo "</table>";
   
 }
  $internetConnection = checkdnsrr('php.net');// ? print 1: print 0; // " prints" 1 (If internet is ON)
  
 if ($internetConnection){
    $ar=  WebScan();
    $title= $ar[2]; 
 
    PaintingTable($ar);	
	$ar=  WebScan();
    PaintingTable($ar);	
	 
 }else {
	echo '<H1> No Internet Connection </H1><br>'; 
 }  
  
?> 
  
 
 
 
    