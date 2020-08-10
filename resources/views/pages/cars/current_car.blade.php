@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['links' => ['Home','Model name','Car name']])

            <div class="col-lg-12 mb-3 mt-2 m-sm-0 p-sm-0 d-inline-flex">
                <div class="col-lg-6 col-md-6  pr-lg-0 text-center">
                    <p class="text-uppercase title__text">Model üzrə</p>
                </div>

                @include('modals.announcement')
            </div>

            <div class="container">
                <div class="col-lg-6 text-break text-center">
                    <p>Model</p>
                </div>
            </div>
        </div>
    </div>
@endsection
