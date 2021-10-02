 <?php  
include('classes/DB.php');
include('simple_html_dom.php');
 
  $sql=  'SELECT  id,name,pic 
	     FROM  artists 
		 where name = "'.$_POST['artist_name'].'"';
  $artist_rows = DB::query($sql,array());
  $artist_counter = count( $artist_rows);
   
  
  if ( $artist_counter == 0){  //This artist is not in the database so we need to add it.
    $parm=array(':name'=>$_POST['artist_name'], 
		        ':pic'=>'-', 
	            ':movement'=>'na',
				':school'=>'na' 
		     );
	$q='INSERT INTO artists  VALUES';  
    $holders = ' (\'\',:name,:pic,:movement,:school)';    
    $sql = $q. $holders;
 
    DB::query($sql, $parm);
 
 // Get the id of this new artist
    $sql=  'SELECT  id,name,pic 
	     FROM  artists 
		 where name = "'.$_POST['artist_name'].'"';
    $artist_rows = DB::query($sql,array());
    
 }
  echo $artist_rows[0]["id"]; 
  $parm=array(':name'=>$_POST['title'], 
		      ':url'=>$_POST['image_url'], 
	          ':artist_id'=>$artist_rows[0]["id"]
		     );
  $q='INSERT INTO paintings VALUES';  
  $holders = ' (\'\',:name,:url,:artist_id)';
  $sql = $q. $holders;
  DB::query($sql, $parm);  
  
  $url = 'Location:ArtistPaintings.php?artist_id='.$artist_rows[0]["id"];
  $url =  $url . '&artist_name='.$_POST['artist_name'];
  header( $url);   
?>
 
  
 