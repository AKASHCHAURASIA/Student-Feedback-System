<?php
// Create DOM from URL or file
include_once('simple_html_dom.php');
$html =  simplexml_load_file('send.php');

// Find all images 
//foreach($html->find('a') as $element) 
  //    echo $element->href.'<br>';

// Find all links 
//foreach(
//$html->find('span[class=_50f4]')->innerHTML="Male";

//as $element) 
//echo $element->href."<br>";
//for($i=0;$i<10;$i++){
//echo '<a href="$var[$i]">home</a>'.'<br>';
echo $html;
?>
