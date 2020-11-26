<tr>
    <th>Növü:</th>

    <td class="text-left">
        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group d-flex mb-4">
            @csrf()

            <select name="who" class="col-8 form-control @error('who') is-invalid @enderror">
                @foreach($whos as $who)
                    @if( $who->who == Auth::user()->whos->who )
                        <option selected value="{{ $who->id }}">{{ $who->who }}</option>
                    @else
                        <option value="{{ $who->id }}">{{ $who->who }}</option>
                    @endif
                @endforeach
            </select>

            <button class="btn btn-success ml-3">
                <span class="letter__spacing">Bəli</span>
            </button>

            <a href="{{ route('seller.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                <span class="letter__spacing">Xeyir</span>
            </a>
        </form>

        @error('who')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </td>
</tr>
