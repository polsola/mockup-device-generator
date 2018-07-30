<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../autoload.php';

use Classes\Template as Template;
use Classes\CompositionGenerator as CompositionGenerator;

$compositions = Template::getCompositions();
$generator = new CompositionGenerator();
ini_set('memory_limit','256M');
ini_set('max_execution_time', 300);

foreach ($compositions as $key => $composition) {

	$generator->createPlaceholder($key);

	echo 'Generated ' . $key . '<br/>';
}
