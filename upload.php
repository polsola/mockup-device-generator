<?php

namespace upload;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';

use PHPImageWorkshop\ImageWorkshop;
use Classes\Generator as Generator;

$uploaddir = 'screens/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if( move_uploaded_file( $_FILES['file']['tmp_name'], $uploadfile ) ) {
  // File is valid, and was successfully uploaded
  echo save_image( basename( $_FILES['file']['name'] ), $_POST['device'], $_POST['orientation'] );
} else {
  // Some error happened, check permissions
	echo '<pre>';
  echo "Possible file upload attack!\n";
  echo 'Here is some more debugging info:';
	print_r($_FILES);
	echo "</pre>";
}

function save_image( $screen, $device = 'iphone6', $orientation = 'portrait' ) {

  $generator = new Generator();
	$result = $generator->createDevice( $screen , $device, $orientation );

	//save file or output to broswer
	$save_as_file = false;
	if( $save_as_file ) {

		$dirPath = "saved";
		$filename = $screen;
		$createFolders = true; //will create the folder if not exist
		$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
		$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

		$result->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);

	  return '<img src="'.$dirPath.'/'.$filename.'" />';

	} else {

    $image = $result->getResult();

    ob_start();
    header('Content-Type: image/png');
    imagepng($image);
    $imageCode = ob_get_clean();

    return "data:image/png;base64," . base64_encode($imageCode) . '"';

	}

	/* TODO: Release memory */
	imagedestroy($result);
  unlink($uploadfile);
}

?>
