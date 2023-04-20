//map height
$(document).ready(function () {
    //progressbar
    var header = $("header").outerHeight(),
        search = $(".full-search").outerHeight(),
        windowHeight = $(window).height(),
        div_height = windowHeight - (header + search);
        $("#map").height(div_height)
});


//full-search-form  validation 
var $form_full = $(".full-search-form");
$.validator.addMethod("letters", (function (e, i) {
    return this.optional(i) || e == e.match(/^[a-zA-Z\s]*$/)
})), $form_full.validate({
    errorPlacement: function (e, i) {
        i.after(e)
    },
    rules: {},
    submitHandler: function () {
        $form_full[0].submit()
    }
});


//map
function initMap() {
    var locations = [
        [24.774265, 46.318586],
        [24.754265, 46.718586],
        [24.434265, 46.708586],
        [24.724265, 46.738586],
        [24.714265, 46.338586],
        [24.744265, 46.238586],
    ];

    // Setup the different icons and shadows  

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(24.774265, 46.738586),
        mapTypeId: google.maps.MapTypeId.ROADMAP,

    });


    var markers = new Array();

    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {
        var marker = new MarkerWithLabel({
            icon: ' ',
            position: new google.maps.LatLng(locations[i][0], locations[i][1]),
            labelContent: '<a href="product-details.html"  target="_blank" class="map-link"><img width="40px" height="40px" src="../images/icons/home.png"><div class="main-inner-label" >15000  رس</div></a>',
            labelClass: "maplabel", // the CSS class for the label
            labelAnchor: new google.maps.Point(-32, -65),
            map: map,
            url: 'product-details.html'
        });
        google.maps.event.addListener(marker, 'click', function () {
            window.location.href = this.url;
        })
        markers.push(marker);


    }

    function autoCenter() {
        //  Create a new viewpoint bound
        var bounds = new google.maps.LatLngBounds();
        //  Go through each...
        for (var i = 0; i < markers.length; i++) {
            bounds.extend(markers[i].position);
        }
        //  Fit these bounds to the map
        map.fitBounds(bounds);
    }
    autoCenter();

}