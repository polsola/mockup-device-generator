<?php


$config = include('config.php');

function dig_autoloader($class) {
    //include 'includes/' . $class . '.class.php';
		require_once __DIR__ . '/includes/' . str_replace('\\', '/', $class) . '.class.php';
}

spl_autoload_register('dig_autoloader');

define( 'DOCUMENT_ROOT', realpath( $_SERVER["DOCUMENT_ROOT"] ) );

