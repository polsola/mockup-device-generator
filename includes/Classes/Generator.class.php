<?php
namespace Classes;

use PHPImageWorkshop\ImageWorkshop;
use Classes\Template as Template;

class Generator {
		// Function to create device
		public function createDevice( $screen, $device ) {

			$devices = Template::getDevices();

			$device_array = explode('--', $device);

			$device_atts = $devices[ $device_array[0] ];

			$device_image = $device.'.png';

			$device = ImageWorkshop::initFromPath('assets/images/devices/'.$device_image);
			$screen = create_screen($screen, $device_atts);
			$device->addLayer(1, $screen, $device_atts['screen']['x'], $device_atts['screen']['y'], 'LT');

			return $device;
		}
}
