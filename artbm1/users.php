<?php 
 include('left.php'); 
 include("simple_html_dom.php");
 require_once ('classes/DB.php'); 
  
$sql='SELECT  id,email,username,password 
	   FROM       users 
	   ORDER BY   username';
  
  $rows = DB::query($sql,array());
  $counter = count( $rows);  
 
  echo '<br> '.'Number of users  ' . $counter.'<br> ';
  if ($counter < 2){ //Do not delete the laste user
	echo ' '.$rows[0]["username"]. ' : ' ;
	echo $rows[0]["email"]. '  ' ;  
	echo '<br> ';  
  }

  else {// more than on user so can delete 
  for ($i = 0; $i <  $counter; $i++) {
     
     echo $i+1 .': '.$rows[$i]["username"]. ' : ' ;
	 echo $rows[$i]["email"]. '  ' ;
       
	 echo '[<a href="delUser.php?id='. $rows[$i]["id"].'">';
     echo 'Dell</a>]</font><br>';
	 echo '<br> ';
   }
  }
include('right.php');
?> 
  
 
 
    