

<table class="mx-xl-auto mx-lg-auto text-md-left text-sm-left">
        <tbody class="d-lg-block d-md-inline-flex d-sm-inline-flex">
            <tr>
                <td class="text-left pb-xl-3 pb-lg-3 p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route("buyer.profile", ['id' => Auth::user()->id]) }}"
                             class="d-lg-block border-bottom border-info text-decoration-none
                                    btn-outline-light
                             {{ str_contains(request()->path(), 'profile') ?
                                'text-black-50 border-bottom border-dark' : ''
                             }}">
                        Profil
                    </a>
                </td>
            </tr>
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route("seller.profile", ['id' => Auth::user()->id]) }}" class="d-lg-block
                                 {{ str_contains(request()->path(), 'incoming') ?
                                    'text-black-50 border-bottom border-dark' : ''
                                 }}">
                        Ümumi
                        <span class="badge badge-success">2</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route('incoming') }}" class="d-lg-block
                            {{ str_contains(request()->path(), 'incoming') ?
                               'text-black-50 border-bottom border-dark' : ''
                            }}">
                        Sifarişlər
                        <span class="badge badge-success">2</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route('send') }}" class="d-lg-block">
                            <span class="{{ str_contains(request()->path(), 'sends') ?
                                            'text-black-50 border-bottom border-dark' : '' }}">
                                Cavablar
                            </span>
                        <span class="badge badge-success">2</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="text-left p-xl-1 p-lg-1 pt-md-0 pt-sm-0">
                    @include('modals.saller_modal')
                </td>
            </tr>
        </tbody>
    </table>
