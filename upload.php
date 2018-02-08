<?php

namespace upload;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';
//require_once('devices.php');
require_once('functions.php');

use PHPImageWorkshop\ImageWorkshop;
use Classes\Generator as Generator;

$uploaddir = 'screens/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    //echo "File is valid, and was successfully uploaded.\n";
    echo save_image( basename($_FILES['file']['name']), $_POST['device'], $_POST['orientation'] );
    //echo 'saved/'.basename($_FILES['file']['name']);
} else {
	echo '<pre>';
    echo "Possible file upload attack!\n";
    echo 'Here is some more debugging info:';
	print_r($_FILES);

	print "</pre>";
}

function save_image( $screen, $device = 'iphone6', $orientation = 'portrait' ) {

  $generator = new Generator();
	$result = $generator->createDevice( $screen , $device, $orientation );

	//save file or output to broswer
	$SAVE_AS_FILE = TRUE;
	if( $SAVE_AS_FILE ){
	    //$save_path = "saved/".$screen;
	    //Saving the result
		$dirPath = "saved";
		$filename = $screen;
		$createFolders = true; //will create the folder if not exist
		$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
		$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

		$result->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);

	    return '<img src="'.$dirPath.'/'.$filename.'" />';

	}else{
	    header('Content-Type: image/png');
	    imagepng($result);
	}

	//release memory
	imagedestroy($result);
}

?>
