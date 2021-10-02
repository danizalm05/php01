  <?php 
  include("simple_html_dom.php");
  require_once ('classes/DB.php');

  function DellData(){ 
      $parm=array(); 
	 $q = "DELETE FROM artodyssey";			 
     DB::query($q, $parm);
     echo 'Delete items from database';
 }


  function StoreData($url,$ArtistNameTag){
	$html = new simple_html_dom();
    $html->load_file($url);
    $links = array();
    foreach($html->find($ArtistNameTag) as $key => $info) {
        $links[] = $info->plaintext;
        
        
  }
	$len =sizeof($links);
    for ($i = 0; $i <  $len; $i++) {
	 	// echo $i.':'. $links[$i].'<br>';
		$parm=array(':name'=>$links[$i] );
	    $q='INSERT INTO  artodyssey   VALUES ';  
        $holders = '(:name)';    
        $sql = $q. $holders;
        DB::query($sql, $parm);
	 }
 
   
	return $len;
 }
  DellData();
 
 $url= 'http://artodyssey1.blogspot.co.il/';
 $ArtistNameTag = 'a[dir=ltr]'; 
 $item_count = StoreData($url,$ArtistNameTag);
 echo '<br>Added artodyssey :'.$item_count .' items to database';
 ?>    




