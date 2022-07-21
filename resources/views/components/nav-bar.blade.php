<div class="relative container mx-auto p-6">
    <!--Flex container-->
    <div class="flex items-center justify-between">
      <!--logo-->
      <div class="pt-2">
        <img class="w-16 h-16" src="img/logo2.jpg" alt="">
      </div>

      <!--Menu Items-->
      <div class=" md:flex  space-x-8 ml-10">
        <a href="#" class="hover:text-darkGrayishBlue">Home</a>
        <a href="#aboutUs" class="hover:text-darkGrayishBlue">About Us</a>
        <a href="{{ route('guest.firstAid.index') }}" class="hover:text-darkGrayishBlue">First Aid Instructions</a>
        <a href="{{ route('guest.map') }}" class="hover:text-darkGrayishBlue">Ambulance Locations</a>
      </div>

    <!--Button-->
    @if(Auth::check())
    <div class="flex flex-col">
    

        <button class="bg-BrightBlue p-2">{{  '' .Auth::user()->firstName. " ". Auth::user()->secondName }}</button>
                                <div>                   

                    @if(session()->get('med_info') == 1)
                    <a href="{{ route('medical-info.edit', Auth::id()) }}">Edit Medical Information</a>
                </div>
                    @else
                <div>
                    <a href="{{ route('medical-info.create') }}">Add Medical Information</a>
                </div>
                    @endif
                      <form method="POST" action="{{ route('logout') }}">
                            @csrf

                      <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
      </form>



            </div>

      



    @else
    <a href="{{ route('login') }}" class="md:block p-3 px-6 pt-2 text-white bg-brightBlue rounded-full baseline hover:bg-brightYellow">Get Started</a>
    @endif
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
        <a href="#aboutUs">About Us</a>
        <a href="{{ route('guest.firstAid.index') }}">First Aid Instructions</a>
        <a href="{{ route('guest.map') }}">Ambulance Locations</a>
      </div>
    </div>
  </div>