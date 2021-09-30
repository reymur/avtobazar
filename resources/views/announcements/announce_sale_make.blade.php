@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl px-md-0 px-sm-0">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => 'Home'])

            @include('partials.announcement_panel')

            @include('modals.spare_parts_find', ['title' => 'MODELLƏR'])

            <div class="col-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
                <div class="col-lg-8 col-xl-8 col-md-10 col-sm-12 m-sm-0 p-sm-0 m-md-0 p-md-0 m-lg-auto">
                    <div class="m-auto pl-0 pb-2 letter__spacing">
                        <h5 class="text__bold">Yeni elan</h5>
                    </div>

{{--                    {{ dd( Auth::user() ) }}--}}

                    @if( Auth::check() )
                        <sale-make-form
                            :user="{{ getStatus(Auth::user()) }}"
                            :cars="{{ $cars }}"
                            :models="{{ $types }}"
                            :cities="{{ $cities }}"
                            :conditions="{{ $conditions }}"
                        ></sale-make-form>
                    @else
                        <sale-make-form
                            :user="{{ $auth = 'null' }}"
                            :cars="{{ $cars }}"
                            :models="{{ $types }}"
                            :cities="{{ $cities }}"
                            :conditions="{{ $conditions }}"
                        ></sale-make-form>
                    @endif

                </div>
            </div>
        </div>

        <!-- All cars -->
    </div>
@endsection
