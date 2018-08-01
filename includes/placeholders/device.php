<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../autoload.php';

use Classes\Template as Template;
use Classes\Generator as Generator;

$devices = Template::getDevices();
$generator = new Generator();
ini_set('memory_limit','256M');
ini_set('max_execution_time', 300);

foreach ($devices as $key => $device) {

	if( isset( $device['variations'] ) ) {
		foreach($device['variations'] as $variation_key => $variation) {
			$generator->createPlaceholder($key.$variation_key);
		}
	} else {
		$generator->createPlaceholder($key);
	}
	echo 'Generated ' . $key . '<br/>';
}
