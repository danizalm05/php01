<?php
// example of how to use basic selector to retrieve HTML contents
include('../inc/simple_html_dom.php');
 
// get DOM from URL or file
$url = 'https://www.walla.co.il';
$html = file_get_html($url );

// find all link
echo "<br>Links<br>--------------<br>";
foreach($html->find('a') as $e) 
    echo $e->href . '<br>';

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