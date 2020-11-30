

<div class="col-lg-10 col-xl-10 col-md-12 col-sm-12 m-lg-auto m-md-0 m-sm-0 p-sm-0 p-md-0">
    <div class="row row-cols-lg-4 row-cols-xl-4 row-cols-md-2 row-cols-sm-1 mx-md-0 mx-sm-0 seller__store-card-div">
        @for( $i = 0; $i < 100; $i++ )
            <div class="col mb-3 px-1">
                <div class="card h-100 hover__element">
{{--                    <card-image-swipe--}}
{{--                        :user="{{ $user }}"--}}
{{--                    ></card-image-swipe>--}}

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting little bit longer.</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
