<tr>
    <td class="border-0">
        @error('phone')
            <div class="alert alert-danger text-center mb-4">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('buyer-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group mb-4">
            @csrf()

            <div class="col-lg-6 col-md-6 col-sm-10 form-group m-auto">
                <label for="phonenumber">Telefon nömrəsi:</label>
                <input type="text" name="phone"
                       @if(Auth::user()->phone) value="{{ Auth::user()->phone  }}" @endif
                       id="phonenumber"
                       class="form-control mb-4 text-uppercase @error('phone_number') is-invalid @enderror"
                       placeholder="Telefon nömrəniz">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-10 form-group m-auto pl-0">
                <button class="btn btn-success ml-3">
                    <span class="letter__spacing">Bəli</span>
                </button>

                <a href="{{ route('buyer.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                    <span class="letter__spacing">Xeyir</span>
                </a>
            </div>
        </form>
    </td>
</tr>
