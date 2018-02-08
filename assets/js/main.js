// This example uses jQuery so it creates the Dropzone, only when the DOM has
// loaded.

// Disabling autoDiscover, otherwise Dropzone will try to attach twice.
Dropzone.autoDiscover = false;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;

$(function() {
	$('.devices li a').click( function(e) {
		$('#device-pick').val( $(this).attr('href') );
		$('.devices li a').removeClass('devices__item__link--active');
		$(this).addClass('devices__item__link--active');
		$('.device_selected').html( $(this).data('device-name') );
		e.preventDefault();
	});
	// Now that the DOM is fully loaded, create the dropzone, and setup the
	// event listeners
	var myDropzone = new Dropzone("#screen-uploader");

	myDropzone.on("success", function(file, response) {
		$('.generated').append('<div class="generated__item">' + response + '</div>');
		$('.generated_count').html( $('.generated img').length );
	});

	myDropzone.on("sending", function(file, xhr, data) {
		var device = $('#device-pick').val();
	    data.append("device", device);
	});

	$('.variations .variations__item').hover(function(e){
		var image = $(this).data('image');
		var $device = $(this).closest('.devices__item__link').find('.devices__item__link__device');
		var backgroundUrl = 'assets/images/devices/' + image + '.png';
		$device.css('background-image', 'url(' + backgroundUrl + ')');
	}, function(e){
		var $device = $(this).closest('.devices__item__link').find('.devices__item__link__device');
		var backgroundUrl = 'assets/images/devices/' + $device.data('original-image') + '.png';
		$device.css('background-image', 'url(' + backgroundUrl + ')');
	});

	$('.variations .variations__item').click(function(e){
		var image = $(this).data('image');
		var $deviceLink = $(this).closest('.devices__item__link');
		var $device = $deviceLink.find('.devices__item__link__device');
		$deviceLink.attr('href', image);
		$device.data('original-image', image);
	});

	$('.devices .devices__item:first-child .devices__item__link').trigger('click');

})
