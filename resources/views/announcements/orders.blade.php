@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')

        <orders
            :orders="{{ $orders }}"
            :new_orders="{{ getUserLeftBarOrderCount()[1] }}"
            :answers_all="{{ getUserLeftBarAnswerCount() }}"
            :auth_check="{{ auth()->check() }}"
            :auth_user="{{ auth()->user() }}"
            :auth_user_status="{{ auth()->user()->status }}"
            :auth_user_get_sends="{{ Auth::user()->getSends }}"
        ></orders>
    </div>
@endsection
