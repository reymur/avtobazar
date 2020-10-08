<!-- Button trigger modal -->
{{--<a href="" class="" data-toggle="modal" data-target="#send_all-{{ $order->id }}">--}}
{{--    {{ $order->spare_parts ?? 'Yox' }}--}}
{{--</a>--}}

<!-- Modal -->
<div class="modal fade" id="answer" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-sm">
        @if( $order )
            <order-answer-modal
                :order_id="{{ $order->id }}"></order-answer-modal>
        @endif
    </div>
</div>
