<template>
    <div class="">
        <div class="col-12 mb-1">
            <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                <ul class="alert-danger py-2 my-1">
                    <li v-for="error in errors" class="py-2" v-if="error.email"> {{ error.email[0] }}</li>
                    <li v-for="error in errors" class="py-2" v-if="error.password"> {{ error.password[0] }}</li>
                </ul>
            </div>
        </div><!--End Errors -->

        <div class="col-12">
            <div class="col-12 input-group p-1">
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
        </div>

        <div class="modal-footer pt-2 pb-2 pr-0 mr-0">
            <button type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal">Xeyir</button>
            <button @click="sendSellerData" type="button" id="send" class="btn btn-primary">
                <span v-if="sendLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span v-if="sendLoader">Gözlə...</span>
                <span v-else>Giriş</span>
            </button>
        </div><!-- End Göndər button -->
    </div>
</template>

<script>
export default {
    name: "sallerloginform",
    data(){
        return {
            name: '',
            email: '',
            password: '',
            imageLoader: false,
            errors: [],
            status: 2,
            disable: 'disabled',
            sendLoader: false,
        }
    },
    methods: {
        inputControlAndSend(){
            if( this.radio === 'buyer' ) {
                this.errors = [];
                return this.sendBuyerData();
            }
        },
        sendSellerData(){
            this.errors = [];

            let formData = new FormData();
            formData.append('status',2);
            formData.append('email',this.email.trim());
            formData.append('password',this.password.trim());

            this.addDisabled('disabled','disabled');
            this.sendLoader = true;

            axios.post('/login', formData).then(res => {
                if( res.status == 201 ){
                    this.errors = [];
                    document.getElementById('email').classList.remove('border-danger')
                    document.getElementById('password').classList.remove('border-danger')
                    window.location.href = '/seller/profile/'+ res.data.user.id
                    console.log('res - ', res.data.data.id)
                }
            })
            .catch(err => {
                    if(err.response.data.errors){
                        this.errors.push(err.response.data.errors)
                        this.sendLoader = false;
                        this.addDangerBorder();
                        this.removeDisabled('disabled');
                        console.log('ERR 1 - ', this.errors )
                    }
                    if(err.response.data){
                        this.errors.push(err.response.data.message)
                        this.sendLoader = false;
                        this.removeDisabled('disabled');
                        console.log('ERR 2 - ', this.errors)
                    }

                    this.addDangerBorder();
                });
        },
        addDangerBorder(){
            if(  this.errors.length ) {
                // For Seller Start
                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['email'] ) {
                            document.getElementById('email').classList.add('border-danger');
                            break;
                        }else {
                            document.getElementById('email').classList.remove('border-danger')
                        }
                    }

                    for(let i=0; i < this.errors.length; i++ ){
                        if( this.errors[i]['password'] ) {
                            document.getElementById('password').classList.add('border-danger');
                            break;
                        }else {
                            document.getElementById('password').classList.remove('border-danger')
                        }
                    }
                // For Seller End
            }
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
        // Selected buyer for first
        // this.radio = 'buyer'
    }
}
</script>

<style scoped>

</style>
