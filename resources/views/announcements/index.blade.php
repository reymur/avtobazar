@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        @include('crumbs._page_links',['link' => 'Elanlar'])

        <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
            @include('announcements.left_bar', ['sends' => $sends])

            <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0">
                <div class="col-12 p-md-2 p-sm-0 flash__bg">
                    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                        @isset( $announce )
                            <div class="row mb-3 ml-1">
                                <div class="">
                                    Elan göndərildi:
                                    <span class="mx-2 text-black-50">
                                        {{ Illuminate\Support\Carbon::now()->diffForHumans($announce->created_at) }}
                                    </span>

                                    <span class="badge badge-success p-1">2 Mağaza</span>
                                    |
                                    <span class="badge badge-success p-1">2 Ölüxana</span>
                                </div>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <div class="">
                                    Cavab: <span class="badge badge-danger p-1">Gözlənilir</span>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                @if( $announce->spare_parts )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Ehtiyat hissəsi:</td>
                                        <td class="text-break text-center">{{ $announce->spare_parts }}</td>
                                    </tr>
                                @endif

                                @if( $announce->marka )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Marka:</td>
                                        <td class="text-break text-center">{{ $announce->marka }}</td>
                                    </tr>
                                @endif

                                @if( $announce->model )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Model:</td>
                                        <td class="text-break text-center">{{ $announce->model }}</td>
                                    </tr>
                                @endif

                                @if( $announce->year )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Buraxılış:</td>
                                        <td class="text-break text-center">{{ $announce->year }}</td>
                                    </tr>
                                @endif

                                @if( $announce->motor )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Motor:</td>
                                        <td class="text-break text-center">{{ $announce->motor }}</td>
                                    </tr>
                                @endif

                                @if( $announce->texpassport )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Texpassport:</td>
                                        <td class="text-break text-center">{{ $announce->texpassport }}</td>
                                    </tr>
                                @endif

                                @if( $announce->store )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Göndərildi:</td>
                                        <td class="text-break text-center">{{ $announce->store }}</td>
                                    </tr>
                                @endif

                                @if( $announce->condition )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Vəziyyəti:</td>
                                        <td class="text-break text-center">{{ $announce->condition }}</td>
                                    </tr>
                                @endif

                                @if( $announce->city )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Şəhər:</td>
                                        <td class="text-break text-center">{{ $announce->city }}</td>
                                    </tr>
                                @endif

                                @if( $announce->image )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Şəkil:</td>
                                        <td class="text-break text-center">
                                            <img class="flash__image" src="{{ asset('/images/announcement/'.$announce->image) }}" alt="Image">
                                        </td>
                                    </tr>
                                @endif

                                @if( $announce->note )
                                    <tr>
                                        <td scope="row" class="text-right text-black-50">Əlavə məlumat:</td>
                                        <td class="text-break text-center">{{ $announce->note }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


