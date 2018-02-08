<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;
use Classes\Template as Template;

class Generator {

	function __construct() {
		$this->devices = Template::getDevices();
		$this->originalRoute = DOCUMENT_ROOT . '/assets/images/devices/original/';
		$this->placeHolderRoute = DOCUMENT_ROOT . '/assets/images/devices/placeholder/';
	}


	// Function to create device
	public function createDevice( $screen, $device, $orientation, $placeholder = false ) {
		//echo $orientation;
		$device_atts = $this->getDeviceAtts( $device );

		$device_image = $device.'.png';

		list($width, $height) = getimagesize( $this->originalRoute . $device_image );

		$comp = ImageWorkshop::initVirginLayer($width, $height);

		$device = ImageWorkshop::initFromPath( $this->originalRoute . $device_image);
		if(!$placeholder) {
			$screen = $this->createScreen($screen, $device_atts);
		}

		if( isset( $device_atts['back'] ) ) {
			$comp->addLayer(1, $screen, $device_atts['screen']['x'], $device_atts['screen']['y'], 'LT');
			$comp->addLayer(2, $device, 0, 0, 'LT');
		} else {
			$comp->addLayer(2, $screen, $device_atts['screen']['x'], $device_atts['screen']['y'], 'LT');
			$comp->addLayer(1, $device, 0, 0, 'LT');
		}

		if( isset($device_atts['landscape']) && $orientation == 'landscape' ) {
			$comp->rotate(-90);
		}

		return $comp;
	}

	private function createScreen( $screen, $device_atts ) {

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

	public function createPlaceholder( $device ) {

		$filename =  $device . ".png";
		if( file_exists( $this->placeHolderRoute . $filename ) ) {
			return;
		}

		$device_atts = $this->getDeviceAtts( $device );
		$screen = ImageWorkshop::initFromPath(__DIR__ . '/../../assets/images/device_placeholder.png');

		$screen->resizeInPixel( $device_atts['screen']['width'], $device_atts['screen']['height'], false);

		$placeholder = $this->createDevice($screen, $device, true);



		$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
		$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

		$placeholder->save($this->placeHolderRoute, $filename, false, $backgroundColor, $imageQuality);
	}

	private function getDeviceAtts( $device ) {

		$device_array = explode('--', $device);

		$device_atts = $this->devices[ $device_array[0] ];

		return $device_atts;
	}
}
