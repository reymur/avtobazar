<tr>
    <th class="border-0">Marka:</th>

    <td class="text-left border-0">
        @error('marka')
            <div class="alert alert-danger mb-3">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post" class="form-group mb-4">
            @csrf()

            <ul class="p-0">
                @foreach( $cars as $car )
                    @if( getUserCarTypes($car->name, Auth::user()->sellerTypes) )
                        <li class="col-lg-5 col-md-6 col-sm-6 d-inline-flex">
                            <input type="checkbox" checked name="marka[]" value="{{ $car->name }}" id="car-{{ $car->id }}" class="col-1 form-control">
                            <label for="car-{{ $car->id }}" class="ml-1 pt-2 pl-1">{{ $car->name }}</label>
                        </li>
                    @else
                        <li class="col-lg-5 col-md-6 col-sm-6 d-inline-flex">
                            <input type="checkbox" name="marka[]" value="{{ $car->name }}" id="car-{{ $car->id }}" class="col-1 form-control">
                            <label for="car-{{ $car->id }}" class="ml-1 pt-2 pl-1">{{ $car->name }}</label>
                        </li>
                    @endif
                @endforeach
            </ul>
{{--            {{ Auth::user()->sellerTypes }}--}}

            <div class="col-7 text-right">
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
