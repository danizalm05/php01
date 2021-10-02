<?php 
  session_start(); 
  include('classes/DB.php');
 /*if (!isset($_SESSION['username'])) {
		 exit();  
	}*/
  $parm=array(':id'=> $_GET['id'] );
  $q = "DELETE FROM paintings WHERE id =  :id";			 
  DB::query($q, $parm);
 
  $p='ArtistPaintings.php?artist_id='.$_GET['artist_id'].'&artist_name='.$_GET['artist_name'];
 // header($p);   
  echo '<script> location.replace("'.$p.'");</script>';
?>

 
