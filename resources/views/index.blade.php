<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Manage Landing Page</title>
</head>
<body>
  <!--Navbar-->
  <nav class="relative container mx-auto p-6">
    <!--Flex container-->
    <div class="flex items-center justify-between">
      <!--logo-->
      <div class="pt-2">
        <img class="w-16 h-16" src="img/logo2.jpg" alt="">
      </div>

      <!--Menu Items-->
      <div class="hidden md:flex  space-x-8">
        <a href="#" class="hover:text-darkGrayishBlue">Home</a>
        <a href="#" class="hover:text-darkGrayishBlue">About Us</a>
        <a href="#" class="hover:text-darkGrayishBlue">Careers</a>
        <a href="#" class="hover:text-darkGrayishBlue">Community</a>
      </div>

    <!--Button-->
    <a href="#" class="hidden md:block p-3 px-6 pt-2 text-white bg-brightBlue rounded-full baseline hover:bg-brightRedLight">Get Started</a>

    <!--Hamburger Icon-->
      <button
          id="menu-btn"
          class="block hamburger md:hidden focus:outline-none"
        >
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden">
      <div
        id="menu"
        class="absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md"
      >
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Careers</a>
        <a href="#">Community</a>
      </div>
    </div>
  </nav>

  <!--Hero Section-->
  <section id="hero">
     <!--Flex Container-->
     <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto mt-10 space-y-0 md:space-y-0">

       <!--Left Item-->
       <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
          <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left">Emergency Response services at the touch of a button</h1>
          <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">Peace of mind and safety wherever you go.
            24/7 services from the largest network of trusted medical, security, and roadside responders all 
            over Kenya.</p>

          <div class="flex justify-center md:justify-start">
            <a href="#" class="p-3 px-6 pt-2 text-white bg-brightYellow rounded-full  hover:bg-brightBlue">Get Started</a>
          </div>
       </div>

        <!--Right Item: Image-->
        <div class="md:w-1/2 pb-56">
          <img src="img/LandingPage.jpg" alt=""/>
        </div>
     </div>
  </section>

  <!--Features section-->
  <section id="features">
    <!--Flex container-->
    <h2 class="text-4xl pb-16 font-bold text-center text-brightBlue">
      Our Main Features
    </h2>
    <div class="container flex flex-col px-4 mx-auto mt-2 space-y-12 md:space-y-0 md:flex-row">

      <!--our features-->

      <div class="flex flex-col space-y-12 md:w-1/2">
        <div class="flex flex-col space-y-2">
          <img class="w-20 h-20" src="img/siren.png" alt="">
          <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
            The website enables you to subscribe for emergency response from a top emergency response services. In the event of an emergency, your service provider will respond to you.
          </p>
        </div>

        <div class="flex flex-col space-y-2">
          <img class="w-20 h-20" src="img/callCenter.png" alt="">
          <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
            In the case of an emergency, your family and friends can be informed about the current situation.
          </p>
        </div>

        <div class="flex flex-col space-y-2">
          <img class="w-20 h-20" src="img/FAkit.png" alt="">
          <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
            The website gives you a step-by-step guideline on how perform different First Aid techniques to provide assistance in the case of an emergency,
          </p>
        </div>

        

        
        
      </div>

      <!--First Aid picture-->
      <div class="flex flex-col space-y-8 md:w-1/2">
        <img src="img/First Aid2.jpg" alt="">  
      </div>
    </div>
  </section>

 <!--Testimonials-->
 <section id="testimonials">
    <!--Container to heading and test blocks-->
    <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
       <!--Heading-->
       <h2 class="text-4xl font-bold text-center">
         What People Are Saying?
       </h2>
        <!--Testimonials Container-->
        <div class="flex flex-col mt-24 pb-10 md:flex-row md:space-x-6">
           <!--Testimonial 1-->
           <div class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:w-1/3">
             <img src="img/avatar-anisha.png" class="w-16 -mt-14" alt="">
             <h5 class="text-lg font-bold">Anisha Li</h5>
             <p class="text-sm text-darkGrayishBlue">
              “Beautifully created website with a simple and intuitive user interface for emergencies.”</p>
           </div>

           <!--Testimonial 2-->
           <div class="hidden flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:flex md:w-1/3">
            <img src="img/avatar-ali.png" class="w-16 -mt-14" alt="">
            <h5 class="text-lg font-bold">Ali Bravo</h5>
            <p class="text-sm text-darkGrayishBlue">“Great Concept.It is good to have peace of mind knowing that in case of an emergency, help is at your fingertips.”</p>
          </div>

          <!--Testimonial 3-->
          <div class="hidden flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:flex md:w-1/3 ">
            <img src="img/avatar-richard.png" class="w-16 -mt-14" alt="">
            <h5 class="text-lg font-bold">Richard Watts</h5>
            <p class="text-sm text-darkGrayishBlue">
             “It redefines what it means to always be prepared in the case of any emergency situations.”</p>
          </div>
    </div>
    
    </div>
 </section>

  <!--CTA Section-->
  <section id="cta" class="bg-brightBlue">
    <!--Flex Container-->
    <div class="container flex flex-col items-center justify-between px-6 py-24 mx-auto space-y-12 md:py-12 md:flex-row md:space-y-0">
       <!--Heading-->
       <h5 class="text-2xl font-bold leading-tight text-center text-white md:text-2xl md:max-w-xl md:text-left">
         Subscribe to our Newsletter
       </h5>

       <textarea class="p-2 w-9/12 rounded-full text-center" placeholder="Enter your email..."></textarea>
        
       <!--button-->
       <div>
        <a href="#" class=" p-3 px-6 pt-2 ml-3 bg-brightYellow rounded-full shadow-2xl baseline hover:bg-gray-900">Subscribe</a>
      </div>
        
    </div>
  </section>

  <!--FOOTER-->
  <footer class="bg-veryDarkBlue">
    <!--Flex Container-->
    <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
      <!--Logo and Social media links container-->
      <div class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start">

        <div class="mx-auto my-6 text-center text-white md:hidden">
          Copyright &copy; 2022, All Rights Reserved
        </div>        

        <!--logo-->
        <div>
          //logo image
        </div>

        <!--Social Links Container-->
        <div class="flex justify-center space-x-4">
          <!--link 1-->
          <a href="#">
            <img src="img/icon-facebook.svg" class="h-8" alt="">
          </a>
          <!--link 2-->
          <a href="#">
            <img src="img/icon-youtube.svg" class="h-8" alt="">
          </a>
          <!--link 3-->
          <a href="#">
            <img src="img/icon-twitter.svg" class="h-8" alt="">
          </a>
          <!--link 4-->
          <a href="#">
            <img src="img/icon-pinterest.svg" class="h-8" alt="">
          </a>
          <!--link 5-->
          <a href="#">
            <img src="img/icon-instagram.svg" class="h-8" alt="">
          </a>
        </div>
      </div>    
      
      <!--List Container-->
      <div class="flex justify-around space-x-32">
        <div class="flex flex-col space-y-3 text-white">
          <a href="#" class="hover:text-brightBlue">Home</a>
          <a href="#" class="hover:text-brightBlue">Pricing</a>
          <a href="#" class="hover:text-brightBlue">Products</a>
          <a href="#" class="hover:text-brightBlue">About</a>
        </div>
        <div class="flex flex-col space-y-3 text-white">
          <a href="#" class="hover:text-brightBlue">Careers</a>
          <a href="#" class="hover:text-brightBlue">Community</a>
          <a href="#" class="hover:text-brightBlue">Privacy Policy</a>
        </div>
      </div>

      <div class="flex flex-col justify-between">
        <form action="#">
          <div class="flex space-x-3">
            <input type="text" class="flex-1 px-4 rounded-full focus:outline-none" placeholder="Updates in your inbox"/>
            <button class="px-6 py-2 text-white rounded-full bg-brightBlue hover:bg-brightYellow focus:outline-none">Go</button>
          </div>
        </form>
        <div class="hidden text-white md:block">
          Copyright &copy; 2022, All Rights Reserved
        </div>

      </div>


    </div>
  </footer>

  <script src="js/script.js"></script>
  
</body>
</html>