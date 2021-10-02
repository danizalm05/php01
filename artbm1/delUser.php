<?php 
  //session_start(); 
  include('classes/DB.php');
  $parm=array(':id'=> $_GET['id'] );
  $q = "DELETE FROM users WHERE id =  :id";			 
  DB::query($q, $parm);
  $p='users.php'; 
  echo '<script> location.replace("'.$p.'");</script>'; 
?>

 
