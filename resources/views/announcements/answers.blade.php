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
                        <h5 class="text-uppercase send__title ml-4">Cavablar</h5>
                    </div>

                    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                        @isset( $answers_all )
                            <div class="row mb-4 ml-1">
                                <div class="">
                                    Cavab: <span class="badge badge-danger p-2">Gözlənilir</span>
                                </div>
                            </div>

                            @if( count($answers_all) > 0 )
                                @include('partials.answer_all_announce')
                            @else
                                <span class="">Yox</span>
                            @endif

                            <div class="mt-4 pt-1">
                                {{ $answers_all->links() }}
                            </div>
                        @else
                            <h3 class="text-center not__announce">Elan tapılmadı!</h3>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
