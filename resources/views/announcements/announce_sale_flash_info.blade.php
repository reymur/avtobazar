@extends('layouts.app')

@section('content')
    <div class="">
        @isset( request()->pin )
            <sale-flash-info
                pin="{{ request()->pin }}"
                number="{{ request()->number }}"
            ></sale-flash-info>
        @endisset
    </div>
@endsection
