// This example uses jQuery so it creates the Dropzone, only when the DOM has
// loaded.

// Disabling autoDiscover, otherwise Dropzone will try to attach twice.
Dropzone.autoDiscover = false;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;

$(function() {
	$('.devices li a').click( function(e) {
		$('#device-pick').val( $(this).attr('href') );
		$('.device-pick li a').removeClass('selected');
		$(this).addClass('selected');
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

})