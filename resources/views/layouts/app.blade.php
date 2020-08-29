<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>

    <script src="https://unpkg.com/vue@latest"></script>
    <!-- use the latest release -->
    <script src="https://unpkg.com/vue-select@latest"></script>
    <!-- or point to a specific release -->
    <script src="https://unpkg.com/vue-select@1.3.3"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark mb-2 p-1 navbar__bg">
            <div class="container col-md-10 col-sm-10">
                <button class="navbar-toggler mr-3" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class=" navbar-brand mr-auto" href="/">
                    <span class="d-inline-flex">
                        <img src="{{ asset('images/cars/logos/logo5.png') }}" class="logo" alt="">
                        <h4 class="mb-0 logo__text">AvtoSklad</h4>
                    </span>
                    <span class="logo__small-text">Ehiyyat Hissələrinin <span class="small__text">alışı və satışı</span></span>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <div class="ml-md-auto d-inline-flex">
                       <ul class="navbar-nav">
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <div class="">
                                       <span class="d-inline-flex mr-1">
                                           <img src="" alt="Image">
                                       </span>
                                       <span class="d-inline-flex">
                                           User
                                       </span>
                                   </div>
                               </a>
                               <div class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">
                                   @auth
                                       <a href="{{ route('logout') }}" class="dropdown-item"
                                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit()">
                                           Logout
                                       </a>
                                       <form id="logout-form" method="post" action="{{ route('logout') }}">
                                           @csrf
                                       </form>
                                   @else
                                       <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                       <a class="dropdown-item" href="{{ route('register') }}">Registration</a>
                                   @endauth
                               </div>
                           </li>
                       </ul>
                   </div>
                </div>

                <div class="ml-sm-auto ml-md-auto mr-lg-auto ml-lg-3 d-inline-flex">
                    <a class="nav-link dropdown text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('image/svg/answer.svg') }}" class="text-white" alt="answer">
                        <span class="badge badge-success badge__bg text-white rounded-circle badge__font_size">3</span>
                        <span class="sr-only">unread messages</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container ml-auto">
            <form class="form-inline my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="axtar..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Axtar</button>
            </form>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
