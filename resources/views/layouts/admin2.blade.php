<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title>
   s
  </title>

	<!-- font Awesome Cdn -->
	<script src="https://kit.fontawesome.com/e48d166edc.js" crossorigin="anonymous"></script>

	<!-- CSS File -->
	<link rel="stylesheet" type="text/css" href= "{{ asset('css/dash.css') }}">
	<link rel="stylesheet" href="https://fontawesome.com/">
	<link rel="stylesheet" href="https://fontawesome.com/v4.7/icons/">

  <script src="https://cdn.tailwindcss.com"></script>
  	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<style>
body{
	position: relative;
	display: absolute;
}
#map {width: 50%; }

#geocoder-container > div {
min-width: 50%;
margin-left: 25%;
}
.mb-6{
  font-size: 18px;
  font-weight: 500;
  border-radius: 7px;
  letter-spacing: 1px;  
	margin-left: 100px;
}
.mb-6 input{
	height: 100%;
  width: 300px;
  border: black;
  font-size: 18px;
  font-weight: 500;
  border-radius: 10px;
	outline-style: solid;
	padding: 10px;
}
.button{
	height: 50px;
  width: 150px;
  border: black;
  font-size: 18px;
  font-weight: 500;
  border-radius: 15px;
	padding: 10px;
	background: linear-gradient(135deg, #0099FF,#FFCC00);
	text-align: center;
	margin-left: 160px;
}

.mt-8{
	display:flex;
}
body h2{
	font-size: 25px;
  font-weight: 500;
  position: relative;
	text-align: center;
}

}


</style>

  <script>
    tailwind.config = {
      theme: {
        extend: {
					fontFamily:{
						poppins:"'Poppins',serif",
					},
          colors: {
        brightBlue: 'hsla(204, 100%, 50%, 1)',
        brightYellow: 'hsla(48, 100%, 50%, 1)',
        brightRed: 'hsl(12, 88%, 59%)',
        brightRedLight: 'hsl(12, 88%, 69%)',
        brightRedSupLight: 'hsl(12, 88%, 95%)',
        darkBlue: 'hsl(228, 39%, 23%)',
        darkGrayishBlue: 'hsl(227, 12%, 61%)',
        veryDarkBlue: 'hsl(233, 12%, 13%)',
        veryPaleRed: 'hsl(13, 100%, 96%)',
        veryLightGray: 'hsl(0, 0%, 98%)',
				LightGray: 'hsl(0, 0%, 90%)',
          }
        }
      }
    }
  </script>
</head>
<body class="font-poppins">
<input type="checkbox" id="nav-toggle">
<div class="sidebar">
	<div class="sidebar-brand">
		<img src="img/logo2-removebg-preview.png" alt="">
	</div>

	<div class="sidebar-menu">
	<ul>
		<li>
			<a href="{{ route('admin.dashboard') }}" class="active"><span><i class="fas fa-columns"></i></span>
				<span>Dashboard</span></a>
		</li>

		<li>
			<a href="{{ route('admin.firstAid.home')  }}"><span><i class="fa fa-clipboard" aria-hidden="true"></i></span>
				<span>First Aid Instructions</span></a>
		</li>

		<li>
			<a href="{{ route('admin.ambulance.home') }}"><span><i class="fa fa-ambulance" aria-hidden="true"></i></span>
				<span>Ambulance Locations</span></a>
		</li>

		

	</ul>
    </div>	
</div>

<div class="main-content">

	<!--HEADER-->
	<header>
		<h2>
			<label for="nav-toggle">
				<span>
					<i class="fas fa-bars"></i>
				</span>
			</label>
s
		</h2>

		<div class="user-wrapper">
			<img src="img/avatar-anisha.png" alt="" width="40px" height="40px">
		<div>
			<h4>{{Auth::user()->firstName. " ". Auth::user()->secondName}}</h4>
      <form method="POST" action="{{ route('logout') }}">
                            @csrf

                      <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
      </form>
		</div>

		</div>
	</header>

    <!--main content-->
    <main>
    @yield('content')
    
    </main>

</div>

</body>
</html>