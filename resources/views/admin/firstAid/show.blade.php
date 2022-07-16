<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
		<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
	<pre>

	</pre>

	<div class="flex flex-col p-20 w-[80%]">
			<h1 class="text-5xl text-blue-900 font-bold mb-20 text-center">{{ $instruction->title }}</h1>
			<div>
				<img class="px-[25%]" src="{{ $instruction->image }}" alt="">


			</div>
			<div class="p-20 px-40">
				<h2>Signs And Symptoms</h2>
				{!! $instruction->symptoms !!}
			</div>

			<div class="p-20 px-40">
				<h2>Treatment</h2>
				{!! $instruction->treatment !!}
			</div>

			<div>
				<h2>Media Links</h2>
 
				
				<a href="{{ $instruction->video }}"> {{ $instruction->video }}</a>
			</div>

				

		</div>



</body>
</html>