<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body class="flash__bg">
        <div class="col-12 p-md-2 p-sm-0 flash__bg">
            <div class="col-lg-8 col-md-12 col-sm-12 mx-auto mt-lg-4 py-4 bg-white flash__shadow">
                @isset( $announce )
                    <div class="mb-3">
                        Elan göndərildi:
                            <span class="badge badge-success">2 Mağaza</span>
                        |
                            <span class="badge badge-success">2 Ölüxana</span>
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

        <script ></script>
    </body>
</html>
