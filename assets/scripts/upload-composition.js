Dropzone.autoDiscover = false;

$(function () {

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
            if (myDropzone.getAcceptedFiles().length >= compositionLayersCount) {
                console.log('Time to process!');
                myDropzone.processQueue();
            }
        }, 10);
    });

    myDropzone.on("sending", function (file, xhr, data) {
        var composition = $('#device-pick').val();
        data.append("composition", composition);
    });

    myDropzone.on("success", function (file, response) {
        console.log(response);
        $('.generated').append('<div class="generated__item"><img src="' + response + '"></div>');
        $('.generated_count').html($('.generated img').length);
    });

});