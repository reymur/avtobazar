@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12 mb-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Mersedes</li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-12 mb-3 mt-2 d-inline-flex">
            <div class="col-lg-6">
                <p class="text-uppercase title__text">Mersedes</p>
            </div>

            <div class="col-lg-6 ml-5">
                <!-- Modal -->
                @include('modals.announcement')
            </div>
        </div>

        <div class="row ml-lg-2 ml-md-2 ml-sm-1 d-inline-flex">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                    <a href="#" class="d-sm-inline-flex">
                        <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                    <a href="#" class="d-sm-inline-flex">
                        <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                    <a href="#" class="d-sm-inline-flex">
                        <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                    <a href="#" class="d-sm-inline-flex">
                        <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                    <a href="#" class="d-sm-inline-flex">
                        <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                    <a href="#" class="d-sm-inline-flex">
                        <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection






