@extends('layouts.app')

@section('content')
<div class="col-xl-12 col-lg-12px-md-0 px-sm-0">
    <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
        <!-- Crumbs _page_links -->
        @include('crumbs._page_links', ['link' => 'Home'])

        @include('partials.announcement_panel')

        @include('modals.spare_parts_find', ['title' => 'MODELLƏR '])

        <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            @if( count($cars) )
                @foreach($cars as $car)
                    <div class="col-lg-4  col-md-4 col-sm-6 mb-3 border-bottom">
                        @include('partials.cars_card')
                    </div>
                @endforeach
            @endif
        </div>

        @if( isset($sales) && $sales->count() )
            <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mt-4 mb-3">
                @include('announcements.all_sales_show')
            </div><!-- Announce Sales -->
        @else
            <div class="d-table m-auto">
                <h4 class="mt-4 mb-3 letter__spacing text-uppercase">
                    Elan tapılmadı!
                </h4>
            </div>
        @endif
    </div>

    <!-- All cars -->
</div>
@endsection
