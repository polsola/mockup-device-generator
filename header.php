<?php

require __DIR__ . '/vendor/autoload.php';
//require __DIR__ . '/autoload.php';
use PHPImageWorkshop\ImageWorkshop;

// Include array of compositions
/*require_once('compositions.php');
$compositions = get_compositions();*/

// Include array of compositions
require_once('includes/classes/template.class.php');

use Classes\Template as Template;

$devices = Template::getDevices();

require_once('functions.php');

function get_screens() {
	$directory = 'screens/';
	$scanned_directory = array_diff(scandir($directory), array('..', '.', '.DS_Store'));

	return $scanned_directory;
}




// Clear saved folder
$files = glob('saved/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

// Clear saved folder
$files = glob('screens/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Device image generator</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/style.css" />
	<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="assets/js/dropzone.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body>
	<h1>Device image generator</h1>
	<main>
