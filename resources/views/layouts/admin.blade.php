<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
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
		<img src="img/logo2-removebg-preview.png" alt="">
	</div>

	<div class="sidebar-menu">
	<ul>
		<li>
			<a href="" class="active"><span><i class="fas fa-columns"></i></span>
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