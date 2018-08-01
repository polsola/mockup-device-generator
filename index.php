<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';

use PHPImageWorkshop\ImageWorkshop;

use Classes\Template as Template;


if (!file_exists(DOCUMENT_ROOT . '/config.php')) {
	echo 'No <strong>config.php</strong> file detected, create one';
	return;
}


if( isset($_GET['page']) && $_GET['page'] == 'compose' ) {
	$page = 'compose';
	$compositionCategories = Template::getCompositions(true);
	require_once('includes/views/pages/compose.php');
} else {
	$page = 'index';
	$deviceCategories = Template::getDevices(true);
	require_once('includes/views/pages/index.php');
}
