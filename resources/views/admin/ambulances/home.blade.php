@extends('layouts.admin')

    <!--main content-->
		@section('title', 'First Aid Instructions')

		@section('pageTitle', 'First Aid Instructions')

		@section('content')

			<div>
                <a href="{{ route('admin.ambulance.index') }}">Map Preview</a>
            </div>

            <div>
                                <a href="{{ route('admin.ambulance.create') }}">
                    Add Ambulance Locations
                </a>
            </div>


		
	@endsection