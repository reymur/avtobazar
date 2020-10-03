@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
                @include('users.partials.user_left_bar')
            </div>

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0 pb-3 flash__bg border-left border-white">
                <div class="col-12 p-md-2 p-sm-0 mt-4 flash__bg">
                    <div class="ml-5 mb-3">
                        <h5 class="text-uppercase send__title ml-4">Sifarişlər</h5>
                    </div>

                    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                        @include('partials.orders_all_announce')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
