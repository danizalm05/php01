<?php
// example of how to use basic selector to retrieve HTML contents
// https://host.io/   A Powerful and Fast Domain Name Data API


include('../inc/simple_html_dom.php');


function isexternal($host_url,$url){
 
   $temp_url =parse_url( $url, $component = -1 ); 
   if  (empty($temp_url['host']))
          return false;
   return strcasecmp($host_url, $temp_url['host']); 
	 // empty host will indicate url like '/relative.php'
}

$url1 =  'http://geeksforgeeks.org/php/#basics';
$url2 = 'https://practice.geeksforgeeks.org/courses/online';
$url3 = 'https://walla.co.il';

$url4 = 'https://www.w3schools.com/';
$local_file=  'idx.htm';
 
if(isset($_GET['s_url'])) {# url to scrape 
     $url = $_GET['s_url'] ;
	 
} else {
	
    $url = $local_file; 
}
 
?>
 
<form method="get">
	URL: <input name="s_url" type="text" value="<?=$url;?>"/><br/>
    <input name="submit" type="submit" value="Submit"/>
</form>

<?php

$purl =parse_url( $url, $component = -1 );
if  (!empty($purl['host'])){
       $host_url = $purl['host'];
       $host_scheme = $purl['scheme'];
}else{
	$host_url =$local_file;
    $host_scheme = 'local';
	
}

echo "Host = <b><a href=".$host_scheme.'://'.$host_url.">".$host_url."</a></b>";
echo "<br><pre>".print_r($purl, true) . "</pre>";

$html = file_get_html($url );
 


$loc_url = array();
$ext_url = array();
$ext_counter =1; 
$loc_counter =1; 

 
echo "<br>Links<br>--------------<br>";
foreach($html->find('a') as $e) {
	 
	 if (isexternal($host_url,$e->href)){
		   
	    $uext  = "<a href=".$e->href.">". $e->href ."</a>" ;
        $ext_url[] = "<a href= basic_scrap.php?s_url=".
		               $e->href.">".
                        '['. $ext_counter++ .'] ' .
			         "</a>" .  $uext;		
        
        }
	 else { #local url
	 	
		$local = parse_url( $e->href, $component = -1 );
        if  (empty($local['host'])){
			  $e->href = $host_scheme.'://'. $host_url .$e->href;
		      
		} 
         #Create link to scrape
		$uloc  = "<a href=".$e->href.">". $e->href ."</a>" ;
        $loc_url[] = "<a href= basic_scrap.php?s_url=".
		               $e->href.">".
                        '['. $loc_counter++ .'] ' .
			         "</a>" .  $uloc;


  }
 }
echo "<br>loc_url<pre>".print_r($loc_url, true) . "</pre>";
echo "<br>ext_url<pre>".print_r($ext_url, true) . "</pre>";
 
// find all image
echo "<br>Images<br>--------------<br><br>";
foreach($html->find('img') as $e)
    echo $e->src . '<br>';

// find all image with full tag
echo "<br>Images with full tag<br>--------------<br><br>";
foreach($html->find('img') as $e)
    echo $e->outertext . '<br>';

// find all div tags with id=gbar
echo "<br>div tags with id=gbar<br>--------------<br><br>";
foreach($html->find('div#gbar') as $e)
    echo $e->innertext . '<br>';

// find all span tags with class=gb1
echo "<br>span tags with class=gb1<br>--------------<br><br>";
foreach($html->find('span.gb1') as $e)
    echo $e->outertext . '<br>';

// find all td tags with attribite align=center
echo "<br>td tags with attribite align=center<br>--------------<br><br>";
foreach($html->find('td[align=center]') as $e)
    echo $e->innertext . '<br>';
    
// extract text from table
echo "<br>extract text from table<br>--------------<br><br>";

echo $html->find('td[align="center"]', 1)->plaintext.'<br><hr>';

// extract text from HTML
echo "<br>extract text from HTML<br>--------------<br><br>";
echo $html->plaintext;
?>