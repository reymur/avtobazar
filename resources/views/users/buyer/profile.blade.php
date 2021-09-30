@extends('layouts.app')

@section('content')
    <div class="col-12 px-md-0 px-sm-0">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        @include('partials.announcement_panel')
        @include('modals.spare_parts_find',['title' => 'MODELLƏR'])

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
                @include('users.partials.user_left_bar')
            </div>

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0 pb-3 flash__bg border-left border-white">
                <div class="col-12 pt-3 pl-lg-4 ml-lg-5 mt-lg-2 mb-lg-3 pl-md-4 pb-md-1 pb-sm-1 pl-sm-4">
                    @isset( $user )
                        <h5 class="ml-2 text-uppercase">{{ $user->phone ?? "Adsız" }}</h5>
                    @else
                        <h5>Adsız</h5>
                    @endisset
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-3 bg-white flash__shadow">
                    <div class="col-12">
                        @isset( $user )
                            @if( session()->get('message') )
                                <div class="text-center">
                                    <div class="alert alert-success letter__spacing">
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                            @endif

                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th>Status:</th>
                                    <td class="text-left">
                                        {{ $user->statusName->status ?? 'Yox' }}
                                    </td>
                                    <td class="text-right">
{{--                                        <a href="">--}}
                                            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" disabled="disabled" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                                <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                                <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                            </svg>
{{--                                        </a>--}}
                                    </td>
                                </tr>
                                    <tr>
                                        <th>Marka:</th>
                                        <td class="text-left">
                                            {{ $user->marka ?? 'Yox' }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('buyer-show', ['user'=>$user, 'slug'=>'marka']) }}">
                                                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                                    <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                                    <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Telefon nömrəsi:</th>
                                        <td class="text-left text-uppercase letter__spacing">
                                            {{ $user->phone ?? 'Yox' }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('buyer-show', ['user'=>$user, 'slug'=>'phone']) }}">
                                                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                                    <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                                    <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Parol:</th>
                                        <td class="text-left text-danger letter__spacing">
                                            "Parol"-u redakte et
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('buyer-show', ['user'=>$user, 'slug'=>'password']) }}">
                                                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                                    <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                                    <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endisset

{{--                        <div class="">--}}
{{--                            <a href="{{ redirect()->back() }}">Geri</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
