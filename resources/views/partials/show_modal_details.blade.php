
@isset($data)
    <div class="modal-header">

        @if( isset($data->getSender->name) || isset($data->getSender->autoNumber) )
            <h5 class="modal-title" id="send_all-{{ $data->id }}">
                <span class="mr-0">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                    </svg>
                </span>
                <span class="text-uppercase letter__spacing">
                    {{
                        $data->getSender->name ??
                        $data->getSender->autoNumber
                    }}
                </span>
            </h5>

            <span class="px-3"></span>

            <span class="pt-1 text-black-50">
                {{ $data->created_at ?? '' }}
            </span>

            <span class="px-3"></span>

            <span class="pt-1 text-black-50">
                {{ $data->city ?? '' }}
            </span>
        @else
            Yox
        @endif

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body pt-2 pb-1">
        <table class="table table-bordered">
            @if( $data->spare_parts )
                <tr>
                    <td class="text-break text-center p-2" colspan="2">
                        <div class="p-2 show__seller-text">
                            {{ $data->spare_parts }}
                        </div>
                    </td>
                </tr>
            @endif

            @if( $data->marka )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                    <td class="text-break text-center py-2">
                        {{ $data->marka ?? 'Yox' }}
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        {{ $data->model ?? 'Yox' }}
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        {{ $data->motor ?? 'Yox' }}
                    </td>
                </tr>
            @endif

            @if( $data->year )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                    <td class="text-break text-center py-2">
                        {{ $data->year ?? 'Yox' }}
                    </td>
                </tr>
            @endif

            @if( $data->getFuelType->title )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                    <td class="text-break text-center py-2">
                        {{ $data->getFuelType->title ?? 'Yox' }}
                    </td>
                </tr>
            @endif

            @if( $data->getCondition )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                    <td class="text-break text-center py-2">
                        {{ $data->getCondition->title ?? 'Yox' }}
                    </td>
                </tr>
            @endif

            @if( $data->texpassport )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                    <td class="text-break text-center text-uppercase py-2 flash__texpass">
                        {{ $data->texpassport }}
                    </td>
                </tr>
            @endif

            @if( $data->image )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                    <td class="text-break text-center py-2">
                        <img class="flash__image"
                             src="{{
                            asset('/images/users/announcement/orders/'.$data->image)
                         }}" alt="{{ $data->image }}">
                    </td>
                </tr>
            @endif

            @if( $data->note )
                <tr>
                    <td scope="row" class="text-right text-black-50 py-2">Əlavə məlumat:</td>
                    <td class="text-break text-center py-2">
                        {{ $data->note }}
                    </td>
                </tr>
            @endif
        </table>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>

            @if( auth()->check() && auth()->user()->status == 2 )
                @isset( $disabled )
                    <button class="btn btn-secondary" disabled="disabled"
                            data-target="#answer-{{ $data->id }}">
                        Cavab
                    </button>
                @else
                    <a href="" class="btn btn-success" data-toggle="modal"
                       data-target="#answer-{{ $data->id }}">
                        Cavab
                    </a>
                @endisset
            @endif
        </div>
    </div>
@endisset
