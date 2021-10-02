<?php 
include('classes/DB.php');
$parm=array( ':id'=>$_POST['id'],
              ':title'=>$_POST['movment_name'], 	
              ':notes'=>$_POST['notes'] 				  
    	    );
 
$sql =  "UPDATE movement
          SET   
    		title = :title, 
            notes = :notes 			
		  WHERE  id   = :id";
DB::query($sql, $parm);
$url = 'movments.php?id='.$_POST['id'];
echo '<script> location.replace("'.$url.'");</script>';
?> 