@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 p-md-0 p-sm-0 m-auto">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mt-3 mx-auto py-lg-2 p-md-0 p-sm-0 d-flex sale__left-info">
            <div class="m-sm-auto m-md-auto">
                @isset($user)
                    @if( is_array($user) )
                        <table class="table m-0">
                            <tbody>
                            <tr>
                                @foreach($user as $key => $val)
                                    @if($key === 'name')
                                        <th class="text-muted">
                                            <h4>{{ $val }}</h4>
                                        </th>
                                    @endif
                                    @if($key === 'tel')
                                        <td>
                                            <div class="text__bold">
                                                <a href="{{$key}}:" class="m-0">
                                                    <h4 class="m-0">{{ $val }}</h4>
                                                </a>
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    @endif
                @endisset
            </div>
        </div>
        @if( isset($all_sales) && $all_sales->count() > 0 )
            <div class="col-lg-10 m-lg-auto mt-3 pt-2 pb-3 pl-xl-n3 pl-lg-n3">
                <div class="mt-lg-4 ml-lg-0 ml-md-1 ml-sm-1 announce__title-text">
                    İstifadəçinin bütün elanları
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 col-lg-10 col-md-12 col-sm-12 m-lg-auto m-md-auto m-sm-auto p-md-0 p-sm-0 seller__store-card-div">
                @foreach( $all_sales as $sale )
                    <div class="col mb-3 px-2">
                        <a href="{{ route('sale-show', ['marka' => $sale->marka, 'number' => $sale->number]) }}"
                           class="text-decoration-none">
                            <div class="card h-100 hover__element">
                                <div class="">
                                    <div class="">
                                        <img src="/images/sale/{{ getFirstSmallImage($sale->images) }}"
                                             alt="{{ getFirstSmallImage($sale->images) }}">
                                    </div>
                                </div>

                                <div class="card-body p-2">
                                    <div class="">
                                        <div class="card-title title__size text__bold">
                                            <span class="">
                                                "{{ $sale->marka }} {{ $sale->model }}"
                                                {{ $sale->title }}
                                            </span>
                                        </div>
                                    </div>

                                    <p class="card-text text-black-50 mt-2 ml-2 card__small-texts">
                                        <span class="mr-1">
                                            {{ \Carbon\Carbon::now()->diffForHumans($sale->created_at) .',' }}
                                        </span>
                                        <span class="">{{ $sale->city }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="mt-3 pt-2 pb-3 pl-n3">
                <h5 class="d-flex justify-content-center">
                    Oxşar Elanlar tapılmadı!
                </h5>
            </div>
        @endif
    </div>
@endsection
