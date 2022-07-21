<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Red+Hat+Display&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
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

	<title>First Aid Instructions</title>
</head>
<body class="font-poppins" >
  <x-nav-bar />

	
  <section>
   
    <h2 class="text-4xl pb-16 font-bold text-center text-brightBlue">
      First Aid Topics
    </h2>

    <div class="container flex flex-col px-4 mx-auto mt-2 space-y-12 md:space-y-0 md:flex-row">

      <div class="flex flex-col space-y-12 md:w-1/2">
        
			@foreach($instructions as $instruction)
	
	
		<a href="{{ url('aid/'.$instruction->id) }}" class="mb-2 ml-32 flex space-x-2 md:block p-3 px-6 pt-2 text-white bg-brightYellow w-60 rounded-full baseline hover:bg-brightBlue font-bold text-center justify-center">
		<div>
			<span>{{ $instruction->title }}</span>

		</div>
		</a>

	@endforeach

      </div>

      <!--First Aid picture-->
      <div class="flex flex-col space-y-8 md:w-1/2">
        <img src="../../img/firstAid.jpg" alt="">  
      </div>
    </div>
  </section>


</body>
</html>