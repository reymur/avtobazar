<!-- Button trigger modal -->
@isset( $disabled )
    <a href="" class="text-secondary" data-toggle="modal" disabled="disabled" data-target="#send_all-{{ $order->announcement->id }}">
        {{ $order->announcement->spare_parts ?? 'Yox' }}
    </a>
@else
    <a href="" class="text-primary" data-toggle="modal" disabled="disabled" data-target="#send_all-{{ $order->announcement->id }}">
        {{ $order->announcement->spare_parts ?? 'Yox' }}
    </a>
@endisset
<!-- Modal -->
<div class="modal fade" id="send_all-{{ $order->announcement->id }}" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if( isset($order->announcement->getSender->name) || isset($order->announcement->getSender->autoNumber) )
                    <h5 class="modal-title" id="send_all-{{ $order->announcement->id }}">
                        <span class="mr-0">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </span>
                        <span class="text-uppercase letter__spacing">
                            {{
                                $order->announcement->getSender->name ??
                                $order->announcement->getSender->autoNumber
                            }}
                        </span>
                    </h5>

                    <span class="px-3"></span>

                    <span class="pt-1">
                        {{ $order->announcement->created_at ?? '' }}
                    </span>

                    <span class="px-3"></span>

                    <span class="pt-1">
                        {{ $order->announcement->city }}
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
                    <tbody>
                    @if( $order->announcement->spare_parts )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Ehtiyat hissəsi:</td>
                            <td class="text-break text-center py-2 letter__spacing">{{ $order->announcement->spare_parts }}</td>
                        </tr>
                    @endif

                    @if( $order->announcement->marka && $order->announcement->model )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                            <td class="text-break text-center py-2">
                                {{ $order->announcement->marka ?? 'Yox' }}
                                /
                                {{ $order->announcement->model ?? 'Yox' }}
                                /
                                {{ $order->announcement->motor ?? 'Yox' }}
                                /
                                {{ $order->announcement->year ?? 'Yox' }}
                                /
                                {{ $order->announcement->getFuelType->title ?? 'Yox' }}
                            </td>
                        </tr>
                    @endif

                    @if( $order->announcement->getCondition )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                            <td class="text-break text-center py-2">{{ $order->announcement->getCondition->title ?? 'Yox' }}</td>
                        </tr>
                    @endif

                    @if( $order->announcement->texpassport )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                            <td class="text-break text-center text-uppercase py-2 flash__texpass">{{ $order->announcement->texpassport }}</td>
                        </tr>
                    @endif

                    @if( $order->announcement->image )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                            <td class="text-break text-center py-2">
                                <img class="flash__image" src="{{ asset('/images/users/announcement/orders/'.$order->announcement->image) }}" alt="Image">
                            </td>
                        </tr>
                    @endif

                    @if( $order->announcement->note )
                        <tr>
                            <td scope="row" class="text-right text-black-50 py-2">Əlavə məlumat:</td>
                            <td class="text-break text-center py-2">{{ $order->announcement->note }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>

                    @isset( $disabled )
                        <button class="btn btn-secondary" disabled="disabled"
                           data-target="#answer-{{ $order->announcement->id }}">
                            Cavab
                        </button>
                    @else
                        <a href="" class="btn btn-success" data-toggle="modal"
                           data-target="#answer-{{ $order->announcement->id }}">
                            Cavab
                        </a>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

@if( $order->announcement )
    @include('modals.order_answer_modal',['order' => $order->announcement ])
@endif
