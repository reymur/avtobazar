
<div class="container-lg pt-lg-2 pt-md-2 p-sm-0 mt-0">
    <div class="row col-lg-12 p-sm-0 mx-auto">
        @isset($type)
            @if($type)
                <div class="col-lg-12 col-md-12">
                    <div class="d-table m-auto">
                        <h5 class="mb-3 letter__spacing text-uppercase text__bold">
                            @if($type->title)
                                {{ $type->parent->name }} / {{ $type->title }}
                            @else
                                {{ $type->parent->name }}
                            @endif
                        </h5>
                    </div>

                    @if( $type->sales->count() )
                        <div class="">
                            <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
                                @include('announcements.sales_section', ['sales' => $type->sales])
                            </div><!-- Announce Sales -->
                        </div>
                    @else
                        <div class="d-table m-auto">
                            <h4 class="mt-4 mb-3 letter__spacing text-uppercase">
                                Elan tapılmadı!
                            </h4>
                        </div>
{{--                        <table class="d-inline-flex m-auto">--}}
{{--                            <tr>--}}
{{--                                <td class="letter__spacing text-uppercase text__bold">--}}
{{--                                    Elan tapılmadı!--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
                    @endif
                </div>
            @endif
        @endisset
    </div>
</div>

