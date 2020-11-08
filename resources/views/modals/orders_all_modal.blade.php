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

            @include('partials.show_modal_details',['data' => $order->announcement])
            <!--Show modal details-->

        </div>
    </div>
</div>

@if( $order->announcement )
    @include('modals.order_answer_modal',['order' => $order->announcement ])
@endif
