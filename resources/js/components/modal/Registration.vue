<template>
    <div class="modal fade" id="staticBackdrop"
         data-backdrop="static" data-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <!--MainCloseElement-->
                    <button type="button" class="close pt-4" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pt-2">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <form>
                                <div class="form-group ml-3">
                                    <div class="form-check form-check-inline">
                                        <input v-model="radio" @change="radioListener" class="form-check-input" type="radio"
                                                id="inlineRadio1" value="buyer" checked>
                                        <label class="form-check-label" for="inlineRadio1">Alıcı</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="radio" @change="radioListener" class="form-check-input" type="radio"
                                               id="inlineRadio2" value="saller">
                                        <label class="form-check-label" for="inlineRadio2">Satıcı</label>
                                    </div>
                                </div>

                                <div class="col-12 mb-1">
                                    <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                                        <ul v-for="error in errors" class="alert-danger my-1">
                                            <li class="py-2" v-if="error.name"> {{ error.name[0] }}</li>
                                            <li class="py-2" v-if="error.email"> {{ error.email[0] }}</li>
                                            <li class="py-2" v-if="error.address"> {{ error.address[0] }}</li>
                                            <li class="py-2" v-if="error.password"> {{ error.password[0] }}</li>
                                        </ul>
                                    </div>
                                </div><!--End Errors -->

                                <div v-if="radio === 'buyer'" class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text p-1">
                                                <img src="images/cars/registerNumbers/number.png" alt="" class="register__number-size ">
                                            </div>
                                        </div>
                                        <input v-model="autoNumber" type="text" class="form-control text-uppercase"
                                               id="autoNumber" placeholder="Avtomobilin nömrəsini qeyd edin">
                                    </div>

                                    <div class="col-12 input-group p-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text px-3">
                                                Şifrə
                                            </div>
                                        </div>
                                        <input v-model="password" type="password" class="form-control"
                                               id="passPuyer" placeholder="şifrəni yaz">
                                    </div>
                                </div>

                                <div v-if="radio === 'saller'" class="form-group">
                                    <div class="col-12 d-xs-inline-flex d-lg-inline-flex">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text px-2">
                                                    Növü
                                                </div>
                                            </div>
                                            <select v-model="type" class="custom-select" id="type" required>
                                                <option :value="1">Mağaza</option>
                                                <option :value="2">Ölüxana</option>
                                            </select>
                                        </div>

                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text px-1">
                                                    Adı
                                                </div>
                                            </div>
                                            <input v-model="name" type="text" class="form-control"
                                                   id="name" placeholder="Yerin adı">
                                        </div>
                                    </div>

                                    <div class="col-12 d-xs-inline-flex d-lg-inline-flex">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text pl-2 pr-1">
                                                    Şəhər
                                                </div>
                                            </div>
                                            <select v-model="city" class="custom-select" id="email" required>
                                                <option :value="1">Bakı</option>
                                            </select>
                                        </div>

                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text px-1">
                                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-at" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input v-model="email" type="text" class="form-control" id="city" placeholder="Email"
                                                   tabindex="0" data-toggle="tooltip" data-placement="left"
                                                   title="Email ünavanını dəqiq olmalıdır çünki: ŞİFRƏ-niz Email ünvaniniza göndəriıəcək.">
                                        </div>
                                    </div>

                                    <div class="col-12 d-xs-inline-flex d-lg-inline-flex">
                                        <div class="col-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text px-2">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input v-model="address" type="text" class="form-control" id="address" placeholder="Ünvanı dəqiq yazın">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="col-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text px-3">
                                                    Şifrə
                                                </div>
                                            </div>
                                            <input v-model="password" type="password" class="form-control"
                                                   id="pass" placeholder="şifrəni yaz">
                                        </div>

                                        <div class="col-12 input-group p-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text px-2">
                                                    Şifrə təstiqi
                                                </div>
                                            </div>
                                            <input v-model="password_confirmation" type="password" class="form-control"
                                                   id="pass_confirm" placeholder="şifrəni təkrar yaz">
                                        </div>
                                    </div>

                                    <div class="col-12 ml-1 mt-1">
                                        <div class="custom-file col-3 p-2">
                                            <input @change="fileSelect" type="file" value="file" class="custom-file-input" id="file">
                                            <label class="custom-file-label pt-2 pl-2" for="file" data-browse="Şəkil">
                                                <span class="p-0 border-0 input-group-text bg-transparent">
                                                    <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                      <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                                    </svg>
                                                </span>
                                            </label>
                                        </div><!-- End Image Button -->

                                        <div v-if="imageLoader" class="card col-lg-6 col-md-6 col-sm-11 mt-2 mb-3 modal__image" style="width: 18rem;">
                                            <img :src="img" id="img" class="imageId card-img-top" alt="Image">
                                        </div><!-- End Image Show -->
                                    </div>
                                </div>

                                <div class="modal-footer p-0 mr-2">
                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal">Xeyir</button>
                                    <button @click="inputControlAndSend" type="button" id="save" class="btn btn-primary">Göndər</button>
                                </div><!-- End Göndər button -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "registration",
    data(){
        return {
            radio: 'buyer',
            autoNumber: '',
            type: 1,
            name: '',
            email: '',
            city: 1,
            address: '',
            password: '',
            password_confirmation: '',
            img: null,
            image: null,
            imageLoader: false,
            errors: [],
            status: 1,

        }
    },
    methods: {
        inputControlAndSend(){
            this.errors = [];
            this.autoNumber = this.autoNumber.trim();
            this.name = this.name.trim();
            this.address = this.address.trim();
            this.password = this.password.trim();
            this.password_confirmation = this.password_confirmation.trim();

            if( this.radio === 'buyer' ) {
                if( this.autoNumber === '' ||
                    this.autoNumber.length == 0 )
                {
                    // this.errors.push('Avtomobilin nömrəsini qeyd edin!')
                    document.getElementById('autoNumber').classList.add('border-danger');
                }else{
                    document.getElementById('autoNumber').classList.remove('border-danger');
                }

                if( this.password === '' ||
                    this.password.length == 0 )
                {
                    // this.errors.push(' Şifrəni yazmaq vacibdir!')
                    document.getElementById('passPuyer').classList.add('border-danger');
                }else{
                    document.getElementById('passPuyer').classList.remove('border-danger');
                }

                this.status = 1;

            }else if( this.radio === 'saller' ) {
                if( this.name === '' || this.name.length == 0 ) {
                    document.getElementById('name').classList.add('border-danger');
                }else{
                    document.getElementById('name').classList.remove('border-danger');
                }
                if( this.address === '' || this.address.length == 0 ) {
                    document.getElementById('address').classList.add('border-danger');
                }else{
                    document.getElementById('address').classList.remove('border-danger');
                }
                if( this.password === '' || this.password.length == 0 ) {
                    document.getElementById('pass').classList.add('border-danger');
                }else{
                    document.getElementById('pass').classList.remove('border-danger');
                }

                this.status = 2;
            }

            if( ! this.errors.length ) {
                return this.sendData();
            }
        },
        sendData(){
            if( this.status == 1 ) {
                axios.post('/register', {
                    name: this.autoNumber,
                    password: this.password,
                    status: this.status
                }).then(res => {
                    if( res.status == 201 ){
                        window.location.href = '/announce/sends'
                    }
                    console.log(res.status)
                })
                .catch(err => {
                    if(err.response.data.errors){
                        this.errors.push(err.response.data.errors)
                        console.log( this.errors )
                    }
                })
            }

            if( this.status == 2 ) {
                let formData = new FormData();
                formData.append('type',this.type);
                formData.append('name',this.name);
                formData.append('email',this.email);
                formData.append('city',this.city);
                formData.append('address',this.address);
                formData.append('password',this.password);
                formData.append('password_confirmation',this.password_confirmation);
                formData.append('image',this.image);
                formData.append('status',this.status);
                axios.post('/register', formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                    if( res.status == 201 ){
                        window.location.href = '/announce/sends'
                    }
                    console.log(res.status)
                })
                .catch(err => {
                    if(err.response.data.errors){
                        this.errors.push(err.response.data.errors)
                        console.log( this.errors )
                    }
                })
            }
        },
        fileSelect(e){
            const file = (e.target.files || e.dataTransfer.files)[0];
            if( file ) {
                let reader = new FileReader();
                this.imageLoader = true;

                reader.onload = (e) => {this.img = e.target.result}
                reader.readAsDataURL(file);

                return this.image = file;
            }
            console.log( e )
        },
        radioListener(){
            this.errors = [];
        }
    },
    mounted(){
        // Selected buyer for first
        // this.radio = 'buyer'
    }
}
</script>

<style scoped>

</style>
