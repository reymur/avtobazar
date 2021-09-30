@extends('layouts.app')

@section('content')
    <div class="col-12 px-md-0 px-sm-0">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')
        @include('modals.spare_parts_find', ['title' => 'MODELLƏR'])

        <answers
            :answers_all="{{ getUserLeftBarAnswerCount() }}"
            :auth_user="{{ Auth::user()  }}"
            :auth_check="{{ Auth::check()  }}"
            :auth_user_get_sends="{{ Auth::user()->getSends }}"
            :orders="{{ getUserLeftBarOrderCount()[0] }}"
            :new_orders="{{ getUserLeftBarOrderCount()[1] }}"
        ></answers>
    </div>
@endsection
