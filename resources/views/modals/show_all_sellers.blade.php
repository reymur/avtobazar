<!-- Button trigger modal -->
<a href="" class=" p-1" data-toggle="modal" data-target="#show_all_sellers-{{ $announce->id }}">
    Göndərildi

    @if( isset($announce->user) && $announce->user->count() )
        <span class="badge badge-secondary">
            {{ $announce->user->count() }}
        </span>
    @else
        0
    @endif
</a>

<!-- Modal -->
<div class="modal fade" id="show_all_sellers-{{ $announce->id }}" tabindex="-1" aria-labelledby="show_all_sellers" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-inline-flex">
                    <h5 class="modal-title mr-2" id="show_all_sellers-{{ $announce->id }}">
                        <span class="letter__spacing">Göndərildi:</span>
                    </h5>
                    <div class="d-inline-flex mt-1">
                        @if( (getMorgCount($announce->user) > 0) && (getStoreCount($announce->user) > 0) )
                            <div class="sernd__store_bg-color">{{ getStoreCount($announce->user) }} mağaza</div>
                            <span class="px-1">/</span>
                            <div class="sernd__morg_bg-color mr-1">{{ getMorgCount($announce->user) }} ölüxana</div>
                        @elseif( getStoreCount($announce->user) > 0 )
                            <div class="sernd__store_bg-color">{{ getStoreCount($announce->user) }} mağaza</div>
                        @elseif( getMorgCount($announce->user) > 0 )
                            <div class="sernd__morg_bg-color mr-1">{{ getMorgCount($announce->user) }} ölüxana</div>
                        @endif
                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">
                <table class="table table-bordered">
                    <tbody>
                        @foreach( $announce->user as $seller )
                            <tr>
                                <td class="py-2 @if($seller->who == 1) store__bg @else morg__bg @endif">
                                    <a href="/seller/seller-store/{{ $seller->id }}" target="_blank" class="col-12 d-inline-flex pr-1">
                                        <div class="col-2 text-left">
                                            @if( $seller->image )
                                                <img
                                                    src="{{ asset('/images/users/sellers/'. 'small_'.$seller->image ) }}"
                                                    alt=""
                                                    class="show__seller-image">
                                            @else
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                            @endif
                                        </div>

                                        <div class="col-10 text-left pl-0 send__user-name-size text-capitalize mt-2">

                                            {{ $seller->name }}

{{--                                            @if( $seller->who == 1 )--}}
{{--                                                <span class="text-center store__subtitle">--}}
{{--                                                    AAAAAA--}}
{{--                                                </span>--}}
{{--                                            @elseif( $seller->who == 2 )--}}
{{--                                                <span class="text-center morg__subtitle">--}}
{{--                                                    AAAAAA--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
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
