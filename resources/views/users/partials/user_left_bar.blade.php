
{{--{{ dd( $ordersNullCount ) }}--}}
<table class="mx-xl-auto mx-lg-auto text-md-left text-sm-left">
        <tbody class="d-lg-block d-md-inline-flex d-sm-inline-flex">
            <tr>
                <td class="text-left pb-xl-3 pb-lg-3 p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">
                    @if( Auth::user()->status == 1 )
                        <a href="{{ route("buyer.profile", ['id' => Auth::user()->id]) }}"
                                 class="d-lg-block border-bottom text-decoration-none px-2
                                 {{ str_contains(request()->path(), 'profile') ?
                                    'text-dark border-bottom border-dark text-decoration-none' : 'text-black-50'
                                 }}">

                            <span class="letter__spacing"> Profil </span>
                        </a>
                    @endif

                    @if( Auth::user()->status == 2 )
                        <a href="{{ route("seller.profile", ['id' => Auth::user()->id]) }}"
                           class="d-lg-block border-bottom text-decoration-none px-2
                             {{ str_contains(request()->path(), 'profile') ?
                                'text-dark border-bottom border-dark text-decoration-none' : 'text-black-50'
                             }}">

                            <span class="letter__spacing"> Profil </span>
                        </a>
                    @endif
                </td>
            </tr>
            @if( Auth::check() && Auth::user()->status == 2 )
                <tr>
                    <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">
                        <a href="{{ route('orders') }}" class="d-lg-block
                                {{ str_contains(request()->path(), 'orders') ?
                                   'text-black-50 border-bottom border-dark text-decoration-none' : ''
                                }}">
                            @if( Auth::check() )
                                @if( getUserLeftBarOrderCount() !== null && count(getUserLeftBarOrderCount()) > 0 )
                                    @if( getUserLeftBarOrderCount()[1] > 0 )
                                        Sifarişlər
                                            <span class="badge badge-success">
                                                {{ getUserLeftBarOrderCount()[1] }}
                                            </span>
                                    @else
                                        Sifarişlər
                                        <span class="badge badge-secondary">
                                            {{ getUserLeftBarOrderCount()[0] }}
                                        </span>
                                    @endif
                                @endisset
                            @endif
                        </a>
                    </td>
                </tr>
            @endif

{{--            <tr>--}}
{{--                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">--}}
{{--                    <a href="{{ route("buyer.profile", ['id' => Auth::user()->id]) }}"--}}
{{--                       class="d-lg-block">--}}

{{--                        Ümumi <span class="badge badge-success">2</span>--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--            </tr>--}}

            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route('send') }}" class="d-lg-block
                        {{ str_contains(request()->path(), 'sends') ?
                            'text-black-50 border-bottom border-dark text-decoration-none' : ''
                        }}">
                        @if( Auth::check() )
                            @if( isset(Auth::user()->getSends) && Auth::user()->getSends->count() > 0 )
                                Göndərilənlər
                                <span class="badge badge-success">
                                    {{ Auth::user()->getSends->count() }}
                                </span>
                            @else
                                Göndərilənlər
                                <span class="badge badge-secondary">
                                    0
                                </span>
                            @endif
                        @endif
                    </a>
                </td>
            </tr>

            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">
                    <a href="{{ route('answers') }}" class="d-lg-block
                        {{ str_contains(request()->path(), 'answers') ?
                            'text-black-50 border-bottom border-dark text-decoration-none' : ''
                        }}">
                        Cavablar
                        @if( getUserLeftBarAnswerCount() != 0 )
                            <span class="badge badge-success">
                                {{ getUserLeftBarAnswerCount() }}
                            </span>
                        @else
                            <span class="badge badge-secondary">
                                0
                            </span>
                        @endif
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
