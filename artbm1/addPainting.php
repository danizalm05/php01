<?php 
include('left.php');  
include('classes/DB.php');
//echo '[ '. $_SESSION['password'].']';
//echo  $_SESSION['username'];
 
            
//exit(0);
 if (isset($_POST['addPainting'])) {
     $parm=array(':name'=>$_POST['name'], 
		        ':url'=>$_POST['url'], 
	            ':artist_id'=>$_POST['artist_id']
		     );
 	$q='INSERT INTO paintings VALUES';  
    $holders = ' (\'\',:name,:url,:artist_id)';
    $sql = $q. $holders;
    DB::query($sql, $parm);
     
    $h='ArtistPaintings.php?artist_id='.$_POST['artist_id'].'&artist_name='.$_POST['artist_name'];
	  
   // echo 'Adding Painting '.$_POST['name']. ' to Artist ' .$_POST['artist_name'];	
	
   echo '<script> location.replace("'.$h.'");</script>';
	
	//echo '<meta http-equiv="refresh" content="0;url='.$h .'">';
   // exit();  
  }
?>

 <h1 class="hero">Add Painting to <?php echo $_GET['artist_name'];?></h1>
 <form id="frm" action="addPainting.php" method="post">
  Painting Name:<br>
  <input type="text" name="name"  style="color:#131333" placeholder="name"><p />
  URL:<br>
  <input type="text" name="url"   style="color:#131333" placeholder="url"><p />
 
  <input type="hidden" name="artist_id" value="<?php echo $_GET['artist_id'];?>" placeholder="id"><p />
  <input type="hidden" name="artist_name" value="<?php echo $_GET['artist_name'];?>" placeholder="id"><p />
  <input type="submit" name="addPainting"  style=" color:#131333" value="Add Painting">
 </form>
<?php    include('right.php'); ?>