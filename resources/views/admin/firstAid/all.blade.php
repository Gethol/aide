<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<pre>



	</pre>

	@foreach($instructions as $instruction)
	<a href="{{ route('admin.firstAid.show', $instruction->id) }}">
		<div>
			<span>{{ $instruction->title }}</span>

		</div>
	</a>

	@endforeach
</body>
</html>