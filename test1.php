<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<!-- tried to use different input method-->
<!--<form action="p1.php" method="get">
Latitude: <input type="number" name="lat"><br>
Longitude: <input type="number" name="lng"><br>
Type: <input type="text" name="type"><br>
<input type="submit">
</form>
-->
<!--
<button onclick="setType(A)">A</button>
<button onclick="setType(B)">B</button>
<button onclick="setType(C)">C</button>
<button onclick="setType(D)">D</button>
-->
<form  style="padding:20px" action="p1.php" method="get">
<input type="text" name="tf">
<input type="submit">
</form>

<!--script to use google map-->
<script>
var map;
var nwmrkr=0;
var markers = [];
var myCenter=new google.maps.LatLng(24,78);
var typ;  //getting type

function setType (tp){
    typ=tp;
	//window.location.href = "/purple/p1.php?lat=" + event.latLng.lat() + "&lng=" + event.latLng.lng();
	
}

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:4,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  google.maps.event.addListener(map, 'click', function(event) {
	deleteMarkers();
    placeMarker(event.latLng);
	//document.getElementById("tf").innerHTML=event.latLng.lat();
	
	window.location.href = "/purple/p1.php?lat=" + event.latLng.lat() + "&lng=" + event.latLng.lng()  ;
  //document.getElementById("tf").submit();
  });
}

function placeMarker(location) {
	//setMap(null);
	
   marker = new google.maps.Marker({
    position: location,
    map: map,
  });
  markers.push(marker);
  infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  
  infowindow.open(map,marker);
}
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

function deleteMarkers() {
  clearMarkers();
  markers = [];
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>

</body>
</html>
