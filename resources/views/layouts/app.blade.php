<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div id="app">

    <!--NavBar -->
        <nav class="relative container mx-auto p-6 ">

            <!--flex container -->
                <div class="flex items-center justify-between">
                    <div class="pt-2">
                      <img src="{{ asset('/img/logo.svg') }}" alt="">
                    </div>

                 <!--menu items -->
                  <div class="hidden space-x-6  md:flex">
                      <a class="hover:text-gray-300" href="{{ route('home.index') }}">
                        Home
                      </a>
                      <a class="hover:text-gray-300" href="{{ route('product.index') }}">
                        Products
                      </a>
                      <a class= "hover:text-gray-300"  href="{{ route('cart.index')}}">
                        Cart
                      </a>
                      <a class="hover:text-gray-300" href="{{ route('home.about') }}">
                        About
                       </a>

                     <!--button for login-->
                      @guest
                      <a class="hover:text-gray-300" href="{{ route('login') }}">
                          Login
                      </a>
                      <a class="hover:text-gray-300" href="{{ route('register') }}">
                          Register
                      </a>
                      @else
                      <a class="hover:text-gray-300" href="{{ route('myaccount.orders') }}">
                          My Orders
                      </a>
                      <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="hover:text-gray-300  no-underline"
                           onclick="document.getElementById('logout').submit();">
                           Logout
                        </a>
                        @csrf
                      </form>
                     @endguest
                   </div>
                </div>

            </nav>
            <main class="space-y-5">
            @yield('content')
         </main>

    @livewireScripts
</div>
</body>
</html>
