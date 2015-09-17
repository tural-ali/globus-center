function initialize() {
    var mapOptions = {
        zoom: 15,
        scrollwheel: false,
        center: new google.maps.LatLng(40.3854267, 49.828361)
    };

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        mapOptions.zoom = 11;
    }


    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);


    var kmlLayer = new google.maps.KmlLayer();

    var kmlUrl = 'http://globuscenter.az/map.kmz';
    var kmlOptions = {
        suppressInfoWindows: true,
        preserveViewport: true,
        map: map
    };
    var kmlLayer = new google.maps.KmlLayer(kmlUrl, kmlOptions);

}

google.maps.event.addDomListener(window, 'load', initialize);


$(function () {
    $("li.inpage").click(function () {
        $("#menu li").removeClass("active");
        $(this).addClass("active");
    });


    $('#camera_wrap_1').camera({
        transPeriod: 500,
        time: 3000,
        height: '490px',
        thumbnails: false,
        pagination: true,
        playPause: false,
        loader: false,
        navigation: false,
        hover: false
    });


    setTimeout(function () {
        $('#counter').text('0');
        $('#counter1').text('0');
        $('#counter2').text('0');
        setInterval(function () {

            var curval = parseInt($('#counter').text().replace(' ', ''));
            var curval1 = parseInt($('#counter1').text().replace(' ', ''));
            var curval2 = parseInt($('#counter2').text().replace(' ', ''));
            if (curval < 65000) {
                $('#counter').text(sdf_FTS((curval + 200), 0, ' '));
            }
            if (curval1 < 15000) {
                $('#counter1').text(sdf_FTS((curval1 + 100), 0, ' '));
            }
            if (curval2 < 30000) {
                $('#counter2').text(sdf_FTS((curval2 + 150), 0, ' '));
            }
        }, 2);

    }, 500);


    $('.navmenu ul li a').click(function () {
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
        return false;
    });


});
