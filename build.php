<?php 
	
//	Base64 encode function
	function base64_encode_image ($filename=string, $filetype=string) {
	    if ($filename) {
	        $imgbinary = file_get_contents($filename);
	        return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
	    }
	}

//	Open PHP File
	$php = file_get_contents("index.php");
	
//	Include init.php
	$php_init = file_get_contents("core/init.php");
	$php_init = str_replace(array("<?", "?>"), "", $php_init);
	$php = str_replace('include("core/init.php");', $php_init, $php);

//	Minify

	// TODO: Minification.
	
	$exploded = explode("\n", $php);
	$newphp = array();
	foreach ($exploded as $line)
    	if (substr(trim($line),0,2) != "//") $newphp[] = $line;
	$php = implode("", $newphp);
	
	$php = str_replace(array("\t", "  "), array(" "), $php);

//	Open CSS File, then minify
	$css = file_get_contents("assets/css/main.css");
	$css = str_replace(array("\n", "\t", ": ", "; ", "  "), array(" ", "", ":", ";", ""), $css);

//	Replace images with base64 data.
	$index = 0;
	$images_found = false;
	
	while(!$images_found)
	{
		if(strpos($css, 'url(', $index) === false)
		{	$images_found = true; continue; }
	
		$index = $url_start = 	strpos($css, 'url(', $index) + 4;
		$index = $url_end = 	strpos($css, ')', $index);
		
		$url = substr($css, $url_start, $url_end - $url_start);
		$path = str_replace("../", "assets/", $url);
		
		$img = base64_encode_image($path, substr($path, strpos($path, ".")+1, 3));
		
		
		$css = str_replace($url, $img, $css);
	}
	
	$php = str_replace('@import "<?=R; ?>assets/css/main.css";', $css, $php);
	
// 	Write compiled file
	
	file_put_contents("build/index.php", $php);
	
	echo 'New "Delivery" Compiled - '.@date("H:i:s");

?>