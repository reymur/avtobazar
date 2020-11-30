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
                <div class="card bg-dark text-white mb-4 seller__store-image-div">
                    <seller-photo
                        :user="{{ $user }}"
                    ></seller-photo>

                    <div class="card-img-overlay d-table seller__store-image-text">
                        <h5 class="card-title ml-4 text-uppercase letter__spacing">
                            {{ $user->name ?? '' }}
                        </h5>
                        <p class="card-text ml-4 letter__spacing">
                            <span class="row pl-3">{{ $user->address ?? '' }}</span>
                            <span class="row pl-3 mb-2">{{ $user->email ?? '' }}</span>
                            <span class="row pl-3">
                                <span class="text-success pr-2">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-forward" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>

                                <a href="tel:{{ $user->phone ?? '' }}" class="text-white h5">
                                    {{ $user->phone ?? '' }}
                                </a>
                            </span>
                        </p>
                    </div>

                    <div class="card-body bg-info">
                        <div class=" d-flex">
                            <div class="ml-4 pr-5 border-right border-secondary">
                                <div class="card-title mb-1 d-inline-flex letter__spacing">
                                    <h4 class="text-h3 pr-2 mb-1 text">{{ $user->name ?? '' }}</h4>
                                    <span class="card-subtitle">{{ $user->whos->who }}</span>
                                </div>

                                <div class="card-text text-dark mb-1 d-flex">
                                    @if( $user->address )
                                        <span class="pr-1">
                                    <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                </span>

                                        <span class="text-break d-block pt-1">
                                    {{ $user->address }}
                                </span>
                                    @endif
                                </div>

                                <div class="card-text text-dark d-flex">
                            <span class="pr-2">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </span>

                                    <span class="text-break d-block work__time">
                                Hər gün: 09:00–19:00
                            </span>
                                </div>

                                <p class="card-text d-inline-block mt-3 ml-4 p-2 store__announce-dix">
                                <span class="mr-1 store__announce-count">
                                    54337
                                </span>
                                    <span class="">Elan</span>
                                </p>
                            </div>
                            <div class="ml-4 mt-4">
                                <div class="pt-2 text-light-50 letter__spacing">
                                    <h5>Dəstəklədiyi markalar:</h5>
                                </div>

                                <div class="col-12 bg-primary text-break px-3 py-2">
                                    @foreach( $user->sellerTypes as $key => $marka )
                                        <div class="row m-0 seller__store-models letter__spacing">
                                            <a href="{{ route('models', ['name' => $marka->model->title]) }}"
                                               class="text-light"
                                               target="_blank">

                                                {{ $marka->title }}

                                                @if( $user->sellerTypes->count() != $key + 1 )
                                                    <span class="pl-0 pr-1">/</span>
                                                @endif
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="d-flex mt-4 seller__store-info-text">
                                    <div class="mr-3 seller__store-item">{{ $user->address ?? '' }}</div>
                                    <div class="mr-3 seller__store-item">{{ $user->email ?? '' }}</div>
                                    <div class="">
                                        <a href="tel:{{ $user->phone }}" class="seller__store-a">
                                            {{ $user->phone ?? '' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Seller Store image div-->

                <div class="col-10 m-auto">
                    <div class="pt-2 pb-2 pl-n3">
                        <div class="announce__title-text">
                            İstifadəçinin bütün elanları
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-4 seller__store-card-div">
                        @for( $i = 0; $i < 100; $i++ )
                            <div class="col mb-3 px-1">
                                <div class="card h-100 hover__element">
                                    <card-image-swipe
                                        :user="{{ $user }}"
                                    ></card-image-swipe>

                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- All cars -->
    </div>
@endsection
