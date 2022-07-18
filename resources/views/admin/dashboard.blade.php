<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title>ADMIN DASHBOARD</title>

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
			<a href=""><span><i class="fa fa-users" aria-hidden="true"></i></span>
				<span>LINK 2</span></a>
		</li>

		<li>
			<a href=""><span><i class="fa fa-clipboard" aria-hidden="true"></i></span>
				<span>LINK 3</span></a>
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
         Dashboard
		</h2>

		<div class="search-wrapper">
			<span>
				<i class="fas fa-search"></i>
			</span>
			<input type="search" placeholder="Search Here" />
		</div>

		<div class="user-wrapper">
			<img src="img/avatar-anisha.png" alt="" width="40px" height="40px">
		<div>
			<h4>Ariana Grande</h4>
			<small>Super Admin</small>
		</div>

		</div>
	</header>

    <!--main content-->
    <main>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as an Admin! 
                </div>
            </div>
            <div>
                <a href="{{ route('admin.firstAid.index') }}">All First Aid Information </a>

            </div>

            <div>
                                <a href="{{ route('admin.firstAid.create') }}">
                    Add First Aid Information
                </a>
            </div>

        </div>
    </div>

    </main>

</div>

</body>
</html>