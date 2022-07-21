@extends('layouts.admin')

@section('title', 'First Aid Instructions')
@section('pageTitle', 'First Aid Instructions')
@section('content')

<pre>
  
</pre>	
 
  
  <section class="bg-white">
    <h2 class="text-4xl pb-16 font-bold text-center text-brightBlue">
      First Aid Topics
    </h2>

    <div class="container flex flex-col px-4 mx-auto mt-2 space-y-12 md:space-y-0 md:flex-row">

      <div class="flex flex-col space-y-12 md:w-1/2">
        
			@foreach($instructions as $instruction)
	
	
		<a href="{{ route('admin.firstAid.show', $instruction->id) }}" class="mb-2 ml-32 flex space-x-2 md:block p-3 px-6 pt-2 text-white bg-brightYellow w-60 rounded-full baseline hover:bg-brightBlue font-bold text-center justify-center">
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

@endSection