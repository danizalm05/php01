<?php
include('left.php');  
require_once ('classes/DB.php');
 
$sql=  'SELECT  id, name, pic, movement, school
	    FROM  artists 
	    WHERE id= "'.$_GET['artist_id'].'"';
$artist_rows = DB::query($sql,array()); 
 ?>

 <h1 class="hero">Edit Artist</h1>
 <form id="frm"action="updateArtist.php" method="post">
  Name:<br> <input type="text" name="artist_name"
            style=" color:#131333"   
            value="<?php echo $artist_rows[0]['name'];?>" 
			placeholder="name"><p /><br>
  
  ImageURL:<br> <input type="text" name="pic"  
            style=" color:#131333"    
            value="<?php echo $artist_rows[0]['pic'];?>" 
			placeholder="Image URL"><p />  
 Movement: [<?php echo $artist_rows[0]['movement'];?>] <br>
  <select name='mov_select' style=" color:#131333">
   
  <?php $sql='SELECT  id,title 
	   FROM       movement 
	   ORDER BY   title';
  
  $movment_rows = DB::query($sql,array());
  $movment_counter = count( $movment_rows);
   
  for ($i = 0; $i <  $movment_counter; $i++) {
	 
   if (strcmp($movment_rows[$i]["title"],$artist_rows[0]['movement'])==0){
	 echo '<option selected="selected"'. $movment_rows[$i]["id"].'">' ;    
	}else { 
	echo "<option value='" . $movment_rows[$i]["id"] . "'>" ;
     }
    echo $movment_rows[$i]["title"] . "</option>";
  }
 ?>
 </select>
 <br>  	
  Notes:<br> <input type="text" name="school" 
            style=" color:#131333"  
            value="<?php echo $artist_rows[0]['school'];?>" 
			placeholder="nd"><p /><br> 			
 
  <input type="hidden" name="artist_id" value="<?php echo $_GET['artist_id'];?>" placeholder="id"><p />
  <input type="submit" name="updateArtist" style=" color:#131333" value="Update">
 </form>
  

<?php include('right.php'); ?>