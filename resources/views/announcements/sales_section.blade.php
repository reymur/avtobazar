

<div class="col-lg-10 col-xl-10 col-md-12 col-sm-12 m-lg-auto m-md-0 m-sm-0 p-sm-0 p-md-0">
    <div class="row row-cols-lg-4 row-cols-xl-4 row-cols-md-2 row-cols-sm-1 mx-md-0 mx-sm-0 seller__store-card-div">
        @foreach($announce_sales as $announce)
            <div class="col mb-3 px-1">
                <div class="card h-100 hover__element">
                    <card-image-swipe
                        :announce="{{ $announce }}"
                    ></card-image-swipe>

                    <div class="card-body">
                        <h5 class="card-title">{{ $announce->title }}</h5>
                        <p class="card-text">{{ $announce->note }}</p>
                    </div>
                </div>
            </div>
        @endforeach
{{--        {{ dd( $announce->image->title ) }}--}}
    </div>
</div>
