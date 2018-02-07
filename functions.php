<?php
use PHPImageWorkshop\ImageWorkshop;

// Function to create device
function create_device( $screen, $device ) {

	$devices = get_devices();

	$device_array = explode('--', $device);

	$device_atts = $devices[ $device_array[0] ];

	$device_image = $device.'.png';

	$device = ImageWorkshop::initFromPath('assets/images/devices/'.$device_image);
	$screen = create_screen($screen, $device_atts);
	$device->addLayer(1, $screen, $device_atts['screen']['x'], $device_atts['screen']['y'], 'LT');

	return $device;
}

function create_screen( $screen, $device_atts ) {

	$expectedWidth = $device_atts['screen']['width'];
	$expectedHeight = $device_atts['screen']['height'];

	// Determine the largest expected side automatically
	($expectedWidth < $expectedHeight) ? $largestSide = $expectedWidth : $largestSide = $expectedHeight;

	$screen = ImageWorkshop::initFromPath('screens/'.$screen);

	// Get a squared layer
	//$screen->cropMaximumInPixel(0, 0, "MM");

	// Resize the squared layer with the largest side of the expected thumb
	$screen->resizeInPixel($expectedWidth, $expectedHeight, true);

	// Crop the layer to get the expected dimensions
	//$screen->cropInPixel($expectedWidth, $expectedHeight, 0, 0, 'MM');

	return $screen;
}

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
