//contact form

var $form = $(".contact-form");
$form.validate({
  rules: {
    username: {
      minlength: 5,
    },

    email: {
      email: true,
    },
    message: {
      minlength: 20,
      maxlength: 500,
    },
  },

  messages: {},
  submitHandler: function () {
    swal.fire({
      title: "تم إرسال الرسالة بنجاح",
      type: "success",
      showConfirmButton: false,
      timer: 1500,
    });
    setTimeout(function () {
      $form[0].submit();
    }, 3000);
  },
});

//map
function initMap() {
  var myLatlng = new google.maps.LatLng(5.376964, 100.399383); // Add the coordinates
  var mapOptions = {
    zoom: 16, // The initial zoom level when your map loads (0-20)
    zoomControl: false,
    center: myLatlng, // Centre the Map to our coordinates variable
    mapTypeId: google.maps.MapTypeId.ROADMAP, // Set the type of Map
    scrollwheel: false, // Disable Mouse Scroll zooming (Essential for responsive sites!)
    draggable: false,
  };
  var map = new google.maps.Map(
    document.getElementById("map-canvas"),
    mapOptions
  ); // Render our map within the empty div
  var image = new google.maps.MarkerImage(
    "images/main/marker.png",
    null,
    null,
    null,
    new google.maps.Size(65, 103)
  ); // Create a variable for our marker image.
  var marker = new google.maps.Marker({
    // Set the marker
    position: myLatlng, // Position marker to coordinates
    icon: image, //use our image as the marker
    map: map, // assign the market to our map variable
    title: "عرض المزيد من التفاصيل", // Marker ALT Text
  });
  // 	google.maps.event.addListener(marker, 'click', function() { // Add a Click Listener to our marker
  //		window.location='https://www.snowdonrailway.co.uk/shop_and_cafe.php'; // URL to Link Marker to (i.e Google Places Listing)
  // 	});
  var infowindow = new google.maps.InfoWindow({
    // Create a new InfoWindow
    content: "الحسيني لخزانات المياه", // HTML contents of the InfoWindow
  });
  google.maps.event.addListener(marker, "click", function () {
    // Add a Click Listener to our marker
    infowindow.open(map, marker); // Open our InfoWindow
  });
  google.maps.event.addDomListener(window, "resize", function () {
    map.setCenter(myLatlng);
  }); // Keeps the Pin Central when resizing the browser on responsive sites
}
