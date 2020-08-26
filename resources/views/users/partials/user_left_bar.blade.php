

<table class="mx-xl-auto mx-lg-auto text-md-left text-sm-left">
        <tbody class="d-lg-block d-md-inline-flex d-sm-inline-flex">
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route("seller.profile", ['id' => Auth::user()->id]) }}" class="d-lg-block
                             {{ str_contains(request()->path(), 'incoming') ?
                                'text-black-50' : ''
                             }}">
                         Profil
                    </a>
                </td>
            </tr>
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route('incoming') }}" class="d-lg-block
                            {{ str_contains(request()->path(), 'incoming') ?
                               'text-black-50' : ''
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
                                            'text-black-50' : '' }}">
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
