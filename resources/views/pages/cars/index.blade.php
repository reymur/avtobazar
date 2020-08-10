@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['links' => ['Home', 'Model name']])

            <div class="col-lg-12 mb-3 mt-2 d-inline-flex">
                <div class="col-lg-6 col-md-6  pr-lg-0 text-center">
                    <p class="text-uppercase title__text">Mersedes markaları üzrə</p>
                </div>


                <!-- Modal -->
                @include('modals.announcement')
            </div>

            <div class="row ml-lg-2 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0 d-inline-flex text-center">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                        <a href="{{ route('car') }}" class="d-sm-inline-flex">
                            <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                        <a href="{{ route('car') }}" class="d-sm-inline-flex">
                            <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                        <a href="{{ route('car') }}" class="d-sm-inline-flex">
                            <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                        <a href="{{ route('car') }}" class="d-sm-inline-flex">
                            <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                        <a href="{{ route('car') }}" class="d-sm-inline-flex">
                            <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-lg-1 mb-md-2 mb-sm-2">
                        <a href="{{ route('car') }}" class="d-sm-inline-flex">
                            <span class="">A-140</span> &nbsp;&nbsp; <span class="text__size text-danger">(23)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






