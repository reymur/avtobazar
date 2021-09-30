@extends('layouts.app')

@section('content')

    <div class="container-lg container-xl px-md-0 px-sm-0">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => 'Home'])

            @include('partials.announcement_panel')

            @include('modals.spare_parts_find')

            <div class="col-xl-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
                <div class="card col-xl-12 col-lg-12 bg-dark text-white p-3 mb-0 seller__store-image-div">
                    <sale-image-show
                        :sale="{{ $sale }}"
                        :sale_images="{{ $sale->images }}"
                    ></sale-image-show>
                </div><!--Seller Store image div-->

                <div class="col-12 p-xl-3 p-lg-3 px-md-0 px-sm-0 py-md-3 py-sm-3 sale__after-images d-flex">
                    <div class="row col-xl-11 col-lg-11 col-md-12 col-sm-12 m-auto">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 pl-sm-0 text-center text-md-left text-sm-left">
                            <div class="text-white d-inline-block sale__main-price">
                                {{ $sale->price }}
                                <span class="text-subtitle sale__price-subtitle">AZE</span>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 mt-3 pl-0">
                            <div class="sale__main-title">
                                {{ $sale->title }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-xl-11 col-lg-11 col-md-12 col-sm-12 px-md-0 px-sm-0 m-auto">
                    <div class="col-xl-8 col-lg-8 border-lg-last col-md-12 col-sm-12 sale__info">
                        <div class="pl-2 sale__info-content">
                            <table class="table border-0 m-0">
                                <tbody>
                                    <tr>
                                        <th class="text-muted">Marka:</th>
                                        <td>
                                            <div class="d-inline-block text__bold">
                                                <span class="">{{ $sale->marka }}</span>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash" viewBox="0 0 16 16">
                                                    <path d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                </svg>

                                                <span class="">{{ $sale->model }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Vəziyyəti: </th>
                                        <td>
                                            <div class="">
                                                <div class="d-inline-block text__bold">
                                                    {{ $sale->condition }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Şəhər: </th>
                                        <td>
                                            <div class="d-inline-block text__bold">
                                                <div class="">
                                                    {{ $sale->city }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                        <div class="d-block px-4 py-3 sale__note">
                            {{ $sale->note }}
                        </div>
                    </div>

                    <div class="col-lg-3 order-lg-first text-center">
                        <div class="col-xl-12 col-lg-12 mt-3 pt-2 mx-auto d-flex sale__left-info">
                            <div class="my-auto mr-3 sale__phone-bg text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </div>

                            <div class="">
                                @if( $sale->phones->count() > 0 )
                                    @foreach($sale->phones as $phone)
                                        <div class="mb-n1">
                                            <a href="tel:(050)2536564" class="text-dark text__decoration">
                                                {{ $phone->number }}
                                            </a>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="">
                                    @if( getStatus($sale) )
                                        <a href="{{ route('seller-store', ['id' => $sale->id]) }}"
                                           target="_blank" class="text__decoration sale__name">
                                            {{ $sale->name }}
                                        </a>
                                    @else
                                        <div class=" text__bold">{{ $sale->name }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 mt-3 mx-auto py-2 d-flex sale__left-info">
                            <div class="d-flex text-success">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                </span>

                                <div class="">
                                    <a href="{{ route('sale-user-all-sales', ['phone' => $sale->user_id]) }}" class="text__decoration">
                                        <span class="sale__name">
                                            {{ $sale->name }}
                                        </span>
                                        <span class=".sale__name-sub">
                                            bütün elanlar
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-left text-black-50 mt-4 sale__last-info">
                            <div class="">
                                <span class="">Elanın nömrəsi:</span>
                                <span class="">{{ $sale->number }}</span>
                            </div>
                            <div class="">
                                <span class=""></span>
                                <span class="">Baxışların sayı:</span>
                                <span class="">{{ $sale->seen }}</span>
                            </div>
                            <div class="">
                                <span class="">Yeniləndi:</span>
                                <span class="">
                                    {{ Carbon\Carbon::now()->diffForhumans( $sale->updated_at ) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Similar sales show-->
                @include('announcements.similar_sales_show')
            </div>
        </div>

        <!-- All cars -->
    </div>
@endsection

