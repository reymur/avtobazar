<tr>
    <td class="border-0">
        <form action="{{ route('buyer-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group mb-4">
            @csrf()

            <div class="col-lg-6 col-md-6 col-sm-8 form-group m-auto">
                <label for="marka" class="letter__spacing">Marka</label>
                <select name="marka" id="marka" class="form-control pl-3 mb-4">
                    @foreach( $cars as $car )
                        @if( $car->name == Auth::user()->marka )
                            <option selected value="{{ $car->name }}">{{ $car->name }}</option>
                        @else
                            <option value="{{ $car->name }}">{{ $car->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-8 form-group m-auto pl-0">
                <button class="btn btn-success ml-3">
                    <span class="letter__spacing">Bəli</span>
                </button>

                <a href="{{ route('buyer.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                    <span class="letter__spacing">Xeyir</span>
                </a>
            </div>
        </form>

        @error('marka')
            <div class="alert alert-danger mt-3">
                {{ $message }}
            </div>
        @enderror
    </td>
</tr>
