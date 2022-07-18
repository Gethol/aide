<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Set a point after Geocoder result</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>

<body>
 
<style>
#geocoder-container > div {
min-width: 50%;
margin-left: 25%;
}
</style>



<div class="flex flex-col">
<div id="map" style="width: 50%; height:75vh;"></div>




<div class="mt-8" style="margin-top: 40%;">
	<form action="{{ route('admin.ambulance.store') }}" method="POST" >
		@csrf

		<div class="mb-6">
			<input type="text" placeholder="Enter Institution Name" name="name" id="name">
		</div>

		<div class="mb-6">
			<input type="number" name="ambulances" id="ambulances" placeholder="Enter the number of ambulances">
		</div>

		<div class="mb-6">
			<input type="tel" name="contact" id="contact" placeholder="Enter Contact">
		</div>

		<div class="mb-6">
			<input type="hidden" value="" name="latitude" placeholder="Enter latitude" id="latitude">
		</div>
		<div class="mb-6">
			<input type="hidden" value="" name="longitude" placeholder="Enter longitude" id="longitude">
		</div>
		<div class="mb-6">
			<input type="submit" name="submit" value="Submit">
		</div>

		<div class="mb-6"></div>
	</form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>



 
<script>




	mapboxgl.accessToken = 'pk.eyJ1IjoiY2FyYXhlcyIsImEiOiJjbDVtd2wwd3cweTFsM2pubWQ5OWNvbm1iIn0.muHnDuINt8nGXHt0StCiKw';
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [37.9062, -0.0236],
bbox: [33.9098987,-4.8995204, 41.899578,4.62], // Set the bounding box coordinates
zoom: 10
});
       const nav = new mapboxgl.NavigationControl();
    map.addControl(nav,'top-right');



		/* Given a query in the form "lng, lat" or "lat, lng"
		* returns the matching geographic coordinate(s)
		* as search results in carmen geojson format,
		* https://github.com/mapbox/carmen/blob/master/carmen-geojson.md */
		const coordinatesGeocoder = function (query) {
		// Match anything which looks like
		// decimal degrees coordinate pair.
		const matches = query.match(
		/^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
		);
		if (!matches) {
		return null;
		}
		 
		function coordinateFeature(lng, lat) {
		return {
		center: [lng, lat],
		geometry: {
		type: 'Point',
		coordinates: [lng, lat]
		},
		place_name: 'Lat: ' + lat + ' Lng: ' + lng,
		place_type: ['coordinate'],
		properties: {},
		type: 'Feature'
		};
		}
		 
		const coord1 = Number(matches[1]);
		const coord2 = Number(matches[2]);
		const geocodes = [];
		 
		if (coord1 < -90 || coord1 > 90) {
		// must be lng, lat
		geocodes.push(coordinateFeature(coord1, coord2));
		}
		 
		if (coord2 < -90 || coord2 > 90) {
		// must be lat, lng
		geocodes.push(coordinateFeature(coord2, coord1));
		}
		 
		if (geocodes.length === 0) {
		// else could be either lng, lat or lat, lng
		geocodes.push(coordinateFeature(coord1, coord2));
		geocodes.push(coordinateFeature(coord2, coord1));
		}
		 
		return geocodes;
		};





















 
	const geocoder = new MapboxGeocoder({
		accessToken: mapboxgl.accessToken,
		marker: {
			color: 'orange',
			draggable: true,
			center: map.center,
		},
		positionOptions: {
		enableHighAccuracy: true
		},
		trackUserLocation: true,
		showUserHeading: true,
		mapboxgl: mapboxgl,
		localGeocoder: coordinatesGeocoder,
		reverseGeocode: true
	});
	

	map.addControl(
	new mapboxgl.GeolocateControl({
	positionOptions: {
	enableHighAccuracy: true
	},
	// When active the map will receive updates to the device's location as it changes.
	trackUserLocation: true,
	// Draw an arrow next to the location dot to indicate which direction the device is heading.
	showUserHeading: true
	})
	);





const lat = document.getElementById('latitude');
const lng = document.getElementById('longitude');

geocoder.on('result', e => {

      geocoder.mapMarker.on('dragend',function(e){
        var lngLat = e.target.getLngLat();
        console.log(lngLat['lat'])
        console.log(lngLat['lng'])
        lat.value = lngLat['lat'];
        lng.value =lngLat['lng'];

      })
    })



 
map.addControl(geocoder, 'top-left' );
</script>
 
</body>
</html>