
@isset($sales)
    @if( is_object($sales) && $sales->count() )
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 m-lg-auto m-md-0 m-sm-0 p-sm-0 p-md-0">
            <div class="mb-2 letter__spacing text-uppercase text__bold">
                bütün elanlar
            </div>
            <div class="row row-cols-lg-4 row-cols-xl-4 row-cols-md-2 row-cols-sm-1 mx-md-0 mx-sm-0 seller__store-card-div">
                @foreach($sales as $sale)
                    <div class="col mb-3 px-1">
                        <div class="card h-100 hover__element">
                            <div class="">
                                @if($sale->marka && $sale->number)
                                    <a href="{{ route('sale-show',['marka' => $sale->marka, 'number'=>$sale->number]) }}"
                                       target="_blank" class="">
                                        <img src="{{ asset('images/sale/'. saleSmallImage($sale->images) ) }}" alt="">
                                    </a>
                                @else
                                    <img src="{{ asset('images/sale/'. saleSmallImage($sale->images) ) }}" alt="">
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $sale->title }}</h5>
                                <p class="card-text">{{ $sale->note }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endisset
