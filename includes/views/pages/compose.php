<?php include('includes/views/partials/header.php'); ?>
	<div class="app__nav__container">
		<div class="app__nav__header">
			<h2>Pick a composition</h2>
		</div>
		<aside class="app__nav">
			<?php foreach ($compositionCategories as $key => $category) { ?>
				<section class="app__nav__section">
					<h4 class="app__nav__section__title"><?php echo $category['label']; ?></h4>
					<ul class="devices">
					<?php foreach ($category['compositions'] as $key => $composition) { ?>
						<li class="devices__item">
							<a class="devices__item__link devices__item__link--landscape" href="<?php echo $key; ?>" data-device-name="<?php echo $composition['name']; ?>" data-layers-count="<?php echo count($composition['layers']); ?>" data-layers="<?php echo htmlspecialchars(json_encode($composition['layers']), ENT_QUOTES, 'UTF-8'); ?>">
								<span class="devices__item__link__placeholder">
									<span class="devices__item__link__device" data-original-image="<?php echo $key; ?>" style="background-image: url('static/images/compositions/placeholder/<?php echo $key.'.png' ?>');">
									</span>
								</span>
								<span class="devices__item__name"><?php echo $composition['name']; ?></span>
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
				</section>
			<?php } ?><!-- End categories -->
			<input id="device-pick" name="device-pick" type="hidden" />
			<input id="composition-pick" name="composition-pick" type="hidden" />
			<input id="composition-devices-count" name="composition-devices-count" type="hidden" />
		</aside>
	</div>
	<section class="app__main">
		<div id="composition-options" class="composition-options">
		</div>
		<form action="upload-composition.php" id="screen-uploader" class="dropzone">
			<div class="fallback">
				<input name="file" type="file" multiple />
			</div>
		</form>
		<h2><span class="generated_count">0</span> images generated</h2>
		<div class="generated">
		</div>
	</section>
	<script type="text/javascript" src="/static/scripts/upload-composition.js"></script>
<?php include('includes/views/partials/footer.php'); ?>
