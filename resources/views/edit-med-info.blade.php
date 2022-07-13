<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Medical Information</title>
  <link rel="stylesheet" href= "{{ asset('css/med-info.css') }}">
</head>

<body>

  
  <div class="container">
    <div class="title">
      <img src=" asset('img/logo2.jpg')" alt="">
      Medical Information</div>

      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('medical-info.update', Auth::id()) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="med-details">
        
          <div class="input-box">
            <span class="details">National ID</span>
            <input type="text" name="national_id" placeholder="Enter National ID"
            value="{{ $medical_information->national_id }}"
            >
          </div>

          <div class="input-box">
            <span class="details">Emergency Contact's Name</span>
            <input type="text" 
            name="emergency_contact_name" 
            placeholder="Full Name"
            value="{{ $medical_information->emergency_contact_name }}"
            >
          </div>

          <div class="input-box">
            <span class="details">Emergency Contact's Number</span>
            <input type="tel" 
            name="emergency_contact" 
            placeholder="Phone Number"
            value="{{ $medical_information->emergency_contact }}" 
            >
          </div>



      <div class="input-box">
        <span class="details">Year of Birth</span>
        <input type="date" name="yob" 
        value="{{($medical_information->yob);}}" >
      </div>  

        <div class="input-box">
            <span class="details">Blood Type</span>
            <select name="blood_type">

              <option value="{{ $medical_information->blood_type }}" selected> {{ $medical_information->blood_type }} </option>

              <option value="A+" >A+</option>
              <option value="A-">A-</option>
              <option value="AB_">AB+</option>
              <option value="AB-">AB-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>

        </div>
  

<!--         <div class="input-box">
          <span class="details">Blood Type</span>
          <input type="text" placeholder="Enter your Blood Type"
           value="{{ old('blood_type') }}">
        </div> -->

        <div class="input-box">
          <span class="details">Allergies</span>
          <textarea name="allergies" cols="82" rows="3" placeholder="Enter any allergies i.e,any medication">
            {{ $medical_information->allergies }}
          </textarea>
        </div>

        <div class="input-box">
          <span class="details">Medical conditions</span>
            <textarea name="medical_conditions" cols="82" rows="5" placeholder="Enter any Medical conditions you may have">
              {{ $medical_information->medical_conditions }}
            </textarea>
        </div>

        <div class="input-box">
          <span class="details">Other</span>
          <textarea name="other"cols="82" rows="5" placeholder="Other any important medical information"> 
            {{ $medical_information->other }}
          </textarea>
        </div>
    </div>

        <div class="button">
          <input type="submit" value="Edit Information">
        </div>
   
    </form>
  </div>
</body>
</html>