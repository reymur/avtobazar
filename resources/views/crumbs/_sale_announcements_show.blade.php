
@if( isset($all_sales) && !empty($all_sales) && $all_sales->count() > 0 )
    <div class="col-lg-12 m-lg-auto mt-3 pt-2 pb-3 pl-xl-n3 pl-lg-n3">
        <div class="mt-lg-4 ml-lg-0 ml-md-1 ml-sm-1 announce__title-text">
            İstifadəçinin bütün elanları
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-4 col-lg-12 col-md-12 col-sm-12 m-lg-auto m-md-auto m-sm-auto p-md-0 p-sm-0 seller__store-card-div">
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
    <div class="mt-0 pt-2 pb-3 pl-n3">
        @if( isset($sale_car_model) && $sale_car_model )
            <h4 class="d-flex justify-content-center">
                <span class="text-uppercase mr-3 text__bold">{{ $sale_car_model }} </span>
                <span class="letter__spacing">uyğun Elan tapılmadı!</span>
            </h4>
        @else
            <h4 class="d-flex justify-content-center">
                Oxşar Elan tapılmadı!
            </h4>
        @endif
    </div>
@endif
