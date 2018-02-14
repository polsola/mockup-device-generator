<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';

use PHPImageWorkshop\ImageWorkshop;

use Classes\Template as Template;

$deviceCategories = Template::getDevices(true);

//require_once('functions.php');

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

require_once('includes/views/pages/index.php');
