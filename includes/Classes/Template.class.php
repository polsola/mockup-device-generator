<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;

class Template {
	public static function getDevices($withCategories = false) {

		$ios_product_variations = array('' => 'Space Gray', '--silver' => 'Silver', '--gold' => 'Gold');
		$samsung_product_variations = array('' => 'Black', '--silver' => 'Silver', '--gold' => 'Gold');
		$google_product_variations = array('' => 'Just Black', '--white' => 'Clearly White', '--blue' => 'Kinda Blue');
		//$ios_product_variations_name = array('', ' Silver', ' Gold');

		$devices = $phones = $tablets = $computers = array();

		$phones['iphonex'] = array(
							'name' 				=> 'iPhone X',
							'image' 			=> 'iphonex.png',
							'screen' 			=> array('x' => 47, 'y' => 60, 'width' => 375, 'height' => 812 ),
							'variations' 	=> array('' => 'Space Gray', '--silver' => 'Silver'),
							'back' 				=> true,
							'landscape'		=> true
						);

		$phones['iphone8'] = array(
							'name' 				=> 'iPhone 8',
							'image' 			=> 'iphone8.png',
							'screen' 			=> array('x' => 50, 'y' => 140, 'width' => 375, 'height' => 667 ),
							'variations' 	=> $ios_product_variations,
							'landscape'		=> true
						);

		$tablets['ipad-air-2'] = array(
							'name' => 'iPad Air 2',
							'screen' => array('x' => 80, 'y' => 140, 'width' => 768, 'height' => 1024 ),
							'variations' => $ios_product_variations,
							'landscape'		=> true
						);

		$tablets['ipadpro'] = array(
							'name' => 'iPad Pro',
							'image' => 'ipadpro.png',
							'screen' => array('x' => 69, 'y' => 108, 'width' => 1032, 'height' => 1382 ),
							'variations' => $ios_product_variations,
							'landscape'		=> true
							);

		$computers['macbook'] = array(
							'name' 				=> 'MacBook',
							'image' 			=> 'macbook.png',
							'screen' 			=> array('x' => 190, 'y' => 64, 'width' => 1152, 'height' => 721 ),
							'variations' 	=> array('' => 'Space Gray', '--gold' => 'Gold')
						);

		$computers['imac'] = array(
							'name' 				=> 'iMac',
							'image' 			=> 'imac.png',
							'screen' 			=> array('x' => 57, 'y' => 77, 'width' => 1280, 'height' => 721 ),
						);

		$phones['samsung-galaxy-s8'] = array(
							'name' 				=> 'Samsung Galaxy S8',
							'image' 			=> 'samsung-galaxy-s8.png',
							'screen' 			=> array('x' => 50, 'y' => 160, 'width' => 720, 'height' => 1480 ),
							'variations'	=> $samsung_product_variations,
							'back' 				=> true,
							'landscape'		=> true
						);

		$phones['google-pixel-2'] = array(
							'name' 				=> 'Google Pixel 2',
							'image' 			=> 'google-pixel-2.png',
							'screen' 			=> array('x' => 50, 'y' => 170, 'width' => 540, 'height' => 960 ),
							'variations'	=> $google_product_variations,
							'back' 				=> true,
							'landscape'		=> true
						);

		$tablets['nexus9'] = array(
							'name' 				=> 'Nexus 9',
							'image' 			=> 'nexus9.png',
							'screen' 			=> array('x' => 90, 'y' => 150, 'width' => 768, 'height' => 1024 ),
							'landscape'		=> true
						);

		if( $withCategories ) {
			$devices = array(
				'phones' => array(
					'label' => 'Phones',
					'devices' => $phones
				),
				'tablets' => array(
					'label' => 'Tablets',
					'devices' => $tablets
				),
				'computers' => array(
					'label' => 'Computers',
					'devices' => $computers
				)
			);
		} else {
			$devices = $phones + $tablets + $computers;
		}



		return $devices;
	}
}
