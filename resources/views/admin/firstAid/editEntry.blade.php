<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




	<title>Add Post</title>
</head>
<body>

	<div class="w-full max-w-xs">
	<form method="POST" action="{{ route('admin.firstAid.update', $instruction->id) }}" class=" m-8 flex flex-col  bg-white shadow-md rounded px-8 pt-6 pb-8" enctype="multipart/form-data">
		@method('PUT')
		@csrf

		<legend class="text-4xl text-blue-900 font-bold mb-10 text-center">Add Post</legend>

		<div class="mb-6 px-[25%] flex flex-col ">
			<label>Title</label>
			<input class="border-solid border-b-4 border-black rounded p-4 w-[50%]" type="text" name="title" placeholder="Add Title" id="title" value="{{ $instruction->title }}"></div>

		<div class="mb-6">
			<label>Signs And Symptoms</label>
			<textarea name="symptoms" id= "symptoms"  >
				{{ $instruction->symptoms }}
			</textarea>
		</div>

		<div class="mb-6">
			<label>Treatment</label>
			<textarea name="treatment" id="treatment"  >
				{{ $instruction->treatment }}
			</textarea>
		</div>



		<div class="mb-6">
			<label>Image</label>
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
				    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="image" type="file" id="image"  value="{{ $instruction->image }}">
		</div>


		<div class="mb-6 flex flex-col">
			<label>Videos</label>
			<input class="form-control " type="url" name="video" id= "video" value="{{ $instruction->video }}">

		</div>
		



		<p>Chat </p>
		<div class="mb-6 flex space-x-2 ">
			<input class= "inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" type="submit" name="submit" id="submit" value="Edit Post">
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



</script>

</body>
</html>