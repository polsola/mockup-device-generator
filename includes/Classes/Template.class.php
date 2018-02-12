<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;

class Template {
	public static function getDevices() {
		$ios_product_variations = array('' => 'Space Gray', '--silver' => 'Silver', '--gold' => 'Gold');

		$samsung_proudct_variations = array('' => 'Black', '--silver' => 'Silver', '--gold' => 'Gold');
		//$ios_product_variations_name = array('', ' Silver', ' Gold');

		$devices = array();

		$devices['iphonex'] = array(
							'name' 				=> 'iPhone X',
							'image' 			=> 'iphonex.png',
							'screen' 			=> array('x' => 47, 'y' => 60, 'width' => 375, 'height' => 812 ),
							'variations' 	=> array('' => 'Space Gray', '--silver' => 'Silver'),
							'back' 				=> true,
							'landscape'		=> true
						);

		$devices['iphone6'] = array(
							'name' => 'iPhone 6',
							'image' => 'iphone6.png',
							'screen' => array('x' => 56, 'y' => 215, 'width' => 751, 'height' => 1334 ),
							'variations' => $ios_product_variations,
							'landscape'		=> true
							);

		/*$devices['iphone6-horizontal'] = array(
							'name' => 'iPhone 6 horizontal',
							'image' => 'iphone6-horizontal.png',
							'screen' => array('x' => 214, 'y' => 60, 'width' => 1334, 'height' => 751 ),
							'variations' => $ios_product_variations
						);*/

		$devices['ipad-air-2'] = array(
							'name' => 'iPad Air 2',
							'screen' => array('x' => 80, 'y' => 140, 'width' => 768, 'height' => 1024 ),
							'variations' => $ios_product_variations,
							'landscape'		=> true
						);

		$devices['ipadpro'] = array(
							'name' => 'iPad Pro',
							'image' => 'ipadpro.png',
							'screen' => array('x' => 69, 'y' => 108, 'width' => 1032, 'height' => 1382 ),
							'variations' => $ios_product_variations,
							'landscape'		=> true
							);

		$devices['macbook'] = array(
							'name' => 'MacBook',
							'image' => 'macbook.png',
							'screen' => array('x' => 270, 'y' => 80, 'width' => 1440, 'height' => 900 ),
							'variations' => $ios_product_variations
							);

		$devices['samsung-galaxy-s8'] = array(
							'name' 				=> 'Samsung Galaxy S8',
							'image' 			=> 'samsung-galaxy-s8.png',
							'screen' 			=> array('x' => 50, 'y' => 160, 'width' => 720, 'height' => 1480 ),
							'variations'	=> $samsung_proudct_variations,
							'back' 				=> true,
							'landscape'		=> true
						);

		$devices['nexus9'] = array(
							'name' 				=> 'Nexus 9',
							'image' 			=> 'nexus9.png',
							'screen' 			=> array('x' => 90, 'y' => 150, 'width' => 768, 'height' => 1024 ),
							'landscape'		=> true
						);

		return $devices;
	}
}
