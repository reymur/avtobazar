
<div class="col-11 m-auto p-4">
    @if( isset($similar_sales) && $similar_sales->count() > 0 )
        <div class=" mt-3 pt-2 pb-3 pl-n3">
            <div class="announce__title-text">
                Oxşar Elanlar
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 p-3 seller__store-card-div">
            @foreach( $similar_sales as $similar_sale )
                @if( $similar_sale->number != $sale->number )
                    <div class="col mb-3 px-2">
                        <a href="{{ route('sale-show', ['marka' => $similar_sale->marka, 'number' => $similar_sale->number]) }}"
                           class="text-decoration-none">
                            <div class="card h-100 hover__element">
                                <div class="">
                                    <div class="">
                                        <img src="/images/sale/{{ getFirstSmallImage($similar_sale->images) }}"
                                             alt="{{ getFirstSmallImage($similar_sale->images) }}">
                                    </div>
                                </div>

                                <div class="card-body p-2">
                                    <div class="">
                                        <div class="card-title title__size text__bold">
                                            <span class="">
                                                "{{ $similar_sale->marka }} {{ $similar_sale->model }}"
                                                {{ $similar_sale->title }}
                                            </span>
                                        </div>
                                    </div>

                                    <p class="card-text text-black-50 mt-2 ml-2 card__small-texts">
                                        <span class="mr-1">
                                            {{ \Carbon\Carbon::now()->diffForHumans($similar_sale->created_at) .',' }}
                                        </span>
                                        <span class="">{{ $similar_sale->city }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
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
