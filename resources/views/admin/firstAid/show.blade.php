@extends('layouts.admin')

@section('title', $instruction->title)
@section('pageTitle', $instruction->title)
@section('content')



<h1 class="text-4xl text-brightYellow font-bold mb-10 ml-32 mt-10 text-center">{{ $instruction->title }}</h1>
	
<div class="container flex flex-col px-8 mx-auto mt-2 space-y-8 md:space-y-0 md:flex-row">

	<div class="flex flex-col w-[50%]">
	
	 
		 <div class="p-2 px-10 ml-2 rounded-lg border-2 border-black-100 blog-container bg-brightBlue items-center text-sm">
		 <h2 class="mt-6 mb-6 font-semibold text-black">Signs And Symptoms</h2>
				{!! $instruction->symptoms !!}
		 </div>
     <a href="{{ route('admin.firstAid.edit', $instruction->id) }}" class="hidden md:block p-3 px-6 pt-2 text-white bg-brightBlue rounded-full baseline hover:bg-brightYellow">Edit</a>

      <a href="route('admin.firstAid.destroy', $instruction->$id)" class="hidden md:block p-3 px-6 pt-2 text-white bg-brightBlue rounded-full baseline hover:bg-brightYellow">Delete</a>
	</div>
  

		<div class="mt-10 p-4 px-20 ml-20 rounded-lg border-2 border-black-100 blog-container bg-LightGray flex flex-col  items-center text-sm">
				<h2 class="mt-6 mb-6 font-semibold text-brightBlue" >Treatment</h2>
			 <div class="container">
			 {!! $instruction->treatment !!}
			 </div>
				

			<div>
				<h2 class="mt-6 mb-6 font-semibold text-lg text-black" >Media Links</h2>
				<a href="{{ $instruction->video }}"> {{ $instruction->video }}</a>
			</div>

      

		</div>

</div>

@endSection
