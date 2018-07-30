<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;
use Classes\Template as Template;
use Classes\Generator as Generator;
use Classes\FileManager as FileManager;

class CompositionGenerator {

	function __construct() {
		$this->compositions = Template::getCompositions();
		$this->originalRoute = DOCUMENT_ROOT . '/static/images/compositions/original/';
		$this->placeholderRoute = DOCUMENT_ROOT . '/static/images/compositions/placeholder/';
		$this->devicePlaceholderRoute = DOCUMENT_ROOT . '/static/images/devices/placeholder/';
	}

	/**
	 * Get composition atts
	 */
	private function getCompositionAtts( $composition ) {

		$composition_atts = $this->compositions[ $composition ];

		return $composition_atts;
	}

	/**
	 * Create Placeholders
	 * 
	 * Generate placeholder images to use in navigation
	 * 
	 * @param string $composition Compostion to generate
	 */
	public function createPlaceholder( $composition ) {

		// Check if file already exist to prevent regeneration
		$filename =  $composition . ".png";
		if( file_exists( $this->placeholderRoute . $filename ) ) {
			return;
		}

		// Get comp atts
		$compAtts = $this->getCompositionAtts( $composition );

		// Create container image
		$comp = ImageWorkshop::initVirginLayer($compAtts['information']['width'], $compAtts['information']['height']);

		// Add a layers for each device in the composition
		foreach ($compAtts['layers'] as $key => $layer) {

			// Use already created device placeholder image for composition
			$device = ImageWorkshop::initFromPath($this->devicePlaceholderRoute . $layer['device'].'.png');
			
			// Resize if nedded
			if( isset($layer['resize']) ) {
				$device->resizeInPercent($layer['resize'], $layer['resize']);
			}

			// Add new device on top of current comp
			$comp->addLayerOnTop($device, $layer['pos']['x'], $layer['pos']['y'], $layer['from']);
		}
		/* TODO: Create new function in FileManager to resize */
		// Resize image
		$thumbWidth = 200; // px
		$thumbHeight = 200;
		$conserveProportion = true;
		$positionX = 0; // px
		$positionY = 0; // px
		$position = 'MM';
		
		$comp->resizeInPixel($thumbWidth, $thumbHeight, $conserveProportion, $positionX, $positionY, $position);

		/* TODO: Move this to filemanager also */
		// Save image
		$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
		$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

		$comp->save($this->placeholderRoute, $filename, false, $backgroundColor, $imageQuality);

	}

	/**
	 * Create composition
	 * 
	 * Creates composition based on an array of images
	 * @param array $screens Array of screens uploaded by user to use in composition
	 * @param string $composition Identifier of composition to get atts
	 */
	public function createComposition($screens, $composition) {

		// Get composition atts
		$compAtts = $this->getCompositionAtts( $composition );

		// Container image
		$comp = ImageWorkshop::initVirginLayer($compAtts['information']['width'], $compAtts['information']['height']);

		// Device generator
		$generator = new Generator();

		// Add a layers for each device in the composition
		foreach ($compAtts['layers'] as $key => $layer) {
			
			// Create device using $generator
			$device = $generator->createDevice( $screens[$key], $layer['device'] );

			// Resize if needed
			if( isset($layer['resize']) ) {
				$device->resizeInPercent($layer['resize'], $layer['resize']);
			}

			// Add new device on top of current comp
			$comp->addLayerOnTop($device, $layer['pos']['x'], $layer['pos']['y'], $layer['from']);
		}

		return $comp;
	}

	public function save( $screens, $composition = '2iphones8') {

		$generator = new CompositionGenerator();
		$result = $generator->createComposition( $screens , $composition );
	
		// File Manager
		$fileManager = new FileManager();
		
		// Save file
		$fileManager->save($result, $composition . '.png');
		
		// Capture png image
		$base64image = $fileManager->base64Image($result);
	
		// Remove screens
		foreach($screens as $screen) {
			unlink('screens/' . $screen);
		}
	
		// Return image code for view
		return $base64image;
	
	}
}
