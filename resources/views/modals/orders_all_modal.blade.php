<!-- Button trigger modal -->
<a href="" class="" data-toggle="modal" data-target="#send_all-{{ $order->id }}">
    {{ $order->spare_parts ?? 'Yox' }}
</a>

<!-- Modal -->
<div class="modal fade" id="send_all-{{ $order->id }}" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="send_all-{{ $order->id }}">
                    @if( isset($order->getSender->name) || isset($order->getSender->autoNumber) )
                        <span class="mr-0">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </span>
                        <span class="text-uppercase letter__spacing">{{
                            $order->getSender->name ?? $order->getSender->autoNumber
                        }}</span>
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
                    @if( $order->created_at )
                        <div class="mr-3 mx-2 text-right text-black-50">
                            <span>
                                {{ $order->city }}
                            </span>
                            <span class="px-3"></span>
                            <span>
                                {{ Illuminate\Support\Carbon::now()->diffForHumans($order->created_at) }}
                            </span>
                        </div>
                    @endif

                    @if( $order->spare_parts )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Ehtiyat hissəsi:</td>
                            <td class="text-break text-center py-2 letter__spacing">{{ $order->spare_parts }}</td>
                        </tr>
                    @endif

                    @if( $order->marka )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Marka:</td>
                            <td class="text-break text-center py-2">{{ $order->marka }}</td>
                        </tr>
                    @endif

                    @if( $order->model )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                            <td class="text-break text-center py-2">{{ $order->model }}</td>
                        </tr>
                    @endif

                    @if( $order->motor )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Motor:</td>
                            <td class="text-break text-center py-2">{{ $order->motor }}</td>
                        </tr>
                    @endif

                    @if( $order->year )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                            <td class="text-break text-center py-2">{{ $order->year }}</td>
                        </tr>
                    @endif

                    @if( $order->getFuelType->title )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                            <td class="text-break text-center py-2">{{ $order->getFuelType->title }}</td>
                        </tr>
                    @endif

                    @if( $order->getCondition )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                            <td class="text-break text-center py-2">{{ $order->getCondition->title ?? 'Yox' }}</td>
                        </tr>
                    @endif

                    @if( $order->texpassport )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                            <td class="text-break text-center text-uppercase py-2 flash__texpass">{{ $order->texpassport }}</td>
                        </tr>
                    @endif

                    @if( $order->image )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                            <td class="text-break text-center py-2">
                                <img class="flash__image" src="{{ asset('/images/users/announcement/'.$order->image) }}" alt="Image">
                            </td>
                        </tr>
                    @endif

                    @if( $order->note )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Əlavə məlumat:</td>
                            <td class="text-break text-center py-2">{{ $order->note }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#answer">
                        Cavab
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@include('modals.order_answer_modal')
