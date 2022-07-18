<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<script src="https://cdn.tailwindcss.com"></script>
	<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js'></script>
	<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css' rel='stylesheet'/>

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


	</style>



</head>




<body>

	<div class="flex">
	<div class='sidebar'>
	  <div class='heading'>
	    <h3>Our locations</h3>
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
	    }
	    if (store.properties.distance) {
	      const roundedDistance = Math.round(store.properties.distance * 100) / 100;
	      details.innerHTML += `<div><strong>${roundedDistance} miles away</strong></div>`;
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
	  map.addLayer({
	    id: 'locations',
	    type: 'circle',
	    /* Add a GeoJSON source containing place coordinates and information. */
	    source: {
	      type: 'geojson',
	      data: stores
	    }
	  });
	  map.on('click', (event) => {
		  /* Determine if a feature in the "locations" layer exists at that point. */
		  const features = map.queryRenderedFeatures(event.point, {
		    layers: ['locations']
		  });

		  /* If it does not exist, return */
		  if (!features.length) return;

		  const clickedPoint = features[0];

		  /* Fly to the point */
		  flyToStore(clickedPoint);

		  /* Close all other popups and display popup for clicked store */
		  createPopUp(clickedPoint);

		  /* Highlight listing in sidebar (and remove highlight for all other listings) */
		  const activeItem = document.getElementsByClassName('active');
		  if (activeItem[0]) {
		    activeItem[0].classList.remove('active');
		  }
		  const listing = document.getElementById(
		    `listing-${clickedPoint.properties.id}`
		  );
		  listing.classList.add('active');
	});


	  buildLocationList(stores);
	});

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





</script>


</body>
</html>