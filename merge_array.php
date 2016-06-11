<?php
// Doc: http://phpimageworkshop.com/documentation.html
use PHPImageWorkshop\ImageWorkshop;
require_once('libs/PHPImageWorkshop/ImageWorkshop.php');
require_once('libs/PHPImageWorkshop/Core/ImageWorkshopLayer.php');
require_once('libs/PHPImageWorkshop/Core/ImageWorkshopLib.php');
require_once('libs/PHPImageWorkshop/Exception/ImageWorkshopBaseException.php');
require_once('libs/PHPImageWorkshop/Exception/ImageWorkshopException.php');

// Include array of compositions
require_once('compositions.php');
$compositions = get_compositions();

// Include array of compositions
require_once('devices.php');

require_once('functions.php');


// Selected comp (Currently manual)
$comp = $compositions['macbook'];

// Screens form the comp (Currently manual)
$screens = array('3-Profile.png', '10-Colección.png', '1-Register.png');
$screens = array('ipad-login.png', 'ipad-home.png', 'ipad-single.png');
//$screens = array('ipad-login.png', '3-Profile.png');
$screens = array('3-Profile Own.png', '0-Splash.png');
$screens = array('screen.png');

// Container image
$emptyLayer = ImageWorkshop::initVirginLayer($comp['information']['width'], $comp['information']['height']); 

// Add layers over the image
foreach ($comp['layers'] as $key => $layer) {
	$device = create_device( $screens[$key], $layer['device']);
	if( isset($layer['resize']) ) {
		$device->resizeInPercent($layer['resize'], $layer['resize']);		
	}
	$emptyLayer->addLayerOnTop($device, $layer['pos']['x'], $layer['pos']['y'], $layer['from']);
}

//Saving the result
$dirPath = "saved";
$filename = "output.png";
$createFolders = true; //will create the folder if not exist
$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
$imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

$emptyLayer->resizeInPercent(50, 50);
$emptyLayer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);

?>
<img src="saved/output.png" />