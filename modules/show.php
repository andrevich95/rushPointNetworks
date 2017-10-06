<?php
var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	 <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {<?php echo 'lat: 12, lng: 131.044';?>};
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA60595FC2puYFMkABHsbo6dQN8VCZdDFM&callback=initMap">
    </script>
</body>
</html>