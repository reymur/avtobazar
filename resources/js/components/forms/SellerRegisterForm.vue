<template>
    <div class="">
        <div class="col-12 mb-1">
            <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                <ul class="alert-danger py-2 my-1">
                    <li v-for="error in errors" class="py-2" v-if="error.name"> {{ error.name[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.marka"> {{ error.marka[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.email"> {{ error.email[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.phone"> {{ error.phone[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.address"> {{ error.address[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.password"> {{ error.password[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.password_confirmation"> {{ error.password_confirmation[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.image"> {{ error.image[0] }}</li>
                </ul>
            </div>
        </div><!--End Errors -->

        <div class="col-12">
            <div class="col-12 input-group p-1">
                <div class="input-group-prepend">
                    <div class="input-group-text px-1">
                        <img src="images/users/logo/saller_marka_logo.jpg" alt="Logo">
                    </div>
                </div>
                <v-select id="marka" class="marka" taggable multiple
                          v-model="marka" label="country"
                          placeholder="Ehtiyyat hissələrini satdığınız markanı seçin"
                          :options="car">
                </v-select>
            </div>
        </div>

        <div class="col-12 d-xs-inline-flex d-lg-inline-flex">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 input-group p-1">
                <div class="input-group-prepend">
                    <div class="input-group-text px-2">
                        Növü
                    </div>
                </div>
                <select v-model="who" class="custom-select" id="who" required>
                    <option v-if="whos.length" v-for="whoItem in whos" :value="whoItem.id">
                        {{ whoItem.who }}
                    </option>
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
                <select v-model="city" class="custom-select" id="city" required>
                    <option v-if="cities.length" v-for="city in cities" :value="city.city">
                        {{ city.city }}
                    </option>
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
                <input v-model="email" type="email" class="form-control" id="email" placeholder="Email"
                       tabindex="0" data-toggle="tooltip" data-placement="left"
                       title="Email ünavanını dəqiq olmalıdır çünki: ŞİFRƏ-niz Email ünvaniniza göndəriıəcək.">
            </div>
        </div>

        <div class="col-12 d-xs-inline-flex d-lg-inline-flex py-1 pr-0">
            <div class="col-12 input-group p-1">
                <div class="input-group-prepend">
                    <div class="input-group-text px-2">
                        <svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                        </svg>
                    </div>
                </div>

                <vue-phone-number-input
                    default-country-code="AZ"
                    valid-color="green"
                    error-color="red"
                    class="col-11 pl-0 pr-1"
                    id="phone" v-model="phone"/>
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
                       id="password" placeholder="şifrəni yaz">
            </div>

            <div class="col-12 input-group p-1">
                <div class="input-group-prepend">
                    <div class="input-group-text px-2">
                        Şifrə təstiqi
                    </div>
                </div>
                <input v-model="password_confirmation" type="password" class="form-control"
                       id="password_confirmation" placeholder="şifrəni təkrar yaz">
            </div>
        </div>

        <div class="col-12 ml-1 mt-1">
            <div class="custom-file col-4 p-2">
                <input @change="fileSelect" type="file" value="file" class="custom-file-input" id="file">
                <label class="custom-file-label pt-2 pl-2" for="file" data-browse="Şəkil">
                    <span class="mt-1 ml-2 p-0 border-0 input-group-text bg-transparent">
                        <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                        </svg>
                    </span>
                </label>
            </div><!-- End Image Button -->

            <div v-if="imageLoader">
                <div id="img-remove"  class="col-lg-6 col-md-6 col-sm-11 mt-2 m-auto">
                    <div @click="imageRemove()" class="text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                    <div class="card mt-2 m-auto modal__regiser modal__image">
                        <img :src="img" id="img" class="imageId card-img-top" alt="Image">
                    </div>
                </div>
            </div><!-- End Image Show -->
        </div>

        <div class="modal-footer pt-2 pb-0 pr-0 mr-0">
            <button @click="sendSellerData" type="button" id="send" class="btn btn-primary">
                <span v-if="sendLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span v-if="sendLoader">Gözlə...</span>
                <span v-else>Göndər</span>
            </button>
        </div><!-- End Göndər button -->
    </div>
</template>

<script>
export default {
    name: "sellerregisterform",
    props: [
        'whos','cars','cities',
        'ignoredCountries','errorClearForSellerRegister'
    ],
    data(){
        return {
            name: '',
            email: '',
            phone: '',
            city: '',
            address: '',
            password: '',
            password_confirmation: '',
            img: null,
            image: null,
            imageLoader: false,
            errors: [],
            who: null,
            whoValue: null,
            status: 1,
            disable: 'disabled',
            marka: [],
            car: [],
            sendLoader: false,
            inputIdNames: [
                'vs1__combobox','email','phone','name',
                'address','password','password_confirmation'
            ],
        }
    },
    watch: {
        errorClearForSellerRegister: function(){
            this.errors = []
            this.inputIdNames.forEach(id => {
                this.dangerBorderRemove(id)
            })
        }
    },
    methods: {
        imageRemove(){
            this.image = null
            this.img = null

            document.getElementById('img-remove').remove()
        },
        setWhosValue(){
            if( this.whos.length ){
                return this.who = this.whos[0].id;
            }
        },
        setCitiesValue(){
            if( this.cities.length ){
                this.city = this.cities[7].city
            }
        },
        getCarNames(){
            this.cars.forEach((val) => {
                this.car.push( val.name )
            })
        },
        inputControlAndSend(){
            if( this.radio === 'buyer' ) {
                this.errors = [];
                return this.sendBuyerData();
            }
        },
        sendSellerData(){
            let formData = new FormData();
            formData.append('who',this.who);
            formData.append('status',2);
            formData.append('name',this.name.trim());
            formData.append('email',this.email.trim());
            formData.append('phone',this.phone.trim());
            formData.append('city',this.city.trim());
            formData.append('address',this.address.trim());
            formData.append('password',this.password.trim());
            formData.append('password_confirmation', this.password_confirmation.trim());
            formData.append('image',this.image);
            formData.append('marka',this.marka);

            this.addDisabled('disabled','disabled');
            this.sendLoader = true;

            axios.post('/register', formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(res => {
                if( res.status == 201 ){
                    window.location.href = '/seller/profile/'+ res.data.user.id
                    this.sendLoader = false;
                    this.inputIdNames.forEach(id => {
                        this.dangerBorderRemove(id)
                    })
                    console.log('res - ', res.data.data.id)
                }
                console.log('res - ', res.data)
            })
            .catch(err => {
                this.errors = [];

                if(err.response){
                    this.errors.push(err.response.data.errors)
                    this.sendLoader = false;
                    this.image = null;
                    this.removeDisabled('disabled');
                    console.log('ERR1 - ', err.response )
                }
                if(err.response){
                    this.errors.push(err.response.data.message)
                    this.sendLoader = false;
                    this.removeDisabled('disabled');
                    console.log('ERR2 - ', err.response)
                }

                if(  this.errors.length ) {
                    // For Seller Start
                    for(let i=0; i < this.errors.length; i++ ) {
                        if (this.errors[i]['marka']) {
                            this.dangerBorderAdd('vs1__combobox');
                            break;
                        }else {
                            this.dangerBorderRemove('vs1__combobox')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['email'] ) {
                            this.dangerBorderAdd('email');
                            break;
                        }else {
                            this.dangerBorderRemove('email')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['phone'] ) {
                            this.dangerBorderAdd('phone')
                            break;
                        }else {
                            this.dangerBorderRemove('phone')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['name'] ) {
                            this.dangerBorderAdd('name')
                            break;
                        }else {
                            this.dangerBorderRemove('name')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['address'] ) {
                            this.dangerBorderAdd('address')
                            break;
                        }else {
                            this.dangerBorderRemove('address')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['password'] ) {
                            this.dangerBorderAdd('password')
                            this.dangerBorderAdd('password_confirmation')
                            break;
                        }else {
                            this.dangerBorderRemove('password')
                            this.dangerBorderRemove('password_confirmation')
                        }
                    }
                    // For Seller End
                }
            });
        },
        ifIdExists(id){
            if( document.getElementById(id) ){
                return true;
            }
            return false;
        },
        ifDangerBorderExists(id){
            if( document.getElementById(id).classList.contains('border-danger') ){
                return true;
            }
            return false;
        },
        addDisabled(val, key){
            if( document.getElementById('send') ) {
                document.getElementById('send').setAttribute(val, key);
            }
        },
        removeDisabled(val){
            if( document.getElementById('send') ) {
                document.getElementById('send').removeAttribute(val);
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
        },
        dangerBorderAdd(id){
            if ( this.ifIdExists(id) ) {
                document.getElementById(id).classList.add('border-danger')
            }
        },
        dangerBorderRemove(id){
            if ( this.ifDangerBorderExists(id) ) {
                document.getElementById(id).classList.remove('border-danger')
            }
        },
    },
    mounted(){
        this.getCarNames()
        this.setWhosValue()
        this.setCitiesValue()
        // Selected buyer for first
        // this.radio = 'buyer'
    }
}
</script>
