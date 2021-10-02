<?php  include('left.php');
     require_once ('classes/DB.php');
     define("NUM_OF_COLUMN",6);
   //List artists from one movment
  
   $sql='SELECT  title,notes 
	      FROM       movement
		  WHERE  id = '.$_GET['id'];//id  of movment

  $movement_name = DB::query($sql,array());
  
   
  echo '<h1 align= "center">'.$movement_name[0]['title'].'</h1>';
  echo '<h3 align= "left">'.$movement_name[0]['notes'].'</h3>';
  $sql='SELECT  id,name,pic 
	    FROM       artists
		WHERE movement="'.$movement_name[0]['title'].'"';
    
  $artist_rows = DB::query($sql,array());
  
 $artist_counter = count( $artist_rows);
 echo ' Number of artists: '.$artist_counter.'<br>';
 echo '[<a href="addArtist.php?id='.$_GET['id'].'"> Add New artist </a>]';
 
 echo '[<a href="editMovment.php?id='.$_GET['id'].'">';
 echo 'Edit Movment'.'</a> ]<br>';	
 
 
 
 echo '<table width="94%" bgcolor="#0c0F0F" cellspacing="0" cellpadding="3" border="1" bordercolor="#333333">';
 $i=0;  
 $col = 1;
 
 while ($i < $artist_counter){  
   	
    echo '<td class="listItem"   align="center" width="16%">';
	echo '<font size="5" color="#99ccff">';
   
	echo ' <a href="ArtistPaintings.php?artist_id='.$artist_rows[$i]["id"];
	echo '&artist_name='.$artist_rows[$i]["name"].'">';
	echo $artist_rows[$i]["name"].'</a></font>';
	
	echo '<br><img src="'.$artist_rows[$i]["pic"] . '" height="150" width="130">' ;    
	  
    echo '<br>[<a href="editArtist.php?artist_id='. $artist_rows[$i]["id"].'">';
	echo 'E</a>]</font> ';
 
    //// count painting of this artist
    $sql = 'SELECT * FROM  paintings  
	        WHERE  artist_id ="'.$artist_rows[$i]["id"].'"';
   
    $rows = DB::query($sql,array());
    $counter = count( $rows);
	echo ' ('.$counter.')';
   
    echo '</td>';
	$i++;
    $col++;
	if ($col>NUM_OF_COLUMN) {
		$col = 1; 
		echo "</tr>";
	 }
 }

echo "</table>";

?>
<?php include('right.php'); ?>
 

 