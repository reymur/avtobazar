<tr>
    <td class="border-0">
        <form action="{{ route('seller-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post"
              class="form-group mb-4">
            @csrf()

            <div class="col-lg-8 col-md-8 col-sm-6 m-auto form-group">
                <label for="who" class="letter__spacing">Növü</label>
                <select name="who" id="whos" class="form-control mb-4 @error('who') is-invalid @enderror">
                    @foreach($whos as $who)
                        @if( $who->who == Auth::user()->whos->who )
                            <option selected value="{{ $who->id }}">{{ $who->who }}</option>
                        @else
                            <option value="{{ $who->id }}">{{ $who->who }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-6 m-auto pl-0 form-group">
                <button class="btn btn-success ml-3">
                    <span class="letter__spacing">Bəli</span>
                </button>

                <a href="{{ route('seller.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                    <span class="letter__spacing">Xeyir</span>
                </a>
            </div>
        </form>

        @error('who')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </td>
</tr>
