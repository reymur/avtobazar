<!-- Button trigger modal -->
{{--<a href="" class="p-1" data-toggle="modal" data-target="#show_all_sellers-{{ $seller->id }}">--}}

{{--</a>--}}

<!-- Modal -->
<div class="modal fade z__index-1" id="show-{{ $seller->id }}{{ $answer->id }}" tabindex="-1" aria-labelledby="show-{{ $seller->id }}{{ $answer->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content show__sellers-answers">
            <div class="modal-header">
                <h5 class="modal-title" id="show-{{ $seller->id }}{{ $answer->id }}">
                    <span class="mr-0">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </span>
                    <span class="letter__spacing">{{ $seller->name }}</span>
                    <span class="letter__spacing">({{ $seller->phone }})</span>
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">

                <show-all-answer-sellers-answers-show-table
                    :answer_id="{{ $answer->id }}"
                    :seller_id="{{ $seller->id }}"
                >
                </show-all-answer-sellers-answers-show-table>

                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Bağla</button>
                </div>
            </div>
        </div>
    </div>
</div>


