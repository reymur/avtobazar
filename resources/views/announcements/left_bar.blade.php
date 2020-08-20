
<div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-md-2 mb-sm-2">
    <table class="mx-xl-auto mx-lg-auto text-md-left text-sm-left">
        <tbody class="d-lg-block d-md-inline-flex d-sm-inline-flex">
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route('incoming') }}" class="d-lg-block
                        {{ str_contains(request()->path(), 'incoming') ?
                           'text-black-50' : ''
                        }}">
                        Gələnlər
                        <span class="badge badge-success">2</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                    <a href="{{ route('send') }}" class="d-lg-block">
                        <span class="{{ str_contains(request()->path(), 'sends') ?
                                        'text-black-50' : '' }}">
                            Göndərilənlər
                        </span>
                        <span class="badge badge-success">2</span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
