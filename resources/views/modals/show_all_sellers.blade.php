<!-- Button trigger modal -->
<a href="" class="badge badge-success p-1" data-toggle="modal" data-target="#show_all_sellers-{{ $announce->id }}">
    Göndərildi {{ count($announce->user) ?? 0 }}
</a>

<!-- Modal -->
<div class="modal fade" id="show_all_sellers-{{ $announce->id }}" tabindex="-1" aria-labelledby="show_all_sellers" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show_all_sellers-{{ $announce->id }}">
                    <span class="mr-0">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </span>
                    <span class="text-uppercase letter__spacing">Göndərildi</span>
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">
                <table class="table table-bordered">
                    <tbody>
                        @foreach( $announce->user as $seller )
                            <tr>
                                <td class="py-2">
                                    <a href="" class="col-12 d-inline-flex pr-1">
                                        <div class="text-left mt-2">
                                            {{ $seller->name }}
                                        </div>
                                        <div class="text-right ml-auto">
                                            @if( $seller->image )
                                                <img
                                                    src="{{ asset('images/users/sellers/id_'. $seller->id .'/'. $seller->image ) }}"
                                                    alt=""
                                                    class="show__seller-image">
                                            @else
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                            @endif
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                </div>
            </div>
        </div>
    </div>
</div>
