<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<script src="https://cdn.tailwindcss.com"></script>
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
	
	<title>
    @yield('title')
  </title>

	<!-- font Awesome Cdn -->
	<script src="https://kit.fontawesome.com/e48d166edc.js" crossorigin="anonymous"></script>

	<!-- CSS File -->
	<link rel="stylesheet" type="text/css" href= "{{ asset('css/dash.css') }}">
	<link rel="stylesheet" href="https://fontawesome.com/">
	<link rel="stylesheet" href="https://fontawesome.com/v4.7/icons/">


</head>
<body>
<input type="checkbox" id="nav-toggle">
<div class="sidebar">
	<div class="sidebar-brand">
		<h2><span class="">LOGO</span></h2>
	</div>

	<div class="sidebar-menu">
	<ul>
		<li>
			<a href="" class="active"><span><i class="fas fa-columns"></i></span>
				<span>Dashboard</span></a>
		</li>

		<li>
			<a  class ="active" href="{{ route('emt.findPatient') }}"><span><i class="fa fa-users" aria-hidden="true"></i></span>
				<span>Find Patients</span></a>
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
         @yield('pageTitle')
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