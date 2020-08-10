@extends('layouts.app')

@section('content')
<div class="container-lg container-xl">
    <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
        <!-- Crumbs _page_links -->
        @include('crumbs._page_links', ['links' => ['Home']])

        <div class="col-lg-12 col-md-12 col-sm-12 mb-lg-4 mb-md-3 mb-sm-4 text-center d-inline-flex">
            <span class="col-lg-6 col-md-6 col-sm-7 px-sm-0 text-uppercase mr-lg-1 mr-sm-0 title__text">
                <span class="">BÜTÜN MARKALAR ÜZRƏ</span>
            </span>

            <!-- Modal -->
            @include('modals.announcement')
        </div>

        <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0 text-center">
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
            <div class="card-body col-lg-3 col-md-4 col-sm-6 p-0">
                <a href="{{ route('cars') }}" class="text-decoration-none text-primary d-inline-flex">
                    <span class="">
                        <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                    </span>
                    <span class="">
                        <p class="m-0 p-0">
                           <strong>BMW</strong>
                        </p>
                        <p class="text-dark m-0 p-0">
                           <strong>1234</strong>
                        </p>
                    </span>
                </a>
                <hr>
            </div>
        </div>
    </div>

    <!-- All cars -->
</div>
@endsection
