
<form action="">
    <div class="input-group is-invalid mb-2">

        <div class="input-group-prepend">
            <label class="input-group-text" for="validatedInputGroupSelect">Buraxılış</label>
        </div>
        <select class="custom-select" id="validatedInputGroupSelect" required>
            @isset( $years )
                @foreach($years as $year)
                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                @endforeach
            @else
                <option value="2020">2020</option>
            @endisset
        </select><!-- End Years -->

        <div class="input-group-prepend">
            <label class="input-group-text" for="validatedInputGroupSelect">Motor</label>
        </div>
        <select class="custom-select" id="validatedInputGroupSelect" required>
            @isset( $motors )
                @foreach($motors as $motor)
                    <option value="{{ $motor->motor }}">{{ $motor->motor }}</option>
                @endforeach
            @else
                <option value="2020">3000</option>
            @endisset
        </select><!-- End Motor -->
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text">Qiymət</span>
        </div>
        <input type="text" aria-label="First name" class="form-control" placeholder="min AZN">
        <input type="text" aria-label="Last name" class="form-control" placeholder="max AZN">

        <div class="custom-file col-3 p-2">
            <input type="file" class="custom-file-input" id="customFileLangHTML">
            <label class="custom-file-label pt-2 pl-2" for="customFileLangHTML" data-browse="Şəkil">
                <span class="p-0 border-0 input-group-text bg-transparent">
                    <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill pl-1 mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                      <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                    </svg>
                </span>
            </label>
        </div>
    </div>

    <div class="form-group mb-2 d-inline-flex">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="new" value="">
            <label class="form-check-label" for="new">Yeni</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="old" value="">
            <label class="form-check-label" for="old">İşlənmiş</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="all" value="">
            <label class="form-check-label" for="all">Fərqi yoxdu</label>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ətraflı məlumat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"
                  placeholder="Satıcının sizi anlanması üçün məlumatı dəqiq və konkret yazın"></textarea>
    </div>
</form>
