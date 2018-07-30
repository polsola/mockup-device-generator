Dropzone.autoDiscover = false;

var processQueue = true;

$(function () {
    // Device list click function
    $('.devices li a').click(function (e) {
        $('#composition-options').slideUp().empty();
        $.get("/includes/views/partials/composition.php", { composition: $(this).attr('href') })
            .done(function (data) {
                $('#composition-options').html(data).slideDown();
            });
    });

    var myDropzone = new Dropzone("#screen-uploader", {
        maxFiles: 4,
        parallelUploads: 10000,
        uploadMultiple: true,
        autoProcessQueue: false
    });

    myDropzone.on("addedfile", function (file, xhr, data) {
        var compositionLayersCount = $('.devices__item__link--active').data('layers-count');
        setTimeout(function () {
            console.log('Files:', myDropzone.getAcceptedFiles().length, compositionLayersCount);
            if (myDropzone.getAcceptedFiles().length >= compositionLayersCount && processQueue) {
                console.log('Time to process!');
                myDropzone.processQueue();
                processQueue = false;
            }
        }, 10);
    });

    myDropzone.on("sending", function (file, xhr, data) {
        var composition = $('#device-pick').val();
        data.append("composition", composition);
    });

    myDropzone.on("successmultiple", function (file, response) {
        console.log(response);
        $('.generated').append('<div class="generated__item"><img src="' + response + '"></div>');
        $('.generated_count').html($('.generated img').length);
        processQueue = true;
        myDropzone.removeAllFiles();
    });

    // Trigger click on first item on load
    $('.app__nav__section:first-child .devices .devices__item:first-child .devices__item__link').trigger('click');

});