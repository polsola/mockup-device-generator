var placeholderBaseUrl = 'static/images/devices/placeholder/small/';
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

		$('.app__nav__container').removeClass('app__nav__container--active');

		e.preventDefault();
	});

	// Preview image on hover variation
	$('body').on('mouseenter', '.variations .variations__item', function (e) {

		var image = $(this).data('image');
		var variation = $(this).data('variation');
		var $deviceLink = $(this).closest('.devices__item__link');
		var $device = $deviceLink.find('.devices__item__link__device');

		if (!$(this).hasClass('variations__item--active')) {
			var backgroundUrl = placeholderBaseUrl + image + '.png';
			$deviceLink.find('.current-variation').html($(this).text());
			$deviceLink.find('.devices__item__link__placeholder').addClass('devices__item__link__placeholder--variation' + variation);
			$device.css('background-image', 'url(' + backgroundUrl + ')');
		}

	});

	// Reset on leave
	$('body').on('mouseleave', '.variations .variations__item', function (e) {

		var variation = $(this).data('variation');
		var $deviceLink = $(this).closest('.devices__item__link');
		var $device = $deviceLink.find('.devices__item__link__device');
		var $deviceLinkSmall = $deviceLink.find('.current-variation');

		//console.log($(this).hasClass('variations__item--active'));

		if (!$(this).hasClass('variations__item--active')) {
			var backgroundUrl = placeholderBaseUrl + $device.data('original-image') + '.png';
			//console.log(backgroundUrl);
			$deviceLink.find('.devices__item__link__placeholder').removeClass('devices__item__link__placeholder--variation' + variation);
			$deviceLinkSmall.html($deviceLinkSmall.data('original-variation'));
			$device.css('background-image', 'url(' + backgroundUrl + ')');
		}

	});

	// Mantain variation on click
	$('body').on('click', '.variations .variations__item', function (e) {
		/*
		
		var variation = $(this).data('variation');
		
		var $device = $deviceLink.find('.devices__item__link__device');
		var $deviceLinkSmall = $deviceLink.find('small');*/

		var $deviceLink = $(this).closest('.devices__item__link');
		var image = $(this).data('image');

		$('.variations__item', $deviceLink).removeClass('variations__item--active');
		$(this).addClass('variations__item--active');

		$deviceLink.attr('href', image);
		$('#device-pick').val(image);
		/*
		
		$device.data('original-image', image);
		$deviceLinkSmall.data('original-variation', $(this).text());
		$deviceLink.find('.devices__item__link__placeholder').addClass('devices__item__link__placeholder--variation' + variation);*/
	});

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

	$('.toogle-app-nav').click(function(e){
		$('.app__nav__container').toggleClass('app__nav__container--active');
	});

})
