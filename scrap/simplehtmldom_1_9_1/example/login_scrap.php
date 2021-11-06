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
$url0 = 'http://natas18.natas.labs.overthewire.org/index-source.html';
$url1 = 'http://natas18.natas.labs.overthewire.org/' ;
 
 


if(isset($_GET['s_url'])) {# url to scrape 
     $url = $_GET['s_url'];
	 
} else {
     $url = $url0;;
}
 


$purl =parse_url( $url, $component = -1 );
$host_url = $purl['host'];
$host_scheme = $purl['scheme'];
 
echo "Host = <b><a href=".$host_scheme.'://'.$host_url.">".$host_url."</a></b>";
echo "<br><pre>".print_r($purl, true) . "</pre>";

$username= 'natas18';
$password= 'xvKIqDjy4OPv7wCRgDlmj0pFsCsDjhdP';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$html = str_get_html( $output);
echo $html;
echo "<br>info = curl_getinfo<pre>".print_r($info, true) . "</pre>"; 

//$html = file_get_html($url );

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