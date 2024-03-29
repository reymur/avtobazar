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
    <div class="col-12 p-0 m-0" id="app">
        <nav class="navbar navbar-expand-lg navbar-dark mb-2 p-1 navbar__bg">
            <div class="col-xl-12 col-lg-12 px-xl-0 px-lg-0 col-md-12 col-sm-12 d-inline-flex">
                <a class="navbar-brand mr-auto mt-md-1 ml-md-3 mt-sm-1 ml-sm-3 outline__none" href="/">
                    <span class="d-inline-flex">
                        <img src="{{ asset('images/cars/logos/logo5.png') }}" class="logo" alt="">
                        <h4 class="mb-0 logo__text">AvtoSklad</h4>
                    </span>
                    <span class="logo__small-text">Ehiyat Hissələrinin <span class="small__text">alışı və satışı</span></span>
                </a>



                <div class="mr-lg-5 mr-xl-5 ml-lg-3 mr-sm-3 mr-md-3 mt-sm-2 mt-md-2 d-inline-flex">
                    <div class="" id="navbarSupportedContent">
                        <div class="ml-xl-auto ml-lg-auto ml-md-auto d-inline-flex mt-3">
                            <a class="nav-link text-white p-sm-0 p-md-0 outline__none" href="#" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="">
                                    @auth
                                        <div class="d-inline-flex">
                                            @if( Auth::user()->status == 1 )
                                                <div class="mt-2 letter__spacing text__bold">
                                                    {{ Auth::user()->phone }}
                                                </div>
                                            @elseif( Auth::user()->status == 2 )
                                                    @isset( Auth::user()->image )
                                                        <div class="d-inline-flex mr-2 user__nav-image-parent">
                                                            <img src="{{ asset('images/users/sellers/small_'. Auth::user()->image) }}"
                                                                 class="user__nav-image"
                                                                 alt="Image">
                                                        </div>
                                                    @else
                                                        <div class="d-inline-flex mr-2 user__nav-image-svg">
                                                            <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                                            </svg>
                                                        </div>
                                                    @endisset

                                                <div class="m-auto">
                                                    {{ Auth::user()->name }}
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="mr-md-5 mr-sm-5">
                                            Giriş
                                        </div>
                                    @endauth
                                </div>
                            </a>

                            <div class="dropdown-menu drop__menu" aria-labelledby="navbarDropdown">
                                @auth
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit()">
                                        Çıxış
                                    </a>
                                    <form id="logout-form" method="post" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                @else
                                    <div class="">
                                        <a class="dropdown-item" href="{{ route('login') }}">Giriş</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Registrasiya</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @if( Auth::check() )
                        @if( Auth::user()->status == 1 )
                            <a class="nav-link dropdown text-white p-0 outline__none" href="{{ route('answers') }}"
                               id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('images/svg/answer.svg') }}" class="text-white pl-3" alt="answer">
                                <span class="sr-only">unread messages</span>

                                <answer-count :auth_user="{{ Auth::user() }}"></answer-count>
                            </a>


                        @elseif( Auth::user()->status == 2 )
                            <a class="nav-link dropdown text-white p-0 outline__none" href="{{ route('orders') }}"
                               id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('images/svg/answer.svg') }}" class="text-white pl-3" alt="answer">
                                <span class="sr-only">unread messages</span>

                                <orders-count></orders-count>
                                <answer-count :auth_user="{{ Auth::user() }}"></answer-count>
                            </a>

                        @endif
                    @endif
                </div>
            </div>
        </nav>

        @include('forms.search')

        <main class="col-xl-10 col-lg-10 col-md-12 col-sm-12 m-auto px-md-0 px-sm-0 pb-3 pt-2">
            @yield('content')
        </main>
    </div>
</body>
</html>
