<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Red+Hat+Display&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	


	<title>Add Post</title>
</head>
<body class="font-poppins">
	<div class="w-full">
	<form method="POST" action="{{ route('admin.firstAid.update', $instruction->id) }}" class=" m-8 flex flex-col  bg-LightGray shadow-md rounded-lg px-8 pt-6 pb-8" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<legend class="text-4xl text-brightBlue font-bold mb-8 text-center">Add Post</legend>

		<div class="mb-6 px-[25%] flex flex-col">
			<label class="">Title</label>
			<input class="border-solid border-black rounded p-4 w-[90%]" type="text" name="title" placeholder="Add Title" id="title" value="{{ $instruction->title }}"></div>

		<div>
			<label class="mt-6 mb-6 font-semibold text-brightBlue">Signs And Symptoms</label>
			<textarea name="symptoms" id= "symptoms"  >
				{{ $instruction->symptoms }}

			</textarea>
		</div>

		<div class="mt-6">
			<label class="mb-6 font-semibold text-brightBlue">Treatment</label>
			<textarea name="treatment" id="treatment"  >
				{{ $instruction->treatment }}
			</textarea>
		</div>



		<div class="mt-6">
			<label class="mb-6 font-semibold text-brightBlue">Image</label>
			<input class="form-control
				    block
				    w-full
				    px-3
				    py-1.5
				    text-base
				    font-normal
				    text-gray-700
				    bg-white bg-clip-padding
				    border border-solid border-gray-300
				    rounded
				    transition
				    ease-in-out
				    m-0
				    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="image" type="file" id="image" value="{{ $instruction->image }}">
		</div>



		

		<div class="mb-6 flex flex-col">
			<label>Videos</label>
			<input class="form-control " type="url" name="video" id= "video" value="{{ $instruction->video }}">

		</div>


		<div>
			<input class="mb-6 flex space-x-2 md:block p-3 px-6 pt-2 text-white bg-brightYellow w-60 rounded-full baseline hover:bg-brightBlue font-semibold text-center justify-center" type="submit" name="submit" id="submit" value="Edit Entry">
		</div>

	</form>

	</div>

<script type="text/javascript">
	



    	ClassicEditor
        .create( document.querySelector( '#symptoms' ) )
           .then( editor => {
                console.log( editor );
                 } )
                .catch( error => {
                    console.error( error );
                } );
        ClassicEditor
        .create( document.querySelector( '#treatment' ) )
           .then( editor => {
                console.log( editor );
                 } )
                .catch( error => {
                    console.error( error );
                } );


    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
		});
</script>

</body>
</html>