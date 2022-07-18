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
	<form action="{{ route('admin.ambulance.update',  $institution->id ) }}" method="POST" >
		@csrf
		@method('put')

		<div class="mb-6 flex flex-col">
			<label>Institution Name</label>
			<input type="text" placeholder="Enter Institution Name" name="name" id="name" value="{{ $institution->name }}">
		</div>

		<div class="mb-6 flex flex-col">
			<label>Number of Ambulances</label>
			<input type="number" name="ambulances" id="ambulances" placeholder="Enter the number of ambulances" value="{{ $institution->ambulances }}">
		</div>

		<div class="mb-6 flex flex-col">
			<label>Contact</label>
			<input type="tel" name="contact" id="contact" placeholder="Enter Contact" value="">
		</div>

		<div class="mb-6">
			<input type="hidden" value="" name="latitude" placeholder="Enter latitude" id="latitude" value="{{ json_decode($institution->location)->latitude }}">
		</div>
		<div class="mb-6">
			<input type="hidden" value="" name="longitude" placeholder="Enter longitude" id="longitude" value="{{ json_decode($institution->location)->longitude }}">
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

	const center = [
{{ json_decode($institution->location)->longitude }}
,{{ json_decode($institution->location)->latitude }}
	];

	console.log(center);



			mapboxgl.accessToken = 'pk.eyJ1IjoiY2FyYXhlcyIsImEiOiJjbDVtd2wwd3cweTFsM2pubWQ5OWNvbm1iIn0.muHnDuINt8nGXHt0StCiKw';
		const map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11',

		center: center,
		bbox: [33.9098987,-4.8995204, 41.899578,4.62], // Set the bounding box coordinates
		zoom: 14
		});




		const marker1 = new mapboxgl.Marker({
			draggable: true,
		})
		.setLngLat(center)
		.addTo(map);
       const nav = new mapboxgl.NavigationControl();
    	map.addControl(nav,'top-right');


    	marker1.on('dragend',function(e){
        var lngLat = e.target.getLngLat();
        console.log(lngLat['lat'])
        console.log(lngLat['lng'])
        lat.value = lngLat['lat'];
        lng.value =lngLat['lng'];

      })






const lat = document.getElementById('latitude');
const lng = document.getElementById('longitude');


</script>
 
</body>
</html>