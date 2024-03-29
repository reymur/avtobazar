@extends('layouts.app')

@section('content')
    <div class="col-12 px-md-0 px-sm-0">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
                @include('users.partials.user_left_bar')
            </div>

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0 pb-3 flash__bg border-left border-white">
                <div class="col-10 pt-3 pl-4 ml-2 mt-2 mb-3">
                    @if( Auth::check() )
                        <h5 class="ml-2 text-uppercase">{{ Auth::user()->autoNumber ?? "Adsız" }}</h5>
                    @endisset
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-3 bg-white flash__shadow">
                    <div class="col-12">
                        @if( Auth::check() )
                            <table class="table">
                                <tbody>
                                    @if( isset($slug) && $slug == 'marka' )
                                        @include('users.buyer.forms.marka_edit_form')
                                    @endif

                                    @if( isset($slug) && $slug == 'phone' )
                                        @include('users.buyer.forms.phoneNumber_edit_forms')
                                    @endif

                                    @if( isset($slug) && $slug == 'password' )
                                        @include('users.buyer.forms.password_edit_form')
                                    @endif
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
