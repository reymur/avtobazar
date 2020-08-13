@extends('layouts.app')

@section('content')
<div class="container-lg container-xl">
    <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
        <!-- Crumbs _page_links -->
        @include('crumbs._page_links', ['link' => 'Home'])

        <div class="col-lg-12 col-md-12 col-sm-12 mb-lg-4 mb-md-5 mb-sm-5 text-center d-inline-flex">
            <span class="col-lg-6 col-md-6 col-sm-7 px-sm-0 text-uppercase mr-lg-1 mr-sm-0 title__text">
                <span class="">BÜTÜN Modellər ÜZRƏ</span>
                <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
            </span>

            <!-- Modal -->
            @include('modals.announcement')
        </div>

        <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            @if( count($cars) )
                @foreach($cars as $car)
                    <div class="col-lg-4  col-md-4 col-sm-6 mb-3 border-bottom">
                        <a href="{{ route('model',['name' => $car->title]) }}">
                            <table class="d-inline-flex pb-1">
                                <thead>
                                    <th>
                                        <img class="avto__small_logo mr-4"
                                             src="{{ asset('images/cars/image/'. $car->image) }}" alt="Logo">
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="">
                                                <span class="row avto__small_text">
                                                    {{ $car->name }}
                                                </span>
                                                <span class="row mt-n2">
                                                    12323
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- All cars -->
</div>
@endsection
