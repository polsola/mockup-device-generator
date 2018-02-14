<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;
use Classes\Template as Template;

class CompositionGenerator {

	function __construct() {
		$this->compositions = Template::getCompositions();
		$this->originalRoute = DOCUMENT_ROOT . '/assets/images/compositions/original/';
		$this->placeholderRoute = DOCUMENT_ROOT . '/assets/images/compositions/placeholder/';
		$this->devicePlaceholderRoute = DOCUMENT_ROOT . '/assets/images/devices/placeholder/';
	}

	private function getCompositionAtts( $composition ) {

		$composition_atts = $this->compositions[ $composition ];

		return $composition_atts;
	}

	public function createPlaceholder( $composition ) {

		$filename =  $composition . ".png";
		if( file_exists( $this->placeholderRoute . $filename ) ) {
			return;
		}

		$compAtts = $this->getCompositionAtts( $composition );

		// Container image
		$comp = ImageWorkshop::initVirginLayer($compAtts['information']['width'], $compAtts['information']['height']);

		// Add layers over the image
		foreach ($compAtts['layers'] as $key => $layer) {
			$device = ImageWorkshop::initFromPath($this->devicePlaceholderRoute . $layer['device'].'.png');
			if( isset($layer['resize']) ) {
				$device->resizeInPercent($layer['resize'], $layer['resize']);
			}
			$comp->addLayerOnTop($device, $layer['pos']['x'], $layer['pos']['y'], $layer['from']);
		}

		$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
		$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

		$comp->save($this->placeholderRoute, $filename, false, $backgroundColor, $imageQuality);

	}
}
/*
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
*/
