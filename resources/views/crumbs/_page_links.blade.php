

<div class="col-lg-12 mb-lg-0 m-sm-0 p-sm-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            @if( request()->getHost() !== 'avtolavka' )
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="">{{ $link }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $link }}</li>
            @endif
        </ol>
    </nav>
</div>
