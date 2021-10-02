
<?php  
  
 include('left.php'); 
 require_once ('classes/DB.php');
?> 

  
 
 <a href="addMovment.php">[  Add New Movement ]</a>
 <a href="movments.php?id=1">[Lost & Founds</a>] 
 
<?php
 $sql='SELECT  school ,  movement
       FROM   artists   ';  
$rows =DB::query($sql, array());
$numOfArtists = count($rows);
echo "<div  style= 'background-color:#001100' > Num of Artists $numOfArtists </div>";
  
  $sql='SELECT  id,title 
	   FROM       movement 
	   ORDER BY   title';
  
  $movment_rows = DB::query($sql,array());
  $movment_counter = count( $movment_rows);
  $lines =  $movment_counter / 3;
  
  
  echo '<table width="94%" bgcolor="#0c0F0F" cellspacing="0" cellpadding="3" border="1" bordercolor="#333333 ">';
  echo '<tr>';
  
   echo '<ul>';
   echo '<td class="listItem" valign="top" align="left" width="33%">';
    
   $ii=0;
   for ($i = 0; $i <  $movment_counter; $i++) {
     echo '<li>';
     echo ' <a href="movments.php?id='.$movment_rows[$i]["id"].'">';
	 echo'<strong style="font-size: 25px;">';
	 echo $movment_rows[$i]["title"].'</strong></a>';
     

	 $sql = 'SELECT * FROM  artists  WHERE   movement ="'.$movment_rows[$i]['title'].'"';
     $rows = DB::query($sql,array());
     $counter = count( $rows);
	 echo ' ('.$counter.')';
     echo '</li> ';	 
     $ii++;
	 if ($ii>$lines) {
		$ii = 0; 
		echo "</td>";
		echo '<td class="listItem" valign="top" align="left" width="33%">';
	 }  
  }
  echo '</td>';
   echo ' </ul>'; 
  
  
  
  echo '</tr>';
  echo "</table>";
  
    include('right.php'); ?> 