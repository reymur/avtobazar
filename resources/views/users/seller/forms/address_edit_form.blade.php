<tr>
    <td class="border-0">
        @error('address')
            <div class="alert alert-danger text-center mb-4">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post"
              class="form-group mb-4">
            @csrf()

            <div class="col-lg-8 col-md-8 col-sm-6 m-auto form-group">
                <label for="address" class="letter__spacing">Ünvan</label>
                <input type="text" id="address" name="address" value="{{ Auth::user()->address }}"
                       class="form-control mb-4 @error('address') is-invalid @enderror">
            </div>

            <div class="col-lg-8 col-md-8 col-sm-6 m-auto form-group pl-0">
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
