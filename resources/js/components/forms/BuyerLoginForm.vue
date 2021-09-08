<template>
    <div class="">
        <div class="col-12 mb-1">
            <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                <ul class="alert-danger py-2 my-1">
                    <li v-for="error in errors" class="py-2" v-if="error.phone">{{ error.phone[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.password"> {{ error.password[0] }}</li>
                </ul>
            </div>
        </div><!--End Errors -->

        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Telefon
                    </div>
                </div>
<!--                <div class="input-group-text p-1">-->
<!--                    <img src="images/cars/registerNumbers/number.png" alt="" class="register__number-size ">-->
<!--                </div>-->
            </div>
            <input v-model="phone" type="text" class="form-control"
                   id="buyerPhone" placeholder="Telefon nömrənizi qeyd edin">
        </div>

        <div class="col-12 input-group p-0">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    Şifrə
                </div>
            </div>
            <input v-model="password" type="password" class="form-control"
                   id="passBuyer" placeholder="şifrəni yaz">
        </div>

        <div class="modal-footer pt-2 pb-1 pr-0 mr-0">
            <button @click="sendBuyerData" type="button" id="send" class="btn btn-primary">
                <span v-if="sendLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span v-if="sendLoader">Gözlə...</span>
                <span v-else>Giriş</span>
            </button>
        </div><!-- End Göndər button -->
    </div>
</template>

<script>
export default {
    name: "buyerloginform",
    props:['errorClearForBuyerLogin'],
    data(){
        return {
            phone: '',
            password: '',
            errors: [],
            status: 1,
            disable: 'disabled',
            sendLoader: false,
        }
    },
    watch: {
        errorClearForBuyerLogin: function(){
            this.errors = []
        }
    },
    methods:{
        sendBuyerData(){
            this.errors = [];

            this.addDisabled('disabled','disabled');
            this.sendLoader = true;

            axios.post('/login', {
                status: 1,
                phone: this.phone.trim(),
                password: this.password.trim()
            }).then(res => {
                if( res.status == 204 || res.status == 201 ){
                    if( res.data.user ){
                        window.location.href = '/buyer/profile/'+ res.data.user.id ;
                    }else{
                        window.location.href = '/';
                    }
                    this.sendLoader = false;
                    this.removeDisabled('disabled');
                }
                console.log(res.status)
            })
                .catch(err => {
                    console.log('Err Buyer - ', err.response )
                    if(err.response.data.errors){
                        this.errors.push(err.response.data.errors)
                        this.sendLoader = false;
                        this.removeDisabled('disabled');
                        console.log('Err Buyer - ', this.errors )
                    }

                    // For Buyer Start
                    for(let i=0; i < this.errors.length; i++ ) {
                        if (this.errors[i]['phone']) {
                            if( document.getElementById('phone') ) {
                                document.getElementById('phone').classList.add('border-danger');
                                break;
                            }
                        } else {
                            if( document.getElementById('phone') ) {
                                document.getElementById('phone').classList.remove('border-danger')
                            }
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ) {
                        if (this.errors[i]['password']) {
                            if( document.getElementById('phone') ) {
                                document.getElementById('phone').classList.add('border-danger');
                                break;
                            }
                        } else {
                            if( document.getElementById('password') ) {
                                document.getElementById('password').classList.remove('border-danger')
                            }
                        }
                    }
                    // For Buyer End
                })
        },
        addDisabled(val, key){
            if( document.getElementById('send') ) {
                document.getElementById('send').setAttribute(val, key);
            }
        },
        removeDisabled(val){
            if(  document.getElementById('send') ) {
                document.getElementById('send').removeAttribute(val);
            }
        },
    },
    mounted() {
        // console.log()
    }
}
</script>

<style scoped>

</style>
