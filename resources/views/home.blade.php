@extends('layouts.app')

@section('content')
<div class="container-lg container-xl">
    <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
        <!-- Crumbs _page_links -->
        @include('crumbs._page_links', ['links' => ['Home']])

        <div class="col-lg-12 col-md-12 col-sm-12 mb-lg-4 mb-md-3 mb-sm-4 text-center d-inline-flex">
            <span class="col-lg-6 col-md-6 col-sm-7 px-sm-0 text-uppercase mr-lg-1 mr-sm-0 title__text">
                <span class="">BÜTÜN MARKALAR ÜZRƏ</span>
            </span>

            <!-- Modal -->
            @include('modals.announcement')
        </div>

        <div class="row col-lg-12 col-md-12 col-sm-12 col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            @if( count($cars) )
                @foreach($cars as $car)
                    <div class="col-lg-4  col-md-4 col-sm-6 mb-3 border-bottom">
                        <table class="d-inline-flex pb-1">
                                <thead>
                                    <th>
                                        <img class="avto__small_logo mr-4"
                                             src="{{ asset('images/cars/image/'. $car->title) }}" alt="Logo">
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
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- All cars -->
</div>
@endsection
