<?php include('header.php'); ?>
	<div class="app__nav__header">
		<h2>Pick a device</h2>
		<div class="orientation">
			<label for="orientation-portrait" class="orientation__item orientation__item--portrait orientation__item--active">Portrait
				<input id="orientation-portrait" type="radio" name="orientation" value="portrait" checked>
			</label>
			<label for="orientation-landscape" class="orientation__item orientation__item--landscape">Landscape
				<input id="orientation-landscape" type="radio" name="orientation" value="landscape">
			</label>
		</div>
	</div>
	<aside class="app__nav">
		<ul class="devices">
		<?php foreach ($devices as $key => $device) { ?>
			<li class="devices__item">
				<a class="devices__item__link" href="<?php echo $key; ?>" data-device-name="<?php echo $device['name']; ?>">
					<span class="devices__item__link__placeholder">
						<span class="devices__item__link__device<?php if(isset($device['landscape'])): ?> devices__item__link__device--rotate<?php endif; ?>" data-original-image="<?php echo $key; ?>" style="background-image: url('assets/images/devices/placeholder/<?php echo $key.'.png' ?>');">
						</span>
					</span>
					<span class="devices__item__name"><?php echo $device['name']; ?></span>
					<?php if( isset( $device['variations'] ) ){ ?>
						<ul class="variations">
							<?php foreach ($device['variations'] as $key_variation => $device_variation) { ?>
								<li class="variations__item variations__item<?php echo $key_variation; ?>" data-image="<?php echo $key.$key_variation; ?>">
									<span class="variations__item__link" href="<?php echo $key.$key_variation; ?>" data-device-name="<?php echo $device['name']; ?> <?php echo $device_variation; ?>">
										<!--<img src="assets/images/devices/<?php echo $key.$key_variation.'.png'; ?>" />-->
										<span class="variations__item__name"><?php echo $device_variation; ?></span>
									</span>
								</li>
							<?php } ?>
						</ul>
					<?php } ?><!-- End variations -->
				</a>
			</li>
		<?php } ?><!-- End devices -->
		</ul>
		<input id="device-pick" name="device-pick" type="hidden" />
	</aside>
	<section class="app__main">
		<form action="upload.php" id="screen-uploader" class="dropzone">
			<div class="fallback">
				<input name="file" type="file" multiple />
			</div>
		</form>
		<h2><span class="generated_count">0</span> images generated</h2>
		<div class="generated">
		</div>
	</section>
<?php include('footer.php'); ?>
