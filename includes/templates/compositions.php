<?php

function get_compositions() {

	$compositions = array(
		'2iphones' => array(
							'information' => array(
								'width' 	=> 2216,
								'height'	=> 2236
							),
							'layers' => array(
								0 => array(
									'device' 	=> 'iphone6',
									'from'		=> 'LT',
									'pos'		=> array('x' => 0, 'y' => 0)
								),
								1 => array(
									'device' 	=> 'iphone6',
									'from'		=> 'LT',
									'pos'		=> array('x' => 400, 'y' => 0)
								)
							)
						),
		'3iphones' => array(
							'information' => array(
								'width' 	=> 2216,
								'height'	=> 2236
							),
							'layers' => array(
								0 => array(
									'device' 	=> 'iphone6',
									'resize' 	=> 90,
									'from'		=> 'LT',
									'pos'		=> array('x' => 0, 'y' => 100)
								),
								1 => array(
									'device' 	=> 'iphone6--silver',
									'resize' 	=> 90,
									'from'		=> 'RT',
									'pos'		=> array('x' => 0, 'y' => 100)
								),
								2 => array(
									'device' 	=> 'iphone6--gold',
									'from'		=> 'LT',
									'pos'		=> array('x' => 400, 'y' => 0)
								)
							)
						),
		'iphoneipad' => array(
							'information' => array(
								'width' 	=> 1516,
								'height'	=> 1336
							),
							'layers' => array(
								0 => array(
									'device' 	=> 'ipad',
									'from'		=> 'RB',
									'pos'		=> array('x' => 0, 'y' => 0)
								),
								1 => array(
									'device' 	=> 'iphone6--gold',
									'from'		=> 'LB',
									'resize'	=> 40,
									'pos'		=> array('x' => 400, 'y' => -103)
								)
							)
						),
		'3ipadpro' => array(
							'information' => array(
								'width' 	=> 2064,
								'height'	=> 1596
							),
							'layers' => array(
								2 => array(
									'device' 	=> 'ipadpro',
									'from'		=> 'LT',
									'pos'		=> array('x' => 0, 'y' => 0)
								),
								1 => array(
									'device' 	=> 'ipadpro--gold',
									'from'		=> 'LT',
									'pos'		=> array('x' => 400, 'y' => 0)
								),
								0 => array(
									'device' 	=> 'ipadpro--silver',
									'from'		=> 'RT',
									'pos'		=> array('x' => 0, 'y' => 0)
								)
							)
						),
	);

	return $compositions;

}

?>