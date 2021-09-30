@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-lg-12 m-0 p-0">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => 'Type'])

            @include('partials.announcement_panel')

            @include('modals.spare_parts_find', ['car' => $type])

            @include('partials.car_types_card')
        </div>
    </div>
@endsection
