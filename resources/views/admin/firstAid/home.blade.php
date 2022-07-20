@extends('layouts.admin')

    <!--main content-->
		@section('title', 'First Aid Instructions')

		@section('pageTitle', 'First Aid Instructions')

		@section('content')

			<div>
                <a href="{{ route('admin.firstAid.index') }}">All First Aid Information </a>
            </div>

            <div>
                                <a href="{{ route('admin.firstAid.create') }}">
                    Add First Aid Information
                </a>
            </div>



	@endsection