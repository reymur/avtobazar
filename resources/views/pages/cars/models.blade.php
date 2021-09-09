@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => $model->first()->title])

            @include('partials.announcement_panel')

            <div class="col-lg-12 col-md-12 col-sm-12 d-inline-flex mb-lg-4 mb-md-5 mb-sm-5 mt-xl-5 mt-lg-5 mt-md-4 mt-sm-4 text-center">
                <div class="col-sm-7 d-inline-flex border-bottom border-danger px-sm-0 m-auto title__text">
                    <div class="m-auto d-flex">
                        <div class="mt-1 mr-2 text-uppercase">
                            <span class="text__bold">
                                @isset($model)
                                    {{ $model->name }}
                                @endisset
                            </span>
                            <span class="">ÜZRƏ Ehtiyyat Hissələrini</span>

                            <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>

                        <!-- Modal (TAP) -->
                        @include('modals.announcement')
                    </div>
                </div>
            </div>

            @include('partials.car_models_card')

        </div>
    </div>
@endsection
