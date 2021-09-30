@extends('layouts.app')

@section('content')
    @include('crumbs._page_links', ['link' => 'Home'])

    @include('partials.announcement_panel')

    @include('modals.spare_parts_find')

    <div class="col-lg-12 col-md-12 col-sm-12 p-md-0 p-sm-0 m-auto">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1 mx-auto py-lg-2 p-md-0 p-sm-0 d-flex castom__height sale__left-info">
            <div class="m-sm-auto m-md-auto">
                @isset($user)
                    @if( is_array($user) )
                        <table class="table m-0">
                            <tbody>
                            <tr>
                                @foreach($user as $key => $val)
                                    @if($key === 'name')
                                        <th class="text-muted">
                                            <h4>{{ $val }}</h4>
                                        </th>
                                    @endif
                                    @if($key === 'tel')
                                        <td>
                                            <div class="text__bold">
                                                <a href="{{$key}}:" class="m-0">
                                                    <h4 class="m-0">{{ $val }}</h4>
                                                </a>
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    @endif
                @endisset
            </div>
        </div>

        <!--sale_announcements_show-->
        @include('crumbs._sale_announcements_show',[
                    'title' => 'İstifadəçinin bütün elanları'
                ])
    </div>
@endsection
