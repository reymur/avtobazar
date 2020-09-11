<template>
    <div class="modal fade" id="staticBackdrop"
         data-backdrop="static" data-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <div class="register__title">
                        {{ title }}
                    </div>
                    <!--MainCloseElement-->
                    <button type="button" class="close pt-4" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pt-2 pb-1">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <form>
                                <div class="form-group mt-2 ml-3 mb-4">
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input v-model="radio" @change="radioListener" value="buyer"
                                                   type="radio" id="buyer" name="customRadio" class="custom-control-input">
                                            <label class="custom-control-label" for="buyer">Alıcı</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div v-model="radio" @change="radioListener" class="custom-control custom-radio">
                                            <input v-model="radio" @change="radioListener" value="saller"
                                                   type="radio" id="saller" name="customRadio" class="custom-control-input">
                                            <label class="custom-control-label" for="saller">Satıcı</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div v-model="registerLoade" class="custom-control custom-radio">
                                            <a href="#" @click="registerLoadFunc" class="register__check">
                                                <span v-if="registerLoade === 'login'" class="register__check-log">
                                                    Registrasiya?
                                                </span>
                                                <span v-else-if="registerLoade === 'register'" class="register__check-reg">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                      <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                    </svg>
                                                    Giriş?
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-1">
                                    <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                                        <ul class="alert-danger py-2 my-1">
                                            <li v-for="error in errors" class="py-2" v-if="error.name"> {{ error.name[0] }}</li>
                                            <li v-for="error in errors" class="py-2" v-if="error.marka"> {{ error.marka[0] }}</li>
                                            <li v-for="error in errors" class="py-2" v-if="error.email"> {{ error.email[0] }}</li>
                                            <li v-for="error in errors" class="py-2" v-if="error.address"> {{ error.address[0] }}</li>
                                            <li v-for="error in errors" class="py-2" v-if="error.password"> {{ error.password[0] }}</li>
                                            <li v-for="error in errors" class="py-2" v-if="error.password_confirmation"> {{ error.password_confirmation[0] }}</li>
                                            <li v-for="error in errors" class="py-2" v-if="error.image"> {{ error.image[0] }}</li>
                                        </ul>
                                    </div>
                                </div><!--End Errors -->

                                <div v-if="radio === 'buyer'" class="col-auto">
                                    <div v-if="registerLoade === 'login'" class="">
                                        <buyer-login-form :cars="cars"></buyer-login-form>
                                    </div>
                                    <div v-else-if="registerLoade == 'register'" class="">
                                        <buyer-register-form :cars="cars"></buyer-register-form>
                                    </div>
                                </div><!--Buyer End-->

                                <div v-if="radio === 'saller'" class="form-group">
                                    <div v-if="registerLoade === 'login'" class="">
                                        <seller-login-form></seller-login-form>
                                    </div>
                                    <div v-else-if="registerLoade == 'register'" class="">
                                        <seller-register-form
                                            :cars="cars"
                                            :whos="whos"
                                            :cities="cities"
                                        ></seller-register-form>
                                    </div>
                                </div><!--Seller End-->
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
    props: ['whos','cars','cities'],
    data(){
        return {
            title: 'GİRİŞ',
            radio: 'buyer',
            register: 'Registrasiya?',
            registerLoade: 'login',
            who: this.whos.length ? this.whos[0].who : null,
            name: '',
            email: '',
            city: this.cities.length ? this.cities[7].city : null,
            address: '',
            password: '',
            password_confirmation: '',
            img: null,
            image: null,
            imageLoader: false,
            errors: [],
            status: 1,
            disable: 'disabled',
            marka: [],
            car: [],
        }
    },
    methods: {
        registerLoadFunc(e){
            e.preventDefault();
            if( this.registerLoade === 'login' ){
                this.title = 'Registrasiya';
                this.registerLoade = 'register';
            }
            else if( this.registerLoade === 'register' ){
                this.title = 'Giriş';
                this.registerLoade = 'login';
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
            formData.append('status',2);
            formData.append('who',this.who.trim());
            formData.append('name',this.name.trim());
            formData.append('email',this.email.trim());
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
                    console.log('res - ', res.data.data.id)
                }
            })
            .catch(err => {
                if(err.response.data.errors){
                    this.errors.push(err.response.data.errors)
                    this.sendLoader = false;
                    this.removeDisabled('disabled');
                    console.log('RES - ', this.errors )
                }
                if(err.response.data){
                    this.errors.push(err.response.data.message)
                    this.sendLoader = false;
                    this.removeDisabled('disabled');
                    console.log('ERR - ', this.errors)
                }

                if(  this.errors.length ) {
                    // For Seller Start
                    for(let i=0; i < this.errors.length; i++ ) {
                        if (this.errors[i]['marka']) {
                            document.getElementById('vs1__combobox').classList.add('border-danger');
                            break;
                        } else {
                            document.getElementById('vs1__combobox').classList.remove('border-danger')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['email'] ) {
                            document.getElementById('email').classList.add('border-danger');
                            break;
                        }else {
                            document.getElementById('email').classList.remove('border-danger')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['name'] ) {
                            document.getElementById('name').classList.add('border-danger');
                            break;
                        }else {
                            if( document.getElementById('name').classList.contains('border-danger') ){
                                document.getElementById('name').classList.remove('border-danger')
                            }
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['address'] ) {
                            document.getElementById('address').classList.add('border-danger');
                            break;
                        }else {
                            if( document.getElementById('address').classList.contains('border-danger') ){
                                document.getElementById('address').classList.remove('border-danger')
                            }
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['password'] ) {
                            document.getElementById('password').classList.add('border-danger');
                            document.getElementById('password_confirmation').classList.add('border-danger');
                            break;
                        }else {
                            document.getElementById('password').classList.remove('border-danger')
                            document.getElementById('password_confirmation').classList.remove('border-danger')
                        }
                    }
                    // For Seller End
                }
            });
        },
        addDisabled(val, key){
            document.getElementById('send')
                .setAttribute(val,key);
        },
        removeDisabled(val){
            document.getElementById('send')
                    .removeAttribute(val);
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
        this.getCarNames()
        // Selected buyer for first
        // this.radio = 'buyer'
        console.log(this.registerLoade)
    }
}
</script>

<style scoped>

</style>
