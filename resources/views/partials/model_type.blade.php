@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => 'Type'])

            @include('partials.announcement_panel')

            <div class="col-lg-12 mb-3 mt-2 m-sm-0 p-sm-0 d-inline-flex">
                <div class="col-lg-6 col-md-6  pr-lg-0 text-center">
                    <p class="title__text">
                        <span class="text-uppercase">
                            <strong>{{  $type->parent->name }} {{ $type->title ?? 'Model' }}</strong>
                        </span>
                             Ehtiyyat Hissələrini
                        <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </p>
                </div>

                @include('modals.announcement')
            </div>

            <div class="container-lg p-lg-3 p-sm-0 mt-4">
                <div class="row p-sm-0 col-lg-12 mx-auto">
                    @include('partials.models_card')
                </div>
            </div>
        </div>
    </div>
@endsection
