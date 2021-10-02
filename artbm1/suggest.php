 <?php
 
require_once ('classes/DB.php');
$sql='SELECT  id ,  name
      FROM   artists   ';  
$rows =DB::query($sql, array());
$numOfArtists = count($rows);
 
 $i=0; 
  
 while ($i < $numOfArtists){     
    $people[$i] = $rows[$i]["name"];
	$id[$i] = $rows[$i]["id"];
	$i++;
}
 
 // Get Query String
$q = $_REQUEST['q'];

$suggestion = "";
// Get Suggestions
if($q !== ""){
	$q = strtolower($q);
	$len = strlen($q);
     
    for ($i = 0; $i < $numOfArtists; $i++){
	    if(stristr($q, substr($people[$i], 0, $len))){
		 	$ArtistUrl = '<a href="ArtistPaintings.php?artist_id='.$id[$i];
            $ArtistUrl .='&artist_name='.$people[$i].'">';
            $ArtistUrl .= $people[$i].'</a>';
			 
			if($suggestion === ""){
				$suggestion =$ArtistUrl;
			} else {
				$suggestion .= "  ". $ArtistUrl;
			}
		}
	}
}
//$suggestion =  '<div class="dropdown"><ul class="dropdown-menu">'.$suggestion.'</ul></div>';
echo $suggestion === "" ? '' : $suggestion;