@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl px-md-0 px-sm-0">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => 'Home'])

            @include('partials.announcement_panel')

            <div class="col-lg-12 col-md-12 col-sm-12 mb-lg-4 mb-md-5 mb-sm-5 mt-xl-5 mt-lg-5 mt-md-4 mt-sm-4 text-center d-inline-flex">
            <span class="col-lg-6 col-md-6 col-sm-7 px-sm-0 mr-lg-1 mr-sm-0 text-uppercase title__text">
                <span class="text__bold">Modellər </span>
                ÜZRƏ Ehtiyyat Hissələrini
                <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
            </span>

                <!-- Modal -->
                @include('modals.announcement')
            </div>

            <div class="col-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
                <div class="col-lg-8 col-xl-8 col-md-10 col-sm-12 m-sm-0 p-sm-0 m-md-0 p-md-0 m-lg-auto">
                    <div class="text-uppercase mb-3 px-md-4 px-sm-4">
                        <h6>Yeni elan</h6>
                    </div>

                    <sale-make-form></sale-make-form>

                </div>
            </div>
        </div>

        <!-- All cars -->
    </div>
@endsection
