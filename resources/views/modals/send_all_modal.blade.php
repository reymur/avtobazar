<!-- Button trigger modal -->
<a href="" class="" data-toggle="modal" data-target="#send_all-{{ $announce->id }}">
    {{ $announce->spare_parts ?? 'Yox' }}
</a>

<!-- Modal -->
<div class="modal fade" id="send_all-{{ $announce->id }}" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="send_all-{{ $announce->id }}">
                    @if( isset($announce->created_at) )
                        <span class="mr-0">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </span>
                        <span class="letter__spacing">{{ $announce->created_at }}</span>
                    @else
                        Yox
                    @endif
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">
                <table class="table table-bordered">
                    <tbody>
{{--                        @if( $announce->created_at )--}}
{{--                            <div class="mr-3 mx-2 text-right text-black-50">--}}
{{--                                <span>--}}
{{--                                    {{ $announce->created_at }}--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        @endif--}}

                        @if( $announce->spare_parts )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Ehtiyat hissəsi:</td>
                                <td class="text-break text-center py-2">{{ $announce->spare_parts }}</td>
                            </tr>
                        @endif

                        @if( $announce->condition )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                                <td class="text-break text-center py-2">{{ $condition->title ?? 'Yox' }}</td>
                            </tr>
                        @endif

                        @if( $announce->marka )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Marka:</td>
                                <td class="text-break text-center py-2">{{ $announce->marka }}</td>
                            </tr>
                        @endif

                        @if( $announce->model )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                                <td class="text-break text-center py-2">{{ $announce->model }}</td>
                            </tr>
                        @endif

                        @if( $announce->year )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                                <td class="text-break text-center py-2">{{ $announce->year }}</td>
                            </tr>
                        @endif

                        @if( $announce->motor )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Motor:</td>
                                <td class="text-break text-center py-2">{{ $announce->motor }}</td>
                            </tr>
                        @endif

                        @if( $announce->texpassport )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                                <td class="text-break text-center text-uppercase py-2 flash__texpass">{{ $announce->texpassport }}</td>
                            </tr>
                        @endif

                        @if( $announce->city )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Şəhər:</td>
                                <td class="text-break text-center py-2">{{ $announce->city }}</td>
                            </tr>
                        @endif

                        @if( $announce->image )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                                <td class="text-break text-center py-2">
                                    <img class="flash__image" src="{{ asset('/images/users/announcement/'.$announce->image) }}" alt="Image">
                                </td>
                            </tr>
                        @endif

                        @if( $announce->note )
                            <tr>
                                <td scope="row" class="text-right text-black-50 py-2">Əlavə məlumat:</td>
                                <td class="text-break text-center py-2">{{ $announce->note }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                </div>
            </div>
        </div>
    </div>
</div>
