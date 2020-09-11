@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrasiya') }}</div>

                <div class="card-body pb-2">
                    <register-not-modal
                        :whos="{{ $who }}"
                        :cars="{{ $cars }}"
                        :cities="{{ $cities }}"
                    ></register-not-modal>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
