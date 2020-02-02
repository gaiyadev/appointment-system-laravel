<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}::@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Load polyfills to support older browsers -->
       
    <!-- Load animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
  
</head>
<body>  
       
    <div id="app">
                             
        <nav class="navbar navbar-expand-md  navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ Request::is('/') ? 'active': '' }}">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                              </li>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                              {{-- <li class="nav-item {{ Request::is('/') ? 'active': '' }}">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                              </li> --}}
                              <li class="nav-item {{ Request::is('about') ? 'active': '' }}">
                                <a class="nav-link" href="#">About</a>
                              </li>                              
                              {{-- <li class="nav-item dropdown ml-auto" >
                                <a style="margin-left: 400px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Dropdown link
                                </a>
                                <div style="margin-left: 400px;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                              </li> --}}
                            </ul>
                          </div>
                          
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            {{-- <form class="form-inline" method="post" action="{{ route('login') }}">
                                    @csrf
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                <input type="password" class="form-control input-sm" id="pwd" placeholder="Enter password" name="pswd">
                                
                                <button name="submit" class="btn btn-info float-right" type="submit"> {{ __('Login') }}</button>
                            </form> --}}
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ">
                                <a style="color: #fff;" class="nav-link " href="{{ route('login') }}">{{ __('Login') }}
                                        <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color: #fff;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}
                                            <i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br/><br/>
{{-- end of the navigation area --}}
       <div class="container-fliud">
           <example-component></example-component>
                @yield('content')
        
       </div>
    </div>
    <style>
    .fa.fa-user-plus, .fa.fa-sign-in {
        color: #fff;
    }
    </style>
   
</body>
</html>
