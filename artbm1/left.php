<?php  session_start();
	 
   if (!isset($_SESSION['username'])) {
		 $_SESSION['msg'] = "You must log in first";
		 echo '<script> location.replace("classes/login.php");</script>';
	 }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: classes/login.php");
	}
  
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nurman Art BookMarks</title>

    <!-- Bootstrap 
    <link href="css/bootstrap.min.css" rel="stylesheet">-->
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  
	     integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		 crossorigin="anonymous">
	
	<link href="css/custom.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                                                                          rel="stylesheet">
 </head>
<body>
  
<div class="container">
  <div class="row"> 
    <?php include('up-menu.php'); ?>
 </div>
</div> <!-- end of--<div class="container"> --> 
  
 
 <div class="row">
    <div class="col-md-1"> 
	<h1>Links</h1>
	<a href="https://www.wikiart.org/en/artists-by-art-movement/">Movements </a><br>
    <a href="https://www.wikiart.org/en/App/Painting/Random">Wikiart</a><br>
	<a href="https://www.nationalgallery.org.uk/">N-gallery</a><br>
	<a href="https://www.allartclassic.com/">allartclassic</a><br>
	<a href="http://artodyssey1.blogspot.de/">Artodyssey1</a><br>
	 
	
</div>
 
 <div class="col-md-10"> 
  