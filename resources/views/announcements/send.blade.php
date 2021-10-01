@extends('layouts.app')

@section('content')
    <div class="col-12 px-md-0 px-sm-0">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')
        @include('modals.spare_parts_find', ['title' => 'MODELLƏR'])

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
                <user-left-side-bar
                    :auth_check="{{ Auth::check() }}"
                    :auth_user="{{ Auth::user() }}"
                    :orders_count="{{ getUserLeftBarOrderCount()[0] }}"
                    :new_orders="{{ getUserLeftBarOrderCount()[1] }}"
                    :auth_user_get_sends="{{ Auth::user()->getSends }}"
                ></user-left-side-bar>
            </div>

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0 pb-3 flash__bg border-left border-white">
                <div class="col-12 p-md-2 p-sm-0 mt-4 flash__bg">
                    <div class="ml-5 mb-3">
                        <h5 class="text-uppercase send__title ml-4">Göndərilənlər</h5>
                    </div>

                    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                        @isset( $announce )
                            <div class="row mb-4 ml-1">
                                @if( session()->has('send_flash') )
                                    <div class="d-inline-flex">
                                        <span class="mr-1">Elan göndərildi:</span>
                                        @if( isset($store) && $store->count() )
                                            @include('modals.show_all_sellers_for_send_to', ['data' => $store, 'who' => 'store'])
                                        @endif

                                        @if( (isset($store) && $store->count()) && (isset($morg) && $morg->count()) )
                                            <span class="send__to-element">|</span>
                                        @endif

                                        @if( isset($morg) && $morg->count() )
                                            @include('modals.show_all_sellers_for_send_to', ['data' => $morg, 'who' => 'morg'])

                                            <a href="{{ route(
                                                            'send_to_post',['who' => $morg->first()->who,
                                                            'pin' => $morg->first()->pivot->pivotParent->pin]
                                                        ) }}"
                                               class="badge badge-success p-2">
                                                {{ count($morg) .' ölüxana' }}
                                            </a>
                                        @endif
                                    </div>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                @endif

                                @if( session()->has('send_flash') )
                                    @include('partials.answer_count_show_for_flash_send')
                                @else
                                    @include('partials.answer_count_show')
                                @endif
                            </div>

                            @if( session()->has('send_flash') )
                                @include('partials.send_flash_table')
                            @else
                                @if( isset($announce_all) && count($announce_all) > 0 )
                                    @include('partials.send_all_announce')
                                @else
                                    <span class="">Yox</span>
                                @endif
                            @endif

                            @if( ! session()->has('send_flash') )
                                <div class="mt-4 pt-1">
                                    {{ $announce_all->links() }}
                                </div>
                            @endif
                        @else
                            <h3 class="text-center not__announce">Elan tapılmadı!</h3>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


