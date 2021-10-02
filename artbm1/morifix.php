<!DOCTYPE html>
 

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Spider</title>

    <!-- Bootstrap 
    <link href="css/bootstrap.min.css" rel="stylesheet">-->
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  
	                       integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
						   crossorigin="anonymous">
	
	<link href="css/custom.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                                                                          rel="stylesheet">
     
	<!--script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script-->																  
																		  
  </head>
<body>
  
<div class="container">
  <div class="row"> 
    <?php include('up-menu.php'); ?>
 </div>
 </div> <!-- end of--<div class="container"> --> 
  
 
 <div class="row">
    <div class="col-md-1"> 
	<h1> left</h1>
	 
	 
  </div>
 
 <div class="col-md-10">
 
  <?php  
 //include('simple_html_dom.php');
 include_once ('simple_html_dom.php');
 if (isset($_POST['new-word'])) {
          // echo $_POST['new-word'];
		   $word =$_POST['new-word'];;
 }		   
		   


  
$url  = 'http://www.morfix.co.il/pages/sentenceoftheday/list';
$html = file_get_html($url);

 //get the qustions
foreach( $html->find('div[class="content linkableSentence"]') as $key => $info) {
	        $qustion[$key] =  $info->plaintext;
} 
 
foreach( $html->find('div[class="transcription"]') as $key => $info) {
	        $englis_answer[$key] =  $info->plaintext;
}

foreach( $html->find('div[class="explenation"]') as $key => $info) {
	        $hebrow_answer[$key] =  $info->plaintext;
}



?>
<form id="frm"action="morifix.php" method="post" class="navbar-form navbar-left">
  Input New Word:<br>
   <div class="form-group">
       <input type="text" name="new-word" value="" placeholder="name" class="form-control">
   
    <input type="submit" name="send"  class="btn btn-default" value="Translate">
   </form> 
  </div>
  <div>
  <br><hr> 
   <p id="wrd">
     <h1 id="word">aaaa </h1> 
     <h1 id="translation">bbb </h1>
   </p>
  </div >
  
  <script>
     //PHP Front To Back [Part 18] - PHP & AJAX

	function showSuggestion(str){
			if(str.length == 0){
				document.getElementById('output').innerHTML = '';
			} else {
				// AJAX REQ
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById('output').innerHTML = this.responseText;
						//echo 'this.responseText =' .this.responseText;
					}
				}
				xmlhttp.open("GET", "suggest.php?q="+str, true);
				xmlhttp.send();
			}
		}
	</script>
 
 <?php
  if (isset($_POST['new-word'])) {
	 
    echo '<br> <hr>'.$word; 	  
   $url = 'http://www.morfix.co.il/'. $word;
   $dom = file_get_html($url);
  
   foreach( $dom->find('div[class="translation translation_he heTrans"]') as $key => $info) {
	        $wrd[$key] =  $info->plaintext;
    }
   if(!empty($wrd)) {
     $i=0;
     foreach ($wrd as $q) {
         echo  '<b>'.$q."</b><br />\n"    ;	
	 $i++;	 
     } 
   }
   else {
	 echo "<br><b>No Translation for word </b>". $word;
  }
  }//
 

?>
 <p id="Array">
  
  <?php 
   $i=0;
     echo ('<br/><br/><br/> ');
    foreach ($qustion as $q) {
      echo ($i).'. <b>'.$q."</b><br />\n _". $englis_answer[$i]."<br />\n _". $hebrow_answer[$i]."<br />\n ";
	 $i++;
    }
   ?>
  
 </p>
 