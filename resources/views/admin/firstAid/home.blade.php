@extends('layouts.admin')

    <!--main content-->
		@section('title', 'First Aid Instructions')

		@section('pageTitle', 'First Aid Instructions')

		@section('content')
        <div class="flex">
			<a href="{{ route('admin.firstAid.index') }}">
            <div class="border border-solid p-16 m-4 h-[350px] w-[350px]">
                <img src="{{ asset('img/pharmacy.png') }}">
                All First Aid Information
            </div>
             </a>


            <a href="{{ route('admin.firstAid.create') }}">
            <div class="border border-solid p-16 m-4 h-[350px] w-[350px]">
                <img src="{{ asset('img/first-aid-kit.png') }}">
                                
                    Add First Aid Information
                
            </div>
            </a>
        </div>



	@endsection