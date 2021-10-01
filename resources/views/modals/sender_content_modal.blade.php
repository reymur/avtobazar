<!-- Button trigger modal -->
<a href="" class="" data-toggle="modal" data-target="#send_all-{{ $announce->id }}">
    {{ $announce->spare_parts ?? 'Yox' }}
</a>

<!-- Modal -->
<div class="modal fade" id="send_all-{{ $announce->id }}" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            @include('partials.show_modal_content',[ 'data' => $announce, 'disabled' => 1 ])
            <!--Show modal details-->

        </div>
    </div>
</div>
