<?php
include('left.php');  
require_once ('classes/DB.php');
 
$sql=   'SELECT  title ,notes
	     FROM  movement 
	     WHERE id= "'.$_GET['id'].'"';
$movment_rows = DB::query($sql,array()); 
 
 ?>     

 <h1 class="hero">Edit Movement</h1>
 <form id="frm"action="updateMovment.php" method="post">
  Movement Name:<br> <input type="text" name="movment_name"
            style=" color:#131333"   
            value="<?php echo $movment_rows[0]['title'];?>" 
			placeholder="name"><p /><br>
  Notes:<br>
  <textarea  
        class="form-control inputstl"    rows="5"        name="notes"
		style="color: #000000;        font-size:22px;  	 
               box-sizing: border-box;  border: 2px solid #ccc;    border-radius: 4px;
               background-color: #a198b1;"
	    value="  <?php echo $movment_rows[0]['notes'];?> ">	
		  <?php echo $movment_rows[0]['notes'];?>
 </textarea>
	
	
	
	
  <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"><p />
  <input type="submit" name="updateMovment" style=" color:#131333" value="Update">
 </form>
  

<?php include('right.php'); ?>