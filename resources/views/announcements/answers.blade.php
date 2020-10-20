@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')

        <answers
            :answers_all="{{ $answers_all }}"
            :auth_user="{{ Auth::user()  }}"
            :auth_check="{{ Auth::check()  }}"
            :auth_user_get_sends="{{ Auth::user()->getSends }}"
            :orders="{{ getUserLeftBarOrderCount()[0] }}"
            :new_orders="{{ getUserLeftBarOrderCount()[1] }}"
        ></answers>
    </div>
@endsection
