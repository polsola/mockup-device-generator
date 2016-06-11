<?php include('header.php'); ?>	
	<h2>Pick a device: <span class="device_selected"></span></h2>
	<ul class="devices">
	<?php foreach ($compositions as $key => $composition) { ?>
		<li class="devices__item">
			<a class="devices__item__link devices__item__link--landscape" href="<?php echo $key; ?>" data-device-name="<?php /*echo $device['name'];*/ ?>">
				<img src="compositions/<?php echo generate_composition_thumbnail($key, $composition) ?>" />
				<span class="devices__item__name"><?php /*echo $device['name'];*/ ?></span>
			</a>
			<?php if( isset( $device['variations'] ) ){ ?>
				<ul class="variations">
					<?php foreach ($device['variations'] as $key_variation => $device_variation) { ?>
						<li class="variations__item">
							<a class="variations__item__link" href="<?php echo $key.$key_variation; ?>" data-device-name="<?php echo $device['name']; ?> <?php echo $device_variation; ?>">
								<img src="devices/<?php echo $key.$key_variation.'.png'; ?>" />
								<span class="variations__item__name"><?php echo $device_variation; ?></span>
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?><!-- End variations -->
		</li>
	<?php } ?><!-- End devices -->
	</ul>
<?php include('footer.php'); ?>