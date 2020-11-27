<tr>
    <td class="border-0">
        @error('city')
        <div class="alert alert-danger mb-3">
            {{ $message }}
        </div>
        @enderror

        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post"
              class="form-group mb-4">
            @csrf()

            <div class="col-lg-6 col-md-8 col-sm-6 m-auto form-group">
                <label for="city" class="letter__spacing">Şəhər</label>
                <select name="city" id="city" class="form-control mb-4">
                    @foreach( $cities as $city )
                        @if( $city->city == Auth::user()->city )
                            <option selected value="{{ $city->city }}">{{ $city->city }}</option>
                        @else
                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 col-md-8 col-sm-6 m-auto pl-0 form-group">
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
