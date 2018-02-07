<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;

class Template {
	public static function getDevices() {
		return require_once __DIR__ . '/../templates/devices.php';
	}
}
