
  //contact form 
  
  var $form = $(".contact-form");
  $form.validate({
      errorPlacement: function errorPlacement(error, element) {
          if ((element.attr("type") == "select")) {
              error.after(element);
          } else {
              element.after(error)
          }
      },
  
      rules: {
          username:{
              minlength:5
          },
  
          email:{
              email:true
          },
          message:{
              minlength:20,
              maxlength:500
          }
      },
  
      messages: {},
      submitHandler: function () {
          swal.fire({
              title: 'تم إرسال الرسالة بنجاح',
              type: 'success',
              showConfirmButton: false,
              timer: 1500
          });
          setTimeout(function () {
              $form[0].submit();
          }, 3000)
      }
  });

  $("#map-text").on("click", () => {
    $("#map").show();
    $("#pac-input").attr("readonly", false);
});


//map
$("#map-text").on("click", () => {
    $("#map").show();
});

function initMap() {
    var lat = 24.774265,
    lng = 46.738586;
    const map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: lat,
            lng: lng
        },
        zoom: 13,
        mapTypeId: "roadmap",
    });
    // Create the search box and link it to the UI element.
    const input = document.getElementById("pac-input");
    const searchBox = new google.maps.places.SearchBox(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });
    let markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }
        // Clear out the old markers.
        markers.forEach((marker) => {
            marker.setMap(null);
        });
        markers = [];
        // For each place, get the icon, name and location.
        const bounds = new google.maps.LatLngBounds();
        places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
            }
            const icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25),
            };
            // Create a marker for each place.
            markers.push(
                new google.maps.Marker({
                    map,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                })
            );

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
  // Add address marker on map
  var address_marker = new google.maps.Marker({
    position: {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
    },
    draggable: true,
});

    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.getElementById("myloc");
    function geocodePosition(pos) {
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({
            latLng: pos
        }, function (responses) {
            if (responses && responses.length > 0) {
                updateMarkerAddress(responses[0].formatted_address);
                infoWindow.setContent(responses[0].formatted_address);
            } else {
                updateMarkerAddress('لم نتمكن من تحديد موقعك');
            }
        });
    }
    locationButton.addEventListener("click", () => {
           // Try HTML5 geolocation.
           if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    geocodePosition(pos)
                    infoWindow.open(map);
                    map.setCenter(pos);
                    placeMarker(pos)
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });

 // To add the marker to the map, call setMap();
 address_marker.setMap(map);

 // Add event listner to address_marker
 google.maps.event.addListener(address_marker, 'dragend', function (event) {
     placeMarker(event.latLng);

 });

 google.maps.event.addListener(map, 'click', function (event) {
     placeMarker(event.latLng);
 });

 function placeMarker(location) {
     address_marker.setPosition(location);
     map.setCenter(location);
     geocodePosition(address_marker.getPosition());
     infoWindow.setPosition(location);

 }
}

function updateMarkerAddress(address) {
    $('#pac-input').val(address);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation ?
        "لم نتمكن من تحديد موقعك'" :
        "متصفحك لا يدعم تحديد الموقع"
    );
    infoWindow.open(map);
}
