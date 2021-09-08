
@if($show_car_types)
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
@else
    <div class="col-lg-12 col-md-12">
        <div class="d-table m-auto">
            <h5 class="mb-3 letter__spacing text-uppercase">
                {{ $type->parent->name }} / {{ $type->title }}
            </h5>
        </div>
        <div class="letter__spacing text-uppercase text__bold">
            bütün elanlar
        </div>
    </div>
@endif
