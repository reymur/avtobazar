<tr>
    <th>Adı:</th>

    <td class="text-left">
        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group d-flex mb-4">
            @csrf()

            <input type="text" name="name" value="{{ Auth::user()->name }}"
                   class="col-8 form-control @error('name') is-invalid @enderror">

            <button class="btn btn-success ml-3">
                <span class="letter__spacing">Bəli</span>
            </button>

            <a href="{{ route('seller.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                <span class="letter__spacing">Xeyir</span>
            </a>
        </form>

        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </td>
</tr>
