@extends('layouts.app')

@section('content')
    <div class="container-lg container-xl">
        <div class="col-lg-12 mb-3 m-sm-0 p-sm-0 m-md-0 p-md-0">
            <!-- Crumbs _page_links -->
            @include('crumbs._page_links', ['link' => 'Home'])

            <div class="col-lg-12 mb-3 mt-2 m-sm-0 p-sm-0 d-inline-flex">
                <div class="col-lg-6 col-md-6  pr-lg-0 text-center">
                    <p class="text-uppercase title__text">
                        <strong>"{{ $type->title ?? 'Model' }}"</strong> üzrə
                        <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </p>
                </div>

                @include('modals.announcement')
            </div>

            <div class="container-lg p-lg-3 p-sm-0 mt-4">
                <div class="row">
                    <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">ffffffffffffffffff</div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                <form action="">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Texpasport</span>
                                        </div>
                                        <input type="text" aria-label="First name"
                                               class="form-control" placeholder="Yeni ehtiyat hissəlari üçün">
                                    </div>

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Buraxılış</span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Motor</span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control">
                                    </div>

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Qiymət</span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control" placeholder="min AZN">
                                        <input type="text" aria-label="Last name" class="form-control" placeholder="max AZN">

                                        <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent">
                                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-camera-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                      <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                </span>
                                        </div>
                                        <div class="custom-file col-2">
                                            <input type="file" class="custom-file" id="inputGroupFile04">
                                            <label class="custom-file-label" for="inputGroupFile04"></label>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
