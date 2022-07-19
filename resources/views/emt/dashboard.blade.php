@extends('layouts.emt')

    <!--main content-->
		@section('title', 'dashboard')

		@section('pageTitle', 'EMT Dashboard')

		@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as an EMT! 
                </div>
                <div>
                    <a href="{{ route('emt.findPatient') }}">
                        Find Patient
                    </a>

        <div class="search-wrapper w-10">
			<span>
				<i class="fas fa-search"></i>
			</span>
			<input type="search" placeholder="Search Here" />
		</div>
                </div>
            </div>
        </div>
    </div>

		@endsection