<?php 
 include('classes/DB.php');
 $movment_title=$_POST["mov_select"];
 if (ctype_digit($movment_title)) {  // find title for this code
        $sql=   'SELECT  title 
	    FROM  movement 
	    WHERE id= "'.$movment_title.'"';
        $movment_rows = DB::query($sql,array()); 
		$movment_title = $movment_rows[0]['title'];
     } 
 $parm=array( ':artist_id'=>$_POST['artist_id'],
              ':artist_name'=>$_POST['artist_name'],
              ':pic'=>$_POST['pic'],			  
              ':movement'=>$movment_title,
              ':school'=>$_POST['school'],			   
    	    );
 $sql =  "UPDATE artists
          SET   
    	    	name = :artist_name, 
		        pic = :pic,			  
                movement = :movement,
                school = :school 	
		  WHERE  id   = :artist_id";
 DB::query($sql, $parm);

 $url = 'ArtistPaintings.php?artist_id='.$_POST['artist_id'];
 $url = $url. '&artist_name='.$_POST['artist_name']; 
 echo '<script> location.replace("'.$url.'");</script>';
?> 