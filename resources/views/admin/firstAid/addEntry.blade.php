@extends('layouts.admin')
@section('title', 'Add Entry')
@section('pageTitle', 'Add Entry')
@section('content')

	<div class="w-full">
	<form method="POST" action="{{ route('admin.firstAid.store') }}" class=" m-8 flex flex-col  bg-LightGray shadow-md rounded-lg px-8 pt-6 pb-8" enctype="multipart/form-data">
		@csrf

		<legend class="text-4xl text-brightBlue font-bold mb-8 text-center">Add Post</legend>

		<div class="mb-6 px-[25%] flex flex-col">
			<label class="">Title</label>
			<input class="border-solid border-black rounded p-4 w-[90%]" type="text" name="title" placeholder="Add Title" id="title" value="{{ old('title') }}"></div>

		<div>
			<label class="mt-6 mb-6 font-semibold text-brightBlue">Signs And Symptoms</label>
			<textarea name="symptoms" id= "symptoms"  >
				{{ old('content') }}
			</textarea>
		</div>

		<div class="mt-6">
			<label class="mb-6 font-semibold text-brightBlue">Treatment</label>
			<textarea name="treatment" id="treatment"  >
				{{ old('content') }}
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
				    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="image" type="file" id="image" >
		</div>



		

		<div class="mb-6 flex flex-col">
			<label>Videos</label>
			<input class="form-control " type="url" name="video" id= "video">

		</div>


		<div>
			<input class="mb-6 flex space-x-2 md:block p-3 px-6 pt-2 text-white bg-brightYellow w-60 rounded-full baseline hover:bg-brightBlue font-semibold text-center justify-center" type="submit" name="submit" id="submit" value="Entry">
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

@endsection