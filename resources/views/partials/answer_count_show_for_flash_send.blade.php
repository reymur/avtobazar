
<div class="pl-5">
    @if( !empty($announce_answer) && $announce_answer->count() > 0 )
        @if( $announce_answer->first()->seen )
            <a href="{{ route('answers') }}" class="text-dark">
                Cavab:
                <span class="badge badge-secondary">
                    {{ $announce_answer->count() }}
                </span>
            </a>
        @else
            <a href="{{ route('answers') }}" class="text-dark">
                Cavab:
                <span class="badge badge-success">
                    {{ $announce_answer->count() }}
                </span>
            </a>
        @endif
    @else
        Cavab:
        <span class="badge badge-danger p-2">
            Gözlənilir...
        </span>
    @endif
</div>
