// Disabling autoDiscover, otherwise Dropzone will try to attach twice.
Dropzone.autoDiscover = false;

$(function () {

    // Create the dropzone and setup
    var myDropzone = new Dropzone("#screen-uploader");

    myDropzone.on("success", function (file, response) {
        console.log(response);
        $('.generated').append('<div class="generated__item"><img src="' + response + '"></div>');
        $('.generated_count').html($('.generated img').length);
    });

    myDropzone.on('error', function (file, response) {
        console.log(response);
    });

    myDropzone.on("sending", function (file, xhr, data) {
        var device = $('#device-pick').val();
        var orientation = $('input[name="orientation"]:checked').val();
        data.append("device", device);
        data.append("orientation", orientation);
    });
});