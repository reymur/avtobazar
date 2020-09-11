

<table class="d-inline-flex">
    <tr>
        <td class="text-right">14</td>
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
