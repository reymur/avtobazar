
<div class="">
    @if( getUserLeftBarAnswerCount() > 0 )
        <a href="{{ route('answers') }}" class="text-info">
            Cavab:
            <span class="badge badge-success">
                {{ getUserLeftBarAnswerCount() }}
            </span>
        </a>
    @else
        Cavab:
        <span class="badge badge-danger p-2">
            Gözlənilir...
        </span>
    @endif
</div>
