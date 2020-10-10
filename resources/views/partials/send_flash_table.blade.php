
<table class="table table-bordered">
    <tbody>
    @if( $announce->created_at )
        <div class="mr-3 mx-2 text-right text-black-50">
            <span>
                {{ Illuminate\Support\Carbon::now()->diffForHumans($announce->created_at) }}
            </span>
        </div>
    @endif
    @if( $announce->spare_parts )
        <tr>
            <td scope="row" class="text-right text-black-50">Ehtiyat hissəsi:</td>
            <td class="text-break text-center">{{ $announce->spare_parts }}</td>
        </tr>
    @endif

    @if( $announce->condition )
        <tr>
            <td scope="row" class="text-right text-black-50">Vəziyyəti:</td>
            <td class="text-break text-center">{{ $condition->title ?? 'Yox' }}</td>
        </tr>
    @endif

    @if( $announce->marka )
        <tr>
            <td scope="row" class="text-right text-black-50">Marka:</td>
            <td class="text-break text-center">{{ $announce->marka }}</td>
        </tr>
    @endif

    @if( $announce->model )
        <tr>
            <td scope="row" class="text-right text-black-50">Model:</td>
            <td class="text-break text-center">{{ $announce->model }}</td>
        </tr>
    @endif

    @if( $announce->year )
        <tr>
            <td scope="row" class="text-right text-black-50">Buraxılış:</td>
            <td class="text-break text-center">{{ $announce->year }}</td>
        </tr>
    @endif

    @if( $announce->motor )
        <tr>
            <td scope="row" class="text-right text-black-50">Motor:</td>
            <td class="text-break text-center">{{ $announce->motor }}</td>
        </tr>
    @endif

    @if( $announce->texpassport )
        <tr>
            <td scope="row" class="text-right text-black-50">Texpassport:</td>
            <td class="text-break text-center">{{ $announce->texpassport }}</td>
        </tr>
    @endif

    @if( $announce->city )
        <tr>
            <td scope="row" class="text-right text-black-50">Şəhər:</td>
            <td class="text-break text-center">{{ $announce->city }}</td>
        </tr>
    @endif

    @if( $announce->image )
        <tr>
            <td scope="row" class="text-right text-black-50">Şəkil:</td>
            <td class="text-break text-center">
                <img class="flash__image" src="{{ asset('/images/users/announcement/'.$announce->image) }}" alt="Image">
            </td>
        </tr>
    @endif

    @if( $announce->note )
        <tr>
            <td scope="row" class="text-right text-black-50">Əlavə məlumat:</td>
            <td class="text-break text-center">{{ $announce->note }}</td>
        </tr>
    @endif
    </tbody>
</table>
