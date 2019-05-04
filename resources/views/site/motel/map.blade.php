<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initialize&libraries=geometry,places" async defer></script>
<script>
  var map;
  var marker;
  function initialize() {
    var mapOptions = {
      center: {lat: 9.923556, lng: 106.345886},
      zoom: 15,
      icon: "images/gps.png",
      draggable: true
    };

    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
        handleNoGeolocation(pos);
      }, function() {
        var pos = new google.maps.LatLng(9.923556, 106.345886);
        handleNoGeolocation(pos);
      });
    } else {
      var pos = new google.maps.LatLng(9.923556, 106.345886);
      handleNoGeolocation(pos);
    }

    function handleNoGeolocation(pos) {
      map.setCenter(pos);
      marker = new google.maps.Marker({
        position: pos,
        map: map,
        zoom: 16,
        icon: "images/gps.png",
        draggable: true
      });

      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#location-text-box').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });

      google.maps.event.addListener(marker, 'dragend', function() {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              $('#location-text-box').val(results[0].formatted_address);
              $('#txtlat').val(marker.getPosition().lat());
              $('#txtlng').val(marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            }
          }
        });
      });
    }

    var input = document.getElementById('location-text-box');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    marker = new google.maps.Marker({
      map: map,
      icon: "images/gps.png",
      anchorPoint: new google.maps.Point(0, -29),
      draggable: true
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': place.geometry.location}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#txtaddress').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(16);
      }
      marker.setIcon(({
        url: "images/gps.png"
      }));
      document.getElementById('txtlat').value = place.geometry.location.lat();
      document.getElementById('txtlng').value = place.geometry.location.lng();
      console.log(place.geometry.location.lat());
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);

      var address = '';
      if (place.address_components) {
        address = [
        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }
      google.maps.event.addListener(marker, 'dragend', function() {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              $('#location-text-box').val(results[0].formatted_address);
              $('#txtlat').val(marker.getPosition().lat());
              $('#txtlng').val(marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            }
          }
        });
      });
    });
  }
</script>