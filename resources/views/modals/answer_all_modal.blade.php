<!-- Button trigger modal -->
<a href="" class="" data-toggle="modal" data-target="#send_all-{{ $answer->id }}">
    {{ $answer->spare_parts ?? 'Yox' }}
</a>

<!-- Modal -->
<div class="modal fade" id="send_all-{{ $answer->id }}" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="send_all-{{ $answer->id }}">
                    @if( isset($answer->spare_parts) )
                        <span class="mr-0">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </span>
                        <span class="text-uppercase letter__spacing">{{ $answer->spare_parts }}</span>
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
                    @if( $answer->created_at )
                        <div class="mr-3 mx-2 text-right text-black-50">
                                <span>
                                    {{ Illuminate\Support\Carbon::now()->diffForHumans($answer->created_at) }}
                                </span>
                        </div>
                    @endif

                    @if( $answer->spare_parts )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Ehtiyat hissəsi:</td>
                            <td class="text-break text-center py-2">{{ $answer->spare_parts }}</td>
                        </tr>
                    @endif

                    @if( $answer->condition )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                            <td class="text-break text-center py-2">{{ $answer->title ?? 'Yox' }}</td>
                        </tr>
                    @endif

                    @if( $answer->marka )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Marka:</td>
                            <td class="text-break text-center py-2">{{ $answer->marka }}</td>
                        </tr>
                    @endif

                    @if( $answer->model )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                            <td class="text-break text-center py-2">{{ $answer->model }}</td>
                        </tr>
                    @endif

                    @if( $answer->year )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                            <td class="text-break text-center py-2">{{ $answer->year }}</td>
                        </tr>
                    @endif

                    @if( $answer->motor )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Motor:</td>
                            <td class="text-break text-center py-2">{{ $answer->motor }}</td>
                        </tr>
                    @endif

                    @if( $answer->texpassport )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                            <td class="text-break text-center text-uppercase py-2 flash__texpass">{{ $answer->texpassport }}</td>
                        </tr>
                    @endif

                    @if( $answer->city )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Şəhər:</td>
                            <td class="text-break text-center py-2">{{ $answer->city }}</td>
                        </tr>
                    @endif

                    @if( $answer->image )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                            <td class="text-break text-center py-2">
                                <img class="flash__image" src="{{ asset('/images/users/announcement/'.$answer->image) }}" alt="Image">
                            </td>
                        </tr>
                    @endif

                    @if( $answer->note )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Əlavə məlumat:</td>
                            <td class="text-break text-center py-2">{{ $answer->note }}</td>
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
