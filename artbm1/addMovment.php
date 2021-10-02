<?php 
include('left.php');   
include('classes/DB.php');

if (isset($_POST['addMovment'])) {
    $parm=array(':title'=>trim($_POST['name']), 
	            ':notes'=> $_POST['notes']
		     );
 	$q='INSERT INTO movement VALUES';  
    $holders = ' (\'\',:title,:notes)';
    //echo "<br><pre>".print_r($parm, true) . "</pre>"; 
    $sql = $q. $holders;
    DB::query($sql, $parm);
                  
    $h='movmentsMenu.php';
	//echo 'Added Movement '.$_POST['name'];	
	//echo '<meta http-equiv="refresh" content="0;url='.$h .'">';
   // exit();
	echo '<script> location.replace("'.$h.'");</script>';
	
	
  }
?>
  <h1 class="hero">Add Movement</h1>
 <form id="frm" action="addMovment.php" method="post">
  Name:<br>            
  <input type="text" name="name"   style=" color:#131333"placeholder="Movement name"><p />
 <br>Notes:<br>
 <textarea placeholder="Enter Text here..." 
	             style="font-size:26px"
		         class="form-control inputstl"    rows="4"        name="notes"  >	
 </textarea>


 <input type="submit" name="addMovment" style=" color:#131333" value="Add Movement">
 </form>
 <?php    include('right.php'); ?>