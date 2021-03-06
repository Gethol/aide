<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Red+Hat+Display&display=swap" rel="stylesheet">

	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<title>Instructions</title>
	<style>

		.container2 p{
			margin-bottom: 20px;
			
		}
		.container2 img{
			width: 350px;
			height: 350px;
			margin-left: 100px;
			margin-bottom: 40px;
			margin-top: 10px;
			border-radius: 10px;
			border: black;
			

		}

	</style>

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
</head>
<body class="font-poppins" >

<!--Navbar-->
<x-nav-bar/>



<h1 class="text-4xl text-brightYellow font-bold mb-10 ml-32 mt-10 text-center">{{ $instruction->title }}</h1>
	
<div class="container flex flex-col px-8 mx-auto mt-2 space-y-8 md:space-y-0 md:flex-row">

	<div class="flex flex-col w-[50%]">
	
	 
		 <div class="p-2 px-10 ml-2 rounded-lg border-2 border-black-100 blog-container bg-brightBlue items-center text-sm">
		 <h2 class="mt-6 mb-6 font-semibold text-black">Signs And Symptoms</h2>
				{!! $instruction->symptoms !!}
		 </div>

	</div>

		<div class="mt-10 p-4 px-20 ml-20 rounded-lg border-2 border-black-100 blog-container bg-LightGray flex flex-col  items-center text-sm">
				<h2 class="mt-6 mb-6 font-semibold text-brightBlue" >Treatment</h2>
			 <div class="container2">
			 {!! $instruction->treatment !!}
			 </div>
				

			<div>
				<h2 class="mt-6 mb-6 font-semibold text-lg text-black" >Media Links</h2>
				<a href="{{ $instruction->video }}"> {{ $instruction->video }}</a>
			</div>

		</div>

</div>

</body>
</html>
