

<div class="col-lg-12 mb-lg-2 m-sm-0 p-sm-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($links as $link)
                @if( count($links) != (count($links) - 2) )
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="">{{ $link  }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $link  }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>
