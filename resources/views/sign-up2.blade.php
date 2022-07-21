<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->
        
        <form method="POST" action="{{ route('login') }}">
            @csrf


            <h2 class="title">Sign in</h2>
            
            <!-- Email Address -->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <x-input id="email" class="block mt-1 w-full" type="email" name="lemail" :value="old('lemail')" required autofocus/>
            </div>

            <!-- Password -->
            <div class="input-field">
              <i class="fas fa-lock"></i>
                <x-input id="password" 
                                type="password"
                                name="lpassword"
                                required autocomplete="current-password" />
            </div>

            <input type="submit" value="Login" class="btn solid" />

          </form>




          <form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <x-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus />
            </div>


            <div class="input-field">
              <i class="fas fa-user"></i>
              <x-input id="secondName" class="block mt-1 w-full" type="text" name="secondName" :value="old('secondName')" required autofocus />

            </div>




            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>





            <div class="input-field">
              <i class="fas fa-lock"></i>
             <!--  <input type="password" placeholder="Password" /> -->
              <x-input id="password" 
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
             <!--  <input type="password" placeholder="Password" /> -->
              <x-input id="password_confirmation" 
                                type="password"
                                name="password_confirmation" required />

            </div>


            <input type="submit" class="btn" value="Sign up" />
           
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here?</h3>
            <p>
              Welcome to WeCare! Please create an account to continue.
            </p>

            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>

          </div>
          <img src="img/callpic.png" class="image" alt="" />
            </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us?</h3>
            <p>
              Welcome back! Please sign in to continue.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/EMT.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
