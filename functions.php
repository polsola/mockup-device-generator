<?php
use PHPImageWorkshop\ImageWorkshop;

function get_device_orientation( $device ) {
	$device_image = $device.'.png';

	list($width, $height) = getimagesize( 'assets/images/devices/'.$device_image );

	if ($width > $height) {
    	return 'landscape';
	} else {
	    return 'portrait';
	}

}

function generate_composition_thumbnail ( $name, $comp ) {

	// Container image
	$emptyLayer = ImageWorkshop::initVirginLayer($comp['information']['width'], $comp['information']['height']);

	// Add layers over the image
	foreach ($comp['layers'] as $key => $layer) {
		$device = ImageWorkshop::initFromPath(__DIR__.'/devices/'.$layer['device'].'.png');
		if( isset($layer['resize']) ) {
			$device->resizeInPercent($layer['resize'], $layer['resize']);
		}
		$emptyLayer->addLayerOnTop($device, $layer['pos']['x'], $layer['pos']['y'], $layer['from']);
	}


	//Saving the result
	$dirPath = "compositions";
	$filename = $name.'.png';
	$createFolders = true; //will create the folder if not exist
	$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
	$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

	$emptyLayer->resizeInPercent(50, 50);
	$emptyLayer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);


	return $filename;

}

?>
