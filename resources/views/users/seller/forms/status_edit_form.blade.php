<tr>
    <th>Status:</th>

    <td class="text-left">
        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group d-flex mb-4">
            @csrf()

            <select name="status" class="col-8 form-control @error('status') is-invalid @enderror">
                <option value="{{ Auth::user()->status }}">
                    {{ Auth::user()->statusName->status }}
                </option>

                @foreach( $statuses as $status )
                    @if( $status->status != Auth::user()->statusName->status )
                        <option value="{{ $status->id }}">
                            {{ $status->status }}
                        </option>
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

        @error('status')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </td>
</tr>
