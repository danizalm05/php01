<?php 
include('left.php');  
include('classes/DB.php');
 
if (isset($_POST['addArtist'])) {
    
    $parm=array(':name'=>$_POST['artist_name'], 
		        ':pic'=>$_POST['pic'], 
	            ':movement'=>$_POST["mov_select"] ,
				':school'=>$_POST['notes'] 
		     );
	$q='INSERT INTO artists  VALUES';  
    $holders = ' (\'\',:name,:pic,:movement,:school)';    
    $sql = $q. $holders;
    DB::query($sql, $parm);
    $h = 'movments.php?id='.$_POST["mov_id"]; 
	echo 'Adding  Artist '.$_POST['artist_name'];	
 	//echo '<meta http-equiv="refresh" content="0;url='.$h .'">';
	echo '<script> location.replace("'.$h.'");</script>';
 	//exit();
  } 
?>

<h1>Add  Artist</h1>
<form action="addArtist.php" method="post">
 Name:<br>
 <input type="text" name="artist_name" style=" color:#131333" value="" placeholder="name"><p />
 ImageURL:<br>
   <input type="text" name="pic" style=" color:#131333" value="" placeholder="pic url"><p />
 Movement:<br>
  <select name='mov_select' style=" color:#131333">
   
  <?php $sql='SELECT  id,title 
	   FROM       movement 
	   ORDER BY   title';
  
  $movment_rows = DB::query($sql,array());
  $movment_counter = count( $movment_rows);
   
  for ($i = 0; $i <  $movment_counter; $i++) {
    if ($movment_rows[$i]["id"] == $_GET['id']){
	 echo '<option selected="selected"'. $movment_rows[$i]["id"].'">' ;    
	}else{ 
    echo "<option value='" . $movment_rows[$i]["id"] . "'>" ;
    }
    echo $movment_rows[$i]["title"] . "</option>";
  }
 ?>
 </select>
 <br> Notes:<br>
   <input type="text" name="notes" style=" color:#131333" value="" placeholder=""><p /> 

   
  <input type="hidden" name="mov_id"  value="<?php echo $_GET['id'];?>" placeholder=""><p /> 
 <input type="submit" name="addArtist" style=" color:#131333" value="Add Artist">
</form>
<?php include('right.php'); ?>