
<div class="col-lg-1 col-md-1 mb-lg-2 col-sm-5 pl-0 m-sm-0 p-sm-0 m-md-0 p-md-0 text-left">
{{--    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-reply mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--        <path fill-rule="evenodd" d="M9.502 5.013a.144.144 0 0 0-.202.134V6.3a.5.5 0 0 1-.5.5c-.667 0-2.013.005-3.3.822-.984.624-1.99 1.76-2.595 3.876C3.925 10.515 5.09 9.982 6.11 9.7a8.741 8.741 0 0 1 1.921-.306 7.403 7.403 0 0 1 .798.008h.013l.005.001h.001L8.8 9.9l.05-.498a.5.5 0 0 1 .45.498v1.153c0 .108.11.176.202.134l3.984-2.933a.494.494 0 0 1 .042-.028.147.147 0 0 0 0-.252.494.494 0 0 1-.042-.028L9.502 5.013zM8.3 10.386a7.745 7.745 0 0 0-1.923.277c-1.326.368-2.896 1.201-3.94 3.08a.5.5 0 0 1-.933-.305c.464-3.71 1.886-5.662 3.46-6.66 1.245-.79 2.527-.942 3.336-.971v-.66a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.667z"/>--}}
{{--    </svg>--}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success button__to d-inline-flex" data-toggle="modal" data-target="#staticBackdrop">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-share" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.724 3.947l-7 3.5-.448-.894 7-3.5.448.894zm-.448 9l-7-3.5.448-.894 7 3.5-.448.894z"/>
            <path fill-rule="evenodd" d="M13.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm-11-6.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg>
        <span class="d-block ml-2">
            TAP
        </span>
    </button>

    @if( Auth::check() )
        <!-- Modal -->
        <Index
            :user="{{ Auth::user() }}"
            :cars="{{ $cars }}"
            :types="{{ $types }}"
            :cities="{{ $cities }}"
            :years="{{ $years }}"
            :motors="{{ $motors }}"
            :fuelTypes="{{ $fuel_types }}"
        ></Index>
    @else
        <!-- Registration -->
        <register
            :whos="{{ $who }}"
            :cars="{{ $cars }}"
            :cities="{{ $cities }}"
        ></register>
    @endif
</div>

