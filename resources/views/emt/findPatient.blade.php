@extends('layouts.emt')

@section('title', 'find Patient')

		@section('pageTitle', 'find Patient')

		@section('content')
	<div>
    	<form action="{{ route('emt.findPatient') }}" id="search-form" method="post">
    		@csrf
    		<input class="mb-6 mt-10 space-x-2  p-3 px-6 pt-2 text-white  w-72 rounded-full baseline font-semibold text-center justify-center" type="search" name="search" placeholder="Enter National ID" id="search">

    		<input class="mb-6 space-x-2  p-2 px-4 ml-4 pt-2 text-white bg-brightYellow w-20 rounded-full mt-10 baseline hover:bg-brightBlue font-semibold text-center justify-center" type="submit" value="send">
    	</form>

    </div>





<table class="shadow-lg bg-white">
  <tr>
    <th class="bg-blue-100 border text-left px-8 py-4">National ID</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Name</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Emergency Contact</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Emergency Contact</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Birthdate</th>
    <th class="bg-blue-100 border text-left px-8 py-4">BloodType</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Medical Conditions</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Allergies</th>
    <th class="bg-blue-100 border text-left px-8 py-4">Other</th>
  

  </tr>
  @if(!empty($user))
    <tr>
 		<td class="border px-8 py-4">{{ $user->national_id }}</td>
    	<td class="border px-8 py-4">{{ $user->firstName . " ". $user->secondName }} </td>
  		<td class="border px-8 py-4">{{ $user->emergency_contact_name }}</td>
    	<td class="border px-8 py-4">{{ $user->emergency_contact }}</td>
    	<td class="border px-8 py-4">{{ $user->yob }}</td>
    	<td class="border px-8 py-4">{{ $user->blood_type }}</td>
  		<td class="border px-8 py-4">{{ $user->medical_conditions }}</td>
  		<td class="border px-8 py-4">{{ $user->allergies }}</td>
  		<td class="border px-8 py-4">{{ $user->other }}</td>
	
    </t>
   @else
   <tr>
   				<td class="border px-8 py-4 bg-white" colspan="9">No User Found</td>
   </tr>

   @endif

</table>





		@if(empty($user))


		@else
		
		@endif

    </div>

@endsection
