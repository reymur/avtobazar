<tr>
    <td class="">
        @if( session()->get('old_pass') )
            <div class="alert alert-danger text-center mb-4">
                {{ session()->get('old_pass') }}
            </div>
        @endif

        @error('old_pass')
            <div class="alert alert-danger text-center">
                {{ changePasswordErrorMessage($message, 'old pass', 'Köhnə Parol') }}
            </div>
        @enderror
        @error('new_pass')
            <div class="alert alert-danger text-center mb-4">
                {{ changePasswordErrorMessage($message, 'new pass', 'Yeni Parol') }}
            </div>
        @enderror

        <form action="{{ route('buyer-edit',['id'=>Auth::user()->id, 'slug'=>$slug]) }}" method="post"
              class="form-group mb-4">
            @csrf()

            <div class="col-lg-8 col-md-8 col-sm-11 form-group m-auto">
                <label for="old-pass">Köhnə Parol:</label>
                <input type="password" name="old_pass" id="old-pass"
                       placeholder="Köhnə Parol-u qeyd edin"
                       class="mb-3 form-control @error('new_pass') is-invalid @enderror" >
            </div>

            <div class="col-lg-8 col-md-8 col-sm-11 form-group m-auto">
                <label for="new-pass">Yeni Parol:</label>
                <input type="password" name="new_pass" id="new-pass"
                       placeholder="Yeni Parol-u qeyd edin"
                       class="form-control mb-4 @error('new_pass') is-invalid @enderror">
            </div>

            <div class="col-lg-8 col-md-8 col-sm-11 m-auto form-group mt-4">
                <button class="btn btn-success ">
                    <span class="letter__spacing">Bəli</span>
                </button>

                <a href="{{ route('buyer.profile', ['id'=>Auth::user()->id]) }}" class="btn btn-secondary ml-2">
                    <span class="letter__spacing">Xeyir</span>
                </a>
            </div>
        </form>
    </td>
</tr>
