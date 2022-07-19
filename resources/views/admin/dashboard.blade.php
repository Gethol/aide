@extends('layouts.admin')

    <!--main content-->
		@section('title', 'Dashboard')

		@section('pageTitle', 'Admin Dashboard')

		@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as an Admin! 
                </div>
            </div>
            <div>
                <a href="{{ route('admin.firstAid.index') }}">All First Aid Information </a>
            </div>

            <div>
                                <a href="{{ route('admin.firstAid.create') }}">
                    Add First Aid Information
                </a>
            </div>

        </div>
  </div>

	@endsection

   

</div>
