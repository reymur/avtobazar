<tr>
    <th>Şəhar:</th>

    <td class="text-left pl-0">
        @error('city')
        <div class="alert alert-danger mb-3">
            {{ $message }}
        </div>
        @enderror

        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group d-flex mb-4">
            @csrf()
            <select name="city" class="col-6 form-control pl-3">
                @foreach( $cities as $city )
                    @if( $city->city == Auth::user()->city )
                        <option selected value="{{ $city->city }}">{{ $city->city }}</option>
                    @else
                        <option value="{{ $city->city }}">{{ $city->city }}</option>
                    @endif
                @endforeach
            </select>
            {{--            {{ Auth::user()->sellerTypes }}--}}

            <div class="col-5 text-right pl-0">
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
