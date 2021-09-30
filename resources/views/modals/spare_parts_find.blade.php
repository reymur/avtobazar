
<div class="col-lg-12 col-md-12 col-sm-12 px-md-0 px-sm-0 mb-lg-4 mb-md-4 mb-sm-4 mt-xl-5 mt-lg-5 mt-md-4 mt-sm-4 text-center">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 border-bottom border-danger px-sm-0 m-xl-auto m-lg-auto title__text">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 d-xl-inline-flex d-lg-inline-flex d-md-block d-sm-block justify-content-center m-xl-auto m-lg-auto px-md-0 px-sm-0 pb-md-0 pb-sm-0 m-lg-auto">
            <div class="d-xl-inline-flex d-lg-inline-flex d-md-block d-sm-block mt-xl-2 mt-lg-2 mr-1 text-uppercase">
                <span class="text__bold">
                    @isset($title)
                        {{ $title }}
                    @endisset

                    @isset($car)
                        @if($car->name)
                            {{ $car->name }}
                        @endif
                    @endisset

                    @isset($type)
                        @if($type->title && $type->parent->name)
                            {{ $type->parent->name }} / {{ $type->title }}
                        @endif
                    @endisset
                </span>

                <span class="ml-2 mr-2">ÜZRƏ Ehtiyyat Hissələrini</span>

                <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-arrow-right-short d-xl-block d-lg-block d-md-none d-sm-none mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
            </div>

            <!-- Modal (TAP) -->
            @include('modals.announcement')
        </div>
    </div>
</div>
