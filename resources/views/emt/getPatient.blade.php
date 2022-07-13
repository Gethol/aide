<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
		<div>
    	<form action="{{ route('emt.view') }}" id="search-form" method="get">
    		@csrf
    		<input type="search" name="search" placeholder="Enter National ID" id="search">
    		<input type="submit">
    	</form>

    </div>


        <div id="search-results">
		<p>Search Results</p>
		<?php

		print_r($user);
		?>

    </div>



</body>
</html>