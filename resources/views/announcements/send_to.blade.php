@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            @include('announcements.left_bar')

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0">
                <div class="col-12 p-md-2 p-sm-0 flash__bg">
                    @if( isset($sellers) && $sellers->count() > 0 )
                        <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                            <table class="table table-bordered">
                            <tbody>
                                @foreach( $sellers as $seller )
                                    <tr>
                                        <td class="py-2">
                                            <a href="" class="col-12 d-inline-flex pr-1">
                                                <div class="text-left mt-2">
                                                    {{ $seller->name }}
                                                </div>
                                                <div class="text-right ml-auto">
                                                    @if( $seller->image )
                                                        <img
                                                            src="{{ asset('images/users/sellers/id_'. $seller->id .'/'. $seller->image ) }}"
                                                            alt=""
                                                            class="show__seller-image">
                                                    @else
                                                        <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                            <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


