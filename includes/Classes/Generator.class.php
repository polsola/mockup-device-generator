<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;
use Classes\Template as Template;
use Classes\FileManager as FileManager;

class Generator {

	function __construct() {
		$this->devices = Template::getDevices();
		$this->originalRoute = DOCUMENT_ROOT . '/static/images/devices/original/';
		$this->placeHolderRoute = DOCUMENT_ROOT . '/static/images/devices/placeholder/';
		$this->config = include(DOCUMENT_ROOT . '/config.php');
	}

	// Function to create device
	public function createDevice( $screen, $device, $orientation = 'portrait', $placeholder = false ) {

		$device_atts = $this->getDeviceAtts( $device );

		//var_dump($device_atts);
		//die();

		$device_image = $device.'.png';

		list($width, $height) = getimagesize( $this->originalRoute . $device_image );

		$comp = ImageWorkshop::initVirginLayer($width, $height);

		$device = ImageWorkshop::initFromPath( $this->originalRoute . $device_image);
		if(!$placeholder) {
			$screen = $this->createScreen($screen, $device_atts, $orientation);
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

	private function createScreen( $screen, $device_atts, $orientation ) {

		$expectedWidth = $device_atts['screen']['width'];
		$expectedHeight = $device_atts['screen']['height'];

		$screen = ImageWorkshop::initFromPath('screens/'.$screen);

		$originalWidth  = $screen->getWidth();
		$originalHeight = $screen->getHeight();

		// Rotate if we need to & device is landscape
		if( $originalWidth > $originalHeight && isset($device_atts['landscape']) && $orientation == 'landscape' ) {
			$screen->rotate(90);
		}

		// Resize the squared layer with the largest side of the expected thumb
		$screen->resizeInPixel($expectedWidth, null, true);
		$screen->cropInPixel($expectedWidth, $expectedHeight, 0, 0, "LT");
		/*
		if($screen->getHeight() != $expectedHeight) {

		}*/

		return $screen;
	}

	public function createPlaceholder( $device ) {

		$filename =  $device . ".png";
		if( file_exists( $this->placeHolderRoute . 'large/' . $filename ) ) {
			return;
		}

		$device_atts = $this->getDeviceAtts( $device );
		$screen = ImageWorkshop::initFromPath(__DIR__ . '/../../static/images/device_placeholder.png');

		$screen->resizeInPixel( $device_atts['screen']['width'], $device_atts['screen']['height'], false);

		$placeholder = $this->createDevice($screen, $device, 'portrait', true);

		// Resize and save
		$fileManager = new FileManager();
		$fileManager->save($placeholder, $filename, $this->placeHolderRoute . 'large/');
		$placeholder = $fileManager->resize($placeholder, 200);
		$fileManager->save($placeholder, $filename, $this->placeHolderRoute . 'small/');
	}

	private function getDeviceAtts( $device ) {

		$device_array = explode('--', $device);

		if( isset($this->devices[ $device_array[0] ]) ) {
			$device_atts = $this->devices[ $device_array[0] ];
			return $device_atts;
		} else {
			return 'Device not found';
		}
		
	}

	public function save( $screen, $device = 'iphone8', $orientation = 'portrait' ) {

		$generator = new Generator();
		$result = $generator->createDevice( $screen , $device, $orientation );

		// File Manager
		$fileManager = new FileManager();
		
		// Save file
		if( $this->config['saveImages'] ):
			$fileManager->save($result, $screen);
		endif;
	  
		// Capture png image
		$base64image = $fileManager->base64Image($result);

		// Remove uploaded screen
		unlink('screens/' . $screen);
	  
		// Return image code for view
		return $base64image;
	  
	}
}
