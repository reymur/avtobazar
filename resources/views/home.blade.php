@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row col-lg-12 mb-3">
            <div class="col-lg-12 mb-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mb-lg-4 d-inline-flex">
                <p class="text-uppercase mr-lg-4 mr-sm-4 title__text">Populyar Markalar</p>

                <div class="col-lg-6 ml-5">

                    <!-- Modal -->
                    @include('modals.announcement')
                </div>
            </div>

            <div class="row col-lg-12 col-md-12 col-sm-12">
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

        <div class="row col-lg-12">
            <div class="col-lg-12 mb-lg-2 mb-md-1 mb-sm-1">
                <p class="text-uppercase title__text">Bütün Markalar</p>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                           3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card-body p-0 border-bottom border__b">
                    <a class="text-decoration-none text-primary d-inline-flex" href="">
                        <span class="border__bottom_clear">
                            <img class="avto__logo" src="{{ asset('images/avtologos/bmw.jpg') }}" alt="Logo">
                        </span>
                        <span class="mt-auto mb-2">
                            <p class="m-0 p-0 text-body">
                               <strong>BMW</strong>
                            </p>
                        </span>
                    </a>
                    <div class="float-right mt-3 mr-2">
                        <p class="m-0 p-0 text-dark">
                            3444
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
