
<div class="container-lg p-lg-3 p-sm-0 mt-0">
    <div class="row col-lg-12 p-sm-0 mx-auto">
        @isset($model)
            @if( $model->types->count() )
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="d-table m-auto">
                        <h5 class="mb-3 text__bold letter__spacing text-uppercase">
                            {{ $model->name }}
                        </h5>
                    </div>
                </div>
                @foreach($model->types as $type)
                    @if($type->title)
                        <div class="col-lg-3 col-md-4 col-sm-6 p-sm-0">
                            <table class="d-inline-flex">
                                <tr>
                                    <td class="text-right">{{ incrementVar() }}</td>
                                    <td class="col mt-3">
                                        <a href="{{ route('model.type', [
                                                        'model' => $type->parent->title,
                                                        'title'  => $type->title,
                                                    ])
                                                }}" class="model__types_text outline__none">
                                            {{ $type->title }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endif
                @endforeach
            @else
                <table class="d-inline-flex m-auto">
                    <tr>
                        <td class="letter__spacing text-uppercase text__bold">
                            {{ $model->name }} -
                        </td >
                        <td class="letter__spacing text-uppercase ">markasına uyğun model tapılmadı!</td>
                    </tr>
                </table>
            @endif
        @endisset
    </div>
</div>

@if( $model->sales->count() )
    <div class="">
        <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            @include('announcements.sales_section', ['sales' => $model->sales])
        </div><!-- Announce Sales -->
    </div>
@else
    <div class="d-table m-auto">
        <h5 class="mt-4 mb-3 letter__spacing text-uppercase">
            Elan tapılmadı!
        </h5>
    </div>
@endif

