
<div class="pl-5">
    @if( !is_null(getUserLeftBarAnswerCount()) && getUserLeftBarAnswerCount()->count() > 0 )
        @if( getUserLeftBarAnswerCount()->first()->seen )
            <a href="{{ route('answers') }}" class="text-dark">
                Cavab:
                <span class="badge badge-secondary">
                    {{ getUserLeftBarAnswerCount()->count() }}
                </span>
            </a>
        @else
            <a href="{{ route('answers') }}" class="text-dark">
                Cavab:
                <span class="badge badge-success">
                    {{ getUserLeftBarAnswerCount()->count() }}
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
