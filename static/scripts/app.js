var placeholderBaseUrl="static/images/devices/placeholder/small/";$(function(){$(".devices li a").click(function(i){$("#device-pick").val($(this).attr("href")),$(".devices li a").removeClass("devices__item__link--active"),$(this).addClass("devices__item__link--active"),$(".device_selected").html($(this).data("device-name")),0<$("small",$(this)).length&&$(".device_selected").append("<small>"+$("small",$(this)).text()+"</small>"),$(".screen-width").html($(this).data("screen-width")),$(".screen-height").html($(this).data("screen-height")),i.preventDefault()}),$("body").on("mouseenter",".variations .variations__item",function(i){var e=$(this).data("image"),a=$(this).data("variation"),t=$(this).closest(".devices__item__link"),s=t.find(".devices__item__link__device");if(!$(this).hasClass("variations__item--active")){var _=placeholderBaseUrl+e+".png";t.find("small").html($(this).text()),t.find(".devices__item__link__placeholder").addClass("devices__item__link__placeholder--variation"+a),s.css("background-image","url("+_+")")}}),$("body").on("mouseleave",".variations .variations__item",function(i){var e=$(this).data("variation"),a=$(this).closest(".devices__item__link"),t=a.find(".devices__item__link__device"),s=a.find("small");if(!$(this).hasClass("variations__item--active")){var _=placeholderBaseUrl+t.data("original-image")+".png";a.find(".devices__item__link__placeholder").removeClass("devices__item__link__placeholder--variation"+e),s.html(s.data("original-variation")),t.css("background-image","url("+_+")")}}),$("body").on("click",".variations .variations__item",function(i){var e=$(this).closest(".devices__item__link");$(".variations__item",e).removeClass("variations__item--active"),$(this).addClass("variations__item--active")}),$(".orientation__item").click(function(i){$(".orientation__item").removeClass("orientation__item--active"),$(this).addClass("orientation__item--active"),"landscape"==$(this).find("input").val()?$(".devices__item__link__device--rotate").addClass("devices__item__link__device--landscape"):$(".devices__item__link__device--rotate").removeClass("devices__item__link__device--landscape")})});