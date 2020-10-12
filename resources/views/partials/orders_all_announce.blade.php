
<table class="table border-top-0 border-bottom">
    <tbody>
        @if( isset($ordersPaginate) && ($ordersPaginate->count() > 0) )
            @foreach( $ordersPaginate as $order )
{{--                {{ dd( $order->announcement->getSellerAnswers ) }}--}}
                @if(    !is_null($order->announcement->getSellerAnswers) &&
                        $order->announcement->getSellerAnswers->count() > 0 &&
                        !is_null($order->announcement->getSellerAnswers->first()) &&
                        $order->announcement->getSellerAnswers->user_id === Auth::user()->id
                    )
                    <tr>
                        <td class="text-left send__all-td pt-2 pb-1 pb-0">
                            <div class="d-block">
                                @include('modals.orders_all_modal', ['disabled' => 1])
                            </div>
                        </td>
                        <td class="text-right send__all-td pt-2 pb-1 pb-0 pr-0">
                            <div class="d-block">
                                <span class="badge badge-light">
                                    <svg width="1.9em" height="1.9em" viewBox="0 0 16 16" class="bi bi-check2-all text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M12.354 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                      <path d="M6.25 8.043l-.896-.897a.5.5 0 1 0-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 0 0 .708 0l7-7a.5.5 0 0 0-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                                    </svg>
                                </span>
                            </div>
                        </td>
                        <td class="col-1 text-right pl-1 pt-1 pl-0">
                            <a href="{{ route('order_delete',['id' => $order->announcement->id]) }}" class="text-dark">
                                <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td class="text-left send__all-td pt-2 pb-1 pb-0">
                            <div class="d-block">
                                @include('modals.orders_all_modal')
                            </div>
                        </td>
                        <td class="text-right send__all-td pt-2 pb-1 pb-0 pr-0">
                            <div class="d-block">
                                <span class="badge badge-success">
                                    yeni
                                </span>
                            </div>
                        </td>
                        <td class="col-1 text-right  pt-1 pl-0">
                            <a href="{{ route('order_delete',['id' => $order->announcement_id]) }}" class="text-dark">
                                <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach

            @if( $ordersPaginate->links() )
                <tr>
                    <td class="text-left border-0 send__all-td pt-2 pb-0">
                        <div class="send__all-td pt-2 pb-0 d-block">
                            {{ $ordersPaginate->links() }}
                        </div>
                    </td>
                </tr>
            @endif
        @endif
    </tbody>
</table>
