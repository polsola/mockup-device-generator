<?php

function dig_autoloader($class) {
    //include 'includes/' . $class . '.class.php';
		require_once __DIR__ . "/includes/Classes/{$class}.class.php";
}

spl_autoload_register('dig_autoloader');
