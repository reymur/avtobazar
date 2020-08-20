@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            @include('announcements.left_bar')

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0">
                <div class="col-12 p-md-2 p-sm-0 flash__bg">
                    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                       ddddddd
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
