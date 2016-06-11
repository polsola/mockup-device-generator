<?php


function create_iphone( $screen, $iphone ) {
	$dest = imagecreatefrompng('devices/'.$iphone);
	$src = imagecreatefrompng('screens/'.$screen);

	imagealphablending($dest, false);
	imagesavealpha($dest, true);

	imagecopymerge($dest, $src, 335, 430, 0, 0, 741, 1324, 100); //have to play with these numbers for it to work for you, etc.

	return $dest;

	imagedestroy($dest);
	imagedestroy($src);
}

$iphone1 = create_iphone( '1-Register.png', 'iphone.png');
$iphone2 = create_iphone( '10-Colección.png', 'iphone.png');

//header('Content-Type: image/png');
//imagepng($iphone2);

$img1_path = 'images_1.png';
$img2_path = 'images_2.png';

$img1_width  = imagesx($iphone1);
$img1_height = imagesy($iphone1);

$img2_width  = imagesx($iphone2);
$img2_height = imagesy($iphone2);


$merged_width  = $img1_width + $img2_width;
//get highest
$merged_height = $img1_height > $img2_height ? $img1_height : $img2_height;

$merged_image = imagecreatetruecolor($merged_width, $merged_height);

imagealphablending($merged_image, false);
imagesavealpha($merged_image, true);

imagecopy($merged_image, $iphone1, 0, 0, 0, 0, $img1_width, $img1_height);
//place at right side of $img1
imagecopy($merged_image, $iphone2, $img1_width-500, 0, 0, 0, $img2_width, $img2_height);

//save file or output to broswer
$SAVE_AS_FILE = FALSE;
if( $SAVE_AS_FILE ){
    $save_path = "saved/login.png";
    imagepng($merged_image,$save_path);
}else{
    header('Content-Type: image/png');
    imagepng($merged_image);
}

//release memory
imagedestroy($merged_image);

?>