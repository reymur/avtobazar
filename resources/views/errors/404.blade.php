@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="d-inline-flex mt-5">
            <h2>"{{ request()->name }}"</h2> &nbsp; <h3><span class="text-danger">modeli tapılmadı!!!</span></h3>
        </div>
    </div>
@endsection
