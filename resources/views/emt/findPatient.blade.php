<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
	<div>
    	<form action="{{ route('emt.findPatient') }}" id="search-form" method="post">
    		@csrf
    		<input type="search" name="search" placeholder="Enter National ID" id="search">
    		<input type="submit">
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

<p>{{$user->national_id}}</p>
    </div>


</body>
</html>


