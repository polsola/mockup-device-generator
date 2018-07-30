
$(function () {

	// Device list click function
	$('.devices li a').click(function (e) {
		$('#device-pick').val($(this).attr('href'));
		$('.devices li a').removeClass('devices__item__link--active');
		$(this).addClass('devices__item__link--active');
		$('.device_selected').html($(this).data('device-name'));
		if ($('small', $(this)).length > 0) {
			$('.device_selected').append('<small>' + $('small', $(this)).text() + '</small>');
		}
		$('.screen-width').html($(this).data('screen-width'));
		$('.screen-height').html($(this).data('screen-height'));
		e.preventDefault();
	});

	// Preview image on hover variation
	$('.variations .variations__item').hover(function (e) {

		var image = $(this).data('image');
		var variation = $(this).data('variation');
		var $deviceLink = $(this).closest('.devices__item__link');
		var $device = $deviceLink.find('.devices__item__link__device');

		var backgroundUrl = 'assets/images/devices/placeholder/' + image + '.png';
		$deviceLink.find('small').html($(this).text());
		$deviceLink.find('.devices__item__link__placeholder').addClass('devices__item__link__placeholder--variation' + variation);
		$device.css('background-image', 'url(' + backgroundUrl + ')');

	}, function (e) {

		var variation = $(this).data('variation');
		var $deviceLink = $(this).closest('.devices__item__link');
		var $device = $deviceLink.find('.devices__item__link__device');
		var $deviceLinkSmall = $deviceLink.find('small');

		var backgroundUrl = 'assets/images/devices/placeholder/' + $device.data('original-image') + '.png';
		$deviceLink.find('.devices__item__link__placeholder').removeClass('devices__item__link__placeholder--variation' + variation);
		$deviceLinkSmall.html($deviceLinkSmall.data('original-variation'));
		$device.css('background-image', 'url(' + backgroundUrl + ')');
	});

	// Mantain variation on click
	$('.variations .variations__item').click(function (e) {

		var image = $(this).data('image');
		var variation = $(this).data('variation');
		var $deviceLink = $(this).closest('.devices__item__link');
		var $device = $deviceLink.find('.devices__item__link__device');
		var $deviceLinkSmall = $deviceLink.find('small');

		$deviceLink.attr('href', image);
		$device.data('original-image', image);
		$deviceLinkSmall.data('original-variation', $(this).text());
		$deviceLink.find('.devices__item__link__placeholder').addClass('devices__item__link__placeholder--variation' + variation);
	});

	// Trigger click on first item on load
	$('.app__nav__section:first-child .devices .devices__item:first-child .devices__item__link').trigger('click');

	// Orientation switcher: Change it for devaices that can rotate
	$('.orientation__item').click(function (e) {
		$('.orientation__item').removeClass('orientation__item--active');
		$(this).addClass('orientation__item--active');
		if ($(this).find('input').val() == 'landscape') {
			$('.devices__item__link__device--rotate').addClass('devices__item__link__device--landscape');
		} else {
			$('.devices__item__link__device--rotate').removeClass('devices__item__link__device--landscape');
		}
	});

})
