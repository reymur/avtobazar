{{--<!-- Button trigger modal -->--}}
{{--<a href="" class="p-1" data-toggle="modal" data-target="#show_all_sellers-{{ $answer->id }}">--}}
{{--    <span class="badge badge-success">--}}
{{--        {{ count($answer->getUserAnswers) ?? 0 }}--}}
{{--    </span>--}}
{{--     Cavab--}}
{{--</a>--}}

{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="show_all_sellers-{{ $answer->id }}" tabindex="-1" aria-labelledby="show_all_sellers-{{ $answer->id }}" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h6 class="modal-title" id="show_all_sellers-{{ $answer->id }}">--}}
{{--                    <span class="mr-0">--}}
{{--                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                          <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>--}}
{{--                        </svg>--}}
{{--                    </span>--}}
{{--                    <span class="text-uppercase letter__spacing">--}}
{{--                        <span class="">{{ count($answer->getUserAnswers) }}</span>--}}
{{--                        Cavab--}}
{{--                    </span>--}}
{{--                </h6>--}}

{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body pt-2 pb-1">--}}
{{--                <table class="table table-bordered">--}}
{{--                    <tbody>--}}
{{--                    {{ dd( $answer->getUserAnswers ) }}--}}
{{--                        @foreach( $answer->getUserAnswers as $seller )--}}
{{--                            {{ dd( $seller->user ) }}--}}
{{--                            <tr>--}}
{{--                                <td class="py-1 pr-0 d-flex">--}}
{{--                                    <div class="col-5 text-left pl-1 mt-2">--}}
{{--                                        <a href="" class="pb-2 answer__seller">--}}
{{--                                            <span class="d-flex pl-2">--}}
{{--                                                {{ $seller->user->name }}--}}
{{--                                            </span>--}}
{{--                                        </a>--}}

{{--                                        <div class="d-flex answer__phone-div">--}}
{{--                                            <a href="tel:{{ $seller->user->phone }}" class="answer__phone-a">--}}
{{--                                                <span class="pr-1">--}}
{{--                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-forward-fill text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                      <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}

{{--                                                {{ $seller->user->phone }}--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-7 text-right ml-auto pr-0">--}}
{{--                                        {{ dd( $answer->id ) }}--}}
{{--                                        <show-all-answer-sellers-answers-show-table--}}
{{--                                            :answer_id="{{ $answer->id }}"--}}
{{--                                            :seller_id="{{ $seller->user->id }}"--}}
{{--                                        >--}}
{{--                                        </show-all-answer-sellers-answers-show-table>--}}
{{--                                            @if( $seller->image )--}}
{{--                                                <img--}}
{{--                                                    src="{{ asset('images/users/sellers/id_'. $seller->id .'/'. $seller->image ) }}"--}}
{{--                                                    alt=""--}}
{{--                                                    class="show__seller-image">--}}
{{--                                            @else--}}
{{--                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>--}}
{{--                                                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>--}}
{{--                                                </svg>--}}
{{--                                            @endif--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}

{{--                            @include('modals.show_all_answer_sellers_answers')--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}

{{--                <div class="modal-footer py-1">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@foreach( $answer->user as $seller )--}}
{{--    @include('modals.show_all_answer_sellers_answers')--}}
{{--@endforeach--}}
