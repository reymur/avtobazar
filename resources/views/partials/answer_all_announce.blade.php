
<table class="table border-top-0 border-bottom">
    <thead>
        <th> Adı </th>
        <th class="text-right"> Göndərilən yer </th>
    </thead>
    <tbody>
        @foreach( $answers_all as $answer )
{{--            {{ dd( $answer->user ) }}--}}
            @if( !is_null($answer->getUserAnswers) && count($answer->getUserAnswers) > 0 )
                <tr>
                    <td class="text-left send__all-td pt-1 pb-0">
                        <div class="d-block">
                            @include('modals.answer_all_modal')
                        </div>
                    </td>

                    <td class="text-right pt-1 pb-1 pr-1">
                        @if( isset($answer->user) && count($answer->user) > 0 )
                            @include('modals.show_all_answer_sellers')
                        @endif
                    </td>

                    <td class="col-1 text-right pt-1 pl-0">
                        <a href="{{ route('buyer_announce_delete',['id'=>$answer->id]) }}" class="text-dark">
                            <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
