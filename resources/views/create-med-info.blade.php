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
    <form action="{{ route('medical-info.store') }}" method="POST">
        @csrf
        <div class="med-details">
        
          <div class="input-box">
            <span class="details">National ID</span>
            <input type="text" name="national_id" placeholder="Enter National ID"
            value="{{ old('national_id') }}"
            >
          </div>

          <div class="input-box">
            <span class="details">Emergency Contact's Name</span>
            <input type="text" name="emergency_contact_name" placeholder="Full Name"
            value="{{ old('emergency_contact_name') }}"
            >
          </div>

          <div class="input-box">
            <span class="details">Emergency Contact's Number</span>
            <input type="tel" name="emergency_contact" placeholder="Phone Number"
            value="{{ old('emergency_contact') }}" 
            >
          </div>


      <div class="input-box">
        <span class="details">Year of Birth</span>
        <input type="date" name="yob"  >
      </div>  

        <div class="input-box">
            <span class="details">Blood Type</span>
            <select name="blood_type">
              <option value="A+">A+</option>
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
            {{ old('allergies') }}
          </textarea>
        </div>

        <div class="input-box">
          <span class="details">Medical conditions</span>
            <textarea name="medical_conditions" cols="82" rows="5" placeholder="Enter any Medical conditions you may have">
              {{ old('medical_conditions') }}
            </textarea>
        </div>

        <div class="input-box">
          <span class="details">Other</span>
          <textarea name="other"cols="82" rows="5" placeholder="Other any important medical information"> {{ old('other') }}</textarea>
        </div>
    </div>

        <div class="button">
          <input type="submit" value="Add Information">
        </div>
   
    </form>
  </div>
</body>
</html>