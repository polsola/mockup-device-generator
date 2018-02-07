<?php

//function get_devices() {
	$ios_product_variations = array('' => 'Space Gray', '--silver' => 'Silver', '--gold' => 'Gold');
	$ios_product_variations_name = array('', ' Silver', ' Gold');

	$devices = array();

	$devices['iphone6'] = array(
						'name' => 'iPhone 6',
						'image' => 'iphone6.png',
						'screen' => array('x' => 56, 'y' => 215, 'width' => 751, 'height' => 1334 ),
						'variations' => $ios_product_variations
						);

	$devices['iphone6-horizontal'] = array(
						'name' => 'iPhone 6 horizontal',
						'image' => 'iphone6-horizontal.png',
						'screen' => array('x' => 214, 'y' => 60, 'width' => 1334, 'height' => 751 ),
						'variations' => $ios_product_variations
						);

	$devices['ipad-air-2'] = array(
						'name' => 'iPad Air 2',
						'screen' => array('x' => 218, 'y' => 224, 'width' => 1550, 'height' => 2050 ),
						'variations' => $ios_product_variations
						);

	$devices['ipadpro'] = array(
						'name' => 'iPad Pro',
						'image' => 'ipadpro.png',
						'screen' => array('x' => 69, 'y' => 108, 'width' => 1032, 'height' => 1382 ),
						'variations' => $ios_product_variations
						);

	$devices['macbook'] = array(
						'name' => 'MacBook',
						'image' => 'macbook.png',
						'screen' => array('x' => 270, 'y' => 80, 'width' => 1440, 'height' => 900 ),
						'variations' => $ios_product_variations
						);

	$devices['samsung-galaxy-s6'] = array(
		'name' => 'Samsung Galaxy S6',
		'image' => 'samsung-galaxy-s6.png',
		'screen' => array('x' => 80, 'y' => 165, 'width' => 763, 'height' => 1355 )
		);

	$devices['nexus9-lunarwhite'] = array(
		'name' => 'Nexus 9 LunarWhite',
		'image' => 'nexus9-lunarwhite.png',
		'screen' => array('x' => 340, 'y' => 85, 'width' => 2068, 'height' => 1522 )
		);

	return $devices;
//}
