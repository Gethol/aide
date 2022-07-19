@extends('layouts.emt')

@section('title', 'find Patient')

		@section('pageTitle', 'find Patient')

		@section('content')
	<div>
    	<form action="{{ route('emt.findPatient') }}" id="search-form" method="post">
    		@csrf
    		<input class="mb-6 mt-10 space-x-2  p-3 px-6 pt-2 text-white  w-72 rounded-full baseline font-semibold text-center justify-center" type="search" name="search" placeholder="Enter National ID" id="search">

    		<input class="mb-6 space-x-2  p-2 px-4 ml-4 pt-2 text-white bg-brightYellow w-20 rounded-full mt-10 baseline hover:bg-brightBlue font-semibold text-center justify-center" type="submit" value="send">
    	</form>

    </div>



    <div id="search-results">
		<p>Search Results</p>

		@if(empty($user))

		<p>No User Found</p>
		@else
		<pre>
		<?php

		print_r($user);

		?>
		</pre>

		@endif

    </div>

@endsection
