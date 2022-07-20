<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<script src="https://cdn.tailwindcss.com"></script>
	<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js'></script>
	<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css' rel='stylesheet'/>

		<!-- Geocoder plugin -->
	<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
	<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />

	<!-- Turf.js plugin -->
	<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>


<!-- 
	<link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css"> -->
	






	<style>
	  * {
	    box-sizing: border-box;
	  }
	  
	  body {
	    color: #404040;
	    font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
	    margin: 0;
	    padding: 0;
	    -webkit-font-smoothing: antialiased;
	  }

		body h3{
		font-size: 15px;
  	font-weight: 700;
  	position: relative;
		text-align: center;
		color: #0099FF;
		padding-top: 10px;
}
		

	#map { position: absolute; top: 0; margin-left: 20%; bottom: 0; width: 100%; }

		.listings {
	  height: 100%;
	  overflow: auto;
	  padding-bottom: 60px;
	}

	.listings .item {
	  border-bottom: 1px solid #eee;
	  padding: 10px;
	  text-decoration: none;
	}

	.listings .item:last-child { border-bottom: none; }

	.listings .item .title {
	  display: block;
	  color: #00853e;
	  font-weight: 700;
	}

	.listings .item .title small { font-weight: 400; }

	.listings .item.active .title,
	.listings .item .title:hover { color: #8cc63f; }

	.listings .item.active {
	  background-color: #f8f8f8;
	}

	::-webkit-scrollbar {
	  width: 3px;
	  height: 3px;
	  border-left: 0;
	  background: rgba(0, 0, 0, 0.1);
	}

	::-webkit-scrollbar-track {
	  background: none;
	}

	::-webkit-scrollbar-thumb {
	  background: #00853e;
	  border-radius: 0;
	}

	.mapboxgl-popup-close-button {
  display: none;
}

.mapboxgl-popup-content {
  font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
  padding: 0;
  width: 180px;
}

.mapboxgl-popup-content h3 {
  background: #91c949;
  color: #fff;
  margin: 0;
  padding: 10px;
  border-radius: 3px 3px 0 0;
  font-weight: 700;
  margin-top: -15px;
}

.mapboxgl-popup-content h4 {
  margin: 0;
  padding: 10px;
  font-weight: 400;
}

.mapboxgl-popup-content div {
  padding: 10px;
}

.mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
  margin-top: 15px;
}

.mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
  border-bottom-color: #91c949;
}

.marker {
  border: none;
  cursor: pointer;
  height: 32px;
  width: 32px;
  background-image: url('{{ asset("img/ambu.png")}}');
}

.mapboxgl-ctrl-geocoder {
  border: 0;
  border-radius: 0;
  position: relative;
  top: 0;
  width: 800px;
  margin-top: 0;
}

.mapboxgl-ctrl-geocoder > div {
  min-width: 100%;
  margin-left: 0;
}


	</style>



</head>




<body>


	<div class="flex">
	<div class='sidebar'>
	  <div class='heading'>
	    <h3>Emergency Service Providers</h3>
	  </div>
	  <div id='listings' class='listings'></div>
	</div>
	<div id="map" class="map"></div>

	</div>



<script>
	const stores = {!! $stores !!};






   mapboxgl.accessToken = 'pk.eyJ1IjoiY2FyYXhlcyIsImEiOiJjbDVtd2wwd3cweTFsM2pubWQ5OWNvbm1iIn0.muHnDuINt8nGXHt0StCiKw';
	  const map = new mapboxgl.Map({
	    container: 'map',
	    style: 'mapbox://styles/mapbox/streets-v11',
	    center: [36.8219,-1.2921],
	    zoom: 13,
	    scrollZoom: false
	});

    const nav = new mapboxgl.NavigationControl();
    map.addControl(nav,'top-right');



    function buildLocationList(stores) {
	  for (const store of stores.features) {
	    /* Add a new listing section to the sidebar. */
	    const listings = document.getElementById('listings');
	    const listing = listings.appendChild(document.createElement('div'));
	    /* Assign a unique `id` to the listing. */
	    listing.id = `listing-${store.properties.id}`;
	    /* Assign the `item` class to each listing for styling. */
	    listing.className = 'item';

	    /* Add the link to the individual listing created above. */
	    const link = listing.appendChild(document.createElement('a'));
	    link.href = '#';
	    link.className = 'title';
	    link.id = `link-${store.properties.id}`;
	    link.innerHTML = `${store.properties.name}`;

	    /* Add details to the individual listing. */
	    const details = listing.appendChild(document.createElement('div'));
	    details.innerHTML = `${store.properties.name}`;
	    if (store.properties.ambulances) {
	      details.innerHTML += ` · ${store.properties.ambulances} Ambulances`;
	      details.innerHTML +=  `<br>Contact: ${store.properties.contact}`;
	    }
	    if (store.properties.distance) {
	      const roundedDistance = Math.round(store.properties.distance * 100) / 100;
	      details.innerHTML += `<div><strong>${roundedDistance} kilometres away</strong></div>`;
	    }



	    link.addEventListener('click', function () {
		  for (const feature of stores.features) {
		    if (this.id === `link-${feature.properties.id}`) {
		      flyToStore(feature);
		      createPopUp(feature);
		    }
		  }
		  const activeItem = document.getElementsByClassName('active');
		  if (activeItem[0]) {
		    activeItem[0].classList.remove('active');
		  }
		  this.parentNode.classList.add('active');
		});

	  }
}





	map.on('load', () => {
	  /* Add the data to your map as a layer */
	  map.addSource('places', {
			  type: 'geojson',
			  data: stores
			});

/* NEW TING HERE ON HOW TO PASS COORDINATES INTO SEARCH BAR*/
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
		  accessToken: mapboxgl.accessToken, // Set the access token
		  mapboxgl: mapboxgl, // Set the mapbox-gl instance
		  marker:{

		  	draggable: true,

		  } , // Use the geocoder's default marker style
		  bbox: [33.9098987,-4.8995204, 41.899578,4.62], // Set the bounding box coordinates
		  localGeocoder: coordinatesGeocoder,
			reverseGeocode: true

		});


	  ///Geolocation stuff definition here
				const geolocate =	new mapboxgl.GeolocateControl({
				positionOptions: {
				enableHighAccuracy: true
				},
				// When active the map will receive updates to the device's location as it changes.
				trackUserLocation: true,
				// Draw an arrow next to the location dot to indicate which direction the device is heading.
				showUserHeading: true
				});






		map.addControl(geocoder, 'top-left');



		addMarkers();


		map.addControl(geolocate, 'top-left');

		geolocate.on('geolocate', (e) => {
			console.log('A geolocate event has occurred.');
			console.log(e.coords.latitude);
			console.log(e.coords.longitude);

			var input = document.getElementsByClassName("mapboxgl-ctrl-geocoder--input");

			for (var i = input.length - 1; i >= 0; i--) {
				input = input[i];
			}
			console.log(input);


			input = e.coords.latitude+","+e.coords.longitude;

			});

		buildLocationList(stores);

		function getDistances(searchResult){
			// Code for the next step will go here
		  		const options = { units: 'kilometers' };
					for (const store of stores.features) {
						  store.properties.distance = turf.distance(
						    searchResult,
						    store.geometry,
						    options
						  );
					}
					// Code for the next step will go here
					stores.features.sort((a, b) => {
					  if (a.properties.distance > b.properties.distance) {
					    return 1;
					  }
					  if (a.properties.distance < b.properties.distance) {
					    return -1;
					  }
					  return 0; // a must be equal to b
					});
					// Code for the next step will go here
					const listings = document.getElementById('listings');
					while (listings.firstChild) {
					  listings.removeChild(listings.firstChild);
					}
					buildLocationList(stores);

					const activeListing = document.getElementById(
					  `listing-${stores.features[0].properties.id}`
					);
					activeListing.classList.add('active');

					const bbox = getBbox(stores, 1, searchResult);
							map.fitBounds(bbox, {
							  padding: 100
							});

							createPopUp(stores.features[0]);
		}




	  geocoder.on('result', (event) => {
		  const searchResult = event.result.geometry;
		  getDistances(searchResult);
		  

							const marker = geocoder.mapMarker;
							marker.on('dragend', (event) => {
									var coord = marker.getLngLat();
								  const searchResult = {
								  	"coordinates": [ coord.lng ,coord.lat],
								  	"type": "Point",
								  };
								  getDistances(searchResult);

							});

		});

	});
	function addMarkers() {
	  /* For each feature in the GeoJSON object above: */
	  for (const marker of stores.features) {
	    /* Create a div element for the marker. */
	    const el = document.createElement('div');
	    /* Assign a unique `id` to the marker. */
	    el.id = `marker-${marker.properties.id}`;
	    /* Assign the `marker` class to each marker for styling. */
	    el.className = 'marker';


	    /**
	     * Create a marker using the div element
	     * defined above and add it to the map.
	     **/
	    new mapboxgl.Marker(el, { offset: [0, -23] })
	      .setLngLat(marker.geometry.coordinates)
	      .addTo(map);

	     el.addEventListener('click', (e) => {
					  /* Fly to the point */
					  flyToStore(marker);
					  /* Close all other popups and display popup for clicked store */
					  createPopUp(marker);
					  /* Highlight listing in sidebar */
					  const activeItem = document.getElementsByClassName('active');
					  e.stopPropagation();
					  if (activeItem[0]) {
					    activeItem[0].classList.remove('active');
					  }
					  const listing = document.getElementById(`listing-${marker.properties.id}`);
					  listing.classList.add('active');
					});
	  }
}


		function flyToStore(currentFeature) {
	  map.flyTo({
	    center: currentFeature.geometry.coordinates,
	    zoom: 15
	  });
	}

	function createPopUp(currentFeature) {
	  const popUps = document.getElementsByClassName('mapboxgl-popup');
	  /** Check if there is already a popup on the map and if so, remove it */
	  if (popUps[0]) popUps[0].remove();

	  const popup = new mapboxgl.Popup({ closeOnClick: false })
	    .setLngLat(currentFeature.geometry.coordinates)

	    .addTo(map);
	}



			function getBbox(sortedStores, storeIdentifier, searchResult) {
		  const lats = [
		    sortedStores.features[storeIdentifier].geometry.coordinates[1],
		    searchResult.coordinates[1]
		  ];
		  const lons = [
		    sortedStores.features[storeIdentifier].geometry.coordinates[0],
		    searchResult.coordinates[0]
		  ];
		  const sortedLons = lons.sort((a, b) => {
		    if (a > b) {
		      return 1;
		    }
		    if (a.distance < b.distance) {
		      return -1;
		    }
		    return 0;
		  });
		  const sortedLats = lats.sort((a, b) => {
		    if (a > b) {
		      return 1;
		    }
		    if (a.distance < b.distance) {
		      return -1;
		    }
		    return 0;
		  });
		  return [
		    [sortedLons[0], sortedLats[0]],
		    [sortedLons[1], sortedLats[1]]
		  ];
		}


</script>


</body>
</html>