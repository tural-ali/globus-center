function sdf_FTS(_number, _decimal, _separator) {
    var decimal = (typeof(_decimal) != 'undefined') ? _decimal : 2;
    var separator = (typeof(_separator) != 'undefined') ? _separator : '';
    var r = parseFloat(_number)
    var exp10 = Math.pow(10, decimal);
    r = Math.round(r * exp10) / exp10;
    rr = Number(r).toFixed(decimal).toString().split('.');
    b = rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g, "\$1" + separator);
    r = (rr[1] ? b + '.' + rr[1] : b);

    return r;
}

$(function () {
    $('#menu').slicknav();

    $('.lbox').lightbox({blur: true});

    var $menu = $("#menuF");

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100 && $menu.hasClass("default")) {
            $menu.fadeOut('fast', function () {
                $(this).removeClass("default")
                    .addClass("fixed transbg")
                    .fadeIn('fast');
            });
        } else if ($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
            $menu.fadeOut('fast', function () {
                $(this).removeClass("fixed transbg")
                    .addClass("default")
                    .fadeIn('fast');
            });
        }
    });


    $('.navmenu ul li a').click(function () {
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
        return false;
    });

});
