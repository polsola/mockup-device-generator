<?php include('header.php'); ?>
		<h2>Pick a device: <span class="device_selected"></span></h2>
		<ul class="devices">
		<?php foreach ($devices as $key => $device) { ?>
			<li class="devices__item">
				<a class="devices__item__link devices__item__link--<?php echo get_device_orientation( $key ); ?>" href="<?php echo $key; ?>" data-device-name="<?php echo $device['name']; ?>">
					<img src="devices/<?php echo $key.'.png' ?>" />
					<span class="devices__item__name"><?php echo $device['name']; ?></span>
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
		<input id="device-pick" name="device-pick" type="hidden" />
		<h2>Drop screenshots here:</h2>
		<form action="upload.php" id="screen-uploader" class="dropzone">
			<div class="fallback">
				<input name="file" type="file" multiple />
			</div>
		</form>
		<h2><span class="generated_count">0</span> images generated</h2>
		<div class="generated">
		</div>
<?php include('footer.php'); ?>