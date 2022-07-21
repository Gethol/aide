@extends('layouts.admin')

    <!--main content-->
		@section('title', 'First Aid Instructions')

		@section('pageTitle', 'First Aid Instructions')

		@section('content')
        <div class=" flex justify-center">
			<a href="{{ route('admin.ambulance.index') }}">
            <div class="border border-solid p-16 m-4 h-[350px] w-[350px]">
                <img  src="{{ asset('img/pin.png') }}">
                Map Preview
            </div>
        </a>
            <a href="{{ route('admin.ambulance.create') }}"><div class="border border-solid p-16 m-4 h-[350px] w-350px]">
                <img src="{{ asset('img/ambulance(3).png') }}">
                                
                    Add Ambulance Locations
              
            </div>
              </a>
        </div>


		
	@endsection