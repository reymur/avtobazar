
<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-lg-1 pl-0 m-md-0 p-md-0 m-sm-0 p-sm-0 text-left">
    @include('buttons._big_btn')

    @include('buttons._small_btn')

    @if( Auth::check() )
        <!-- Modal -->
        <Index
            :user="{{ Auth::user() }}"
            :cars="{{ $cars }}"
            :default_marka_name="@isset($model){{ $model }}@endisset @if(!isset($model)) 'BMW' @endif"
            :default_type_name="@isset($type){{ $type }}@endisset @if(!isset($type)) '' @endif"
            :types="{{ $types }}"
            :cities="{{ $cities }}"
            :years="{{ $years }}"
            :motors="{{ $motors }}"
            :fuelTypes="{{ $fuel_types }}"
        ></Index>
    @else
        <!-- Registration -->
        <register
            :whos="{{ $who }}"
            :cars="{{ $cars }}"
            :cities="{{ $cities }}"
        ></register>
    @endif
</div>

