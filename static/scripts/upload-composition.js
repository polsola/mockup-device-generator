var processQueue=!(Dropzone.autoDiscover=!1);$(function(){$(".devices li a").click(function(e){$("#composition-options").slideUp().empty(),$.get("/includes/views/partials/composition.php",{composition:$(this).attr("href")}).done(function(e){$("#composition-options").html(e).slideDown()})});var t=new Dropzone("#screen-uploader",{maxFiles:4,parallelUploads:1e4,uploadMultiple:!0,autoProcessQueue:!1});t.on("addedfile",function(e,i,o){var s=$(".devices__item__link--active").data("layers-count");setTimeout(function(){console.log("Files:",t.getAcceptedFiles().length,s),t.getAcceptedFiles().length>=s&&processQueue&&(console.log("Time to process!"),t.processQueue(),processQueue=!1)},10)}),t.on("sending",function(e,i,o){var s=$("#device-pick").val();o.append("composition",s)}),t.on("successmultiple",function(e,i){console.log(i),$(".generated").append('<div class="generated__item"><img src="'+i+'"></div>'),$(".generated_count").html($(".generated img").length),processQueue=!0,t.removeAllFiles()}),$(".app__nav__section:first-child .devices .devices__item:first-child .devices__item__link").trigger("click")});