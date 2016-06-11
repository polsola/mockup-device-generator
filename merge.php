<?php
use PHPImageWorkshop\ImageWorkshop;
require_once('libs/PHPImageWorkshop/ImageWorkshop.php');
require_once('libs/PHPImageWorkshop/Core/ImageWorkshopLayer.php');
require_once('libs/PHPImageWorkshop/Core/ImageWorkshopLib.php');
require_once('libs/PHPImageWorkshop/Exception/ImageWorkshopBaseException.php');
require_once('libs/PHPImageWorkshop/Exception/ImageWorkshopException.php');

function create_iphone( $screen, $iphone ) {
	
	$iphone = ImageWorkshop::initFromPath('devices/'.$iphone);
	$screen = ImageWorkshop::initFromPath('screens/'.$screen);
	$iphone->addLayer(1, $screen, 332, 425, 'LT');

	return $iphone;
}

/*The Empty Layer have 100x100... And is TRANSPARENT!!*/ 
$emptyLayer = ImageWorkshop::initVirginLayer(2216, 2236); 

$iphone1 = create_iphone( '3-Profile.png', 'iphone.png');
$iphone1->resizeInPercent(90, 90);

$iphone3 = create_iphone( '10-Colección.png', 'iphone-silver.png');
$iphone3->resizeInPercent(90, 90);

$iphone2 = create_iphone( '1-Register.png', 'iphone-gold.png');

$emptyLayer->addLayerOnTop($iphone1, 0, 100, 'LT');
$emptyLayer->addLayerOnTop($iphone3, 0, 100, 'RT');
$emptyLayer->addLayerOnTop($iphone2, 400, 0, 'LT');

//header('Content-Type: image/png');
//imagepng($iphone);


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