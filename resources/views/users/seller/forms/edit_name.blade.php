<tr>
    <td class="border-0">
        @error('name')
            <div class="alert alert-danger text-center mb-4">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group mb-4">
            @csrf()

            <div class="col-lg-8 col-md-8 col-sm-11 form-group m-auto">
                <label for="name" class="letter__spacing">Adı</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? Auth::user()->name }}"
                       class="form-control mb-4 @error('name') is-invalid @enderror">
            </div>

            <div class="col-lg-8 col-md-8 col-sm-11 form-group m-auto pl-0">
                <button class="btn btn-success ml-3">
                    <span class="letter__spacing">Bəli</span>
                </button>

                <a href="{{ route('seller.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                    <span class="letter__spacing">Xeyir</span>
                </a>
            </div>
        </form>
    </td>
</tr>
