<?php

namespace upload;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';

use Classes\Generator as Generator;

$uploaddir = 'screens/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

$generator = new Generator();

if( move_uploaded_file( $_FILES['file']['tmp_name'], $uploadfile ) ) {
  // File is valid, and was successfully uploaded
  echo $generator->save( basename( $_FILES['file']['name'] ), $_POST['device'], $_POST['orientation'] );
} else {
  // Some error happened, check permissions
	echo '<pre>';
  echo 'Here is some more debugging info:';
	print_r($_FILES);
	echo "</pre>";
}