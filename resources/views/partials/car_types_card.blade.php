
<div class="container-lg pt-lg-2 pt-md-2 p-sm-0 mt-0">
    <div class="row col-lg-12 p-sm-0 mx-auto">
        @isset($type)
            @if($type)
                <div class="col-lg-12 col-md-12">
                    <div class="d-table m-auto">
                        <h5 class="mb-3 letter__spacing text-uppercase">
                            @if($type->title)
                                {{ $type->parent->name }} / {{ $type->title }}
                            @else
                                {{ $type->parent->name }}
                            @endif
                        </h5>
                    </div>
                    <div class="letter__spacing text-uppercase text__bold">
                        bütün elanlar
                    </div>
                    <div class="">
                        @isset($announce_sales)
                            @if($announce_sales->count())
                                <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
                                    @include('announcements.sales_section')
                                </div><!-- Announce Sales -->
                            @endif
                        @endisset
                    </div>
                </div>
            @endif

{{--            <table class="d-inline-flex m-auto">--}}
{{--                <tr>--}}
{{--                    <td class="letter__spacing text-uppercase text__bold">--}}
{{--                        {{ $model->name }} ---}}
{{--                    </td >--}}
{{--                    <td class="letter__spacing text-uppercase ">markasına uyğun model tapılmadı!</td>--}}
{{--                </tr>--}}
{{--            </table>--}}
        @endisset
    </div>
</div>

