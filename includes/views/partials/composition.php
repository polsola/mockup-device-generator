<?php

namespace uploadComposition;

require __DIR__ . '../../../../vendor/autoload.php';
require __DIR__ . '../../../../autoload.php';

use Classes\Template as Template;

$compositions = Template::getCompositions();
$devices = Template::getDevices();
$composition = $compositions[$_GET['composition']];
?>
<ul class="composition-devices">
<?php foreach($composition['layers'] as $index => $layer):
    $device = $devices[$layer['device']]; ?>
    <li class="devices__item">
        <span class="devices__item__link" data-device-name="<?php echo $device['name']; ?>" data-screen-width="<?php echo $device['screen']['width']; ?>" data-screen-height="<?php echo $device['screen']['height']; ?>">
            <span class="devices__item__link__index"><?php echo $index+1; ?></span>
            <span class="devices__item__link__placeholder">
                <span class="devices__item__link__device" data-original-image="<?php echo $layer['device']; ?>" style="background-image: url('static/images/devices/placeholder/<?php echo $layer['device'].'.png' ?>');">
                </span>
            </span>
            <span class="devices__item__name">
                <?php echo $device['name']; ?>
                <?php if( isset( $device['variations'] ) ){ ?>
                    <small data-original-variation="<?php echo $device['variations']['']; ?>"><?php echo $device['variations']['']; ?></small>
                <?php } ?>
            </span>
            <?php if( isset( $device['variations'] ) ){ ?>
                <ul class="variations">
                    <?php foreach ($device['variations'] as $key_variation => $device_variation) { ?>
                        <li class="variations__item variations__item<?php echo $key_variation; ?>" data-image="<?php echo $layer['device'].$key_variation; ?>" data-variation="<?php echo $key_variation; ?>">
                            <span class="variations__item__link" href="<?php echo $layer['device'].$key_variation; ?>" data-device-name="<?php echo $device['name']; ?> <?php echo $device_variation; ?>">
                                <span class="variations__item__name"><?php echo $device_variation; ?></span>
                            </span>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?><!-- End variations -->
        </span>
    </li>
<?php endforeach; ?>
</ul>