<!-- Button trigger modal -->
{{--<a href="" class="" data-toggle="modal" data-target="#send_all-{{ $order->id }}">--}}
{{--    {{ $order->spare_parts ?? 'Yox' }}--}}
{{--</a>--}}

<!-- Modal -->
<div class="modal fade" id="answer" tabindex="-1" aria-labelledby="send_all" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-sm">
        <div class="modal-content answer__modal-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">
                <div class="d-inline-flex mt-2 mb-2">
                    <div class="col-7 mb-3 pr-1">
                        <label for="which">Orginal?</label>
                        <select class="custom-select" id="which" required>
                            <option selected disabled value="">Seçin...</option>
                            <option>Orijinal</option>
                            <option>Pod orijinal</option>
                            <option>Kopya</option>
                        </select>
                        <div class="invalid-tooltip">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-5 mb-3 pl-1">
                        <label for="price">Qiymət</label>
                        <input type="text" class="form-control" id="price" placeholder="AZE" required>
                        <div class="invalid-tooltip">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>

                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Xeyir</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Göndər</button>
                </div>
            </div>
        </div>
    </div>
</div>
