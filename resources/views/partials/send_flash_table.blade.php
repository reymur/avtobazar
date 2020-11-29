
<div class="text-right mr-3 mt-n5 mb-4">
    <a href="{{ route('send') }}" class="text-danger">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </a>
</div>

<table class="table table-bordered">
    <tbody>
        @if( $announce->created_at )
            <div class="mr-3 mx-2 text-right text-black-50">
                <span class="mr-4">{{ $announce->city }}</span>
                <span>{{ $announce->created_at }}</span>
            </div>
        @endif
        @if( $announce->spare_parts )
            <tr>
                <td class="text-break text-center p-2" colspan="2">
                    <div class="p-2 show__seller-text">
                        {{ $announce->spare_parts }}
                    </div>
                </td>
            </tr>
        @endif

        @if( $announce->marka )
            <tr>
                <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                <td class="text-break text-center py-2">
                    {{ $announce->marka ?? 'Yox' }}
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    {{ $announce->model ?? 'Yox' }}
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    {{ $announce->motor ?? 'Yox' }}
                </td>
            </tr>
        @endif

        @if( $announce->year )
            <tr>
                <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                <td class="text-break text-center py-2">
                    {{ $announce->year ?? 'Yox' }}
                </td>
            </tr>
        @endif

        @if( $announce->getCondition )
            <tr>
                <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                <td class="text-break text-center py-2">
                    {{ $announce->getCondition->title ?? 'Yox' }}
                </td>
            </tr>
        @endif

        @if( $announce->texpassport )
            <tr>
                <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                <td class="text-break text-center text-uppercase py-2 flash__texpass">
                    {{ $announce->texpassport }}
                </td>
            </tr>
        @endif

        @if( $announce->image )
            <tr>
                <td scope="row" class="text-right text-black-50">Şəkil:</td>
                <td class="text-break text-center">
                    <send-flash-table-image-show
                        :announce="{{ $announce }}"
                    ></send-flash-table-image-show>
{{--                    <img class="flash__image" src="{{ asset('/images/users/announcement/orders/'.'small_'.$announce->image) }}" alt="Image">--}}
                </td>
            </tr>
        @endif
    </tbody>
</table>
