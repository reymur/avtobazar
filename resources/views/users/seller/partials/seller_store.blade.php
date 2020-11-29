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

{{--                    <img src="/images/users/sellers/{{ $user->image }}"--}}
{{--                         class="card-img seller__store-image" alt="{{ $user->image }}">--}}

                    <div class="card-img-overlay d-table seller__store-image-text">
                        <h5 class="card-title ml-4 text-uppercase letter__spacing">{{ $user->name ?? '' }}</h5>
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
                </div><!--Seller Store image div-->

                <div class="col-10 m-auto">
                    <div class="pt-4 pb-1 pl-n3">
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
