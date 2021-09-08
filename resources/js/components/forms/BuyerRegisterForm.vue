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

        <div class="col-12 input-group p-0 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text pl-2 pr-1">
                    Marka
                </div>
            </div>
            <select v-model="car" class="custom-select" id="marka" required>
                <option v-if="cars.length" v-for="carName in cars" :value="carName.name">
                    {{ carName.name }}
                </option>
            </select>
        </div>

        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Telefon
                    </div>
                </div>
                <!--<div class="input-group-text p-1">-->
<!--                    <img src="images/cars/registerNumbers/number.png" alt="" class="register__number-size ">-->
<!--                </div>-->
            </div>

            <input v-model="phone" type="text" class="form-control"
                   id="phone" placeholder="Telefon nömrənizi qeyd edin">
        </div>

        <div class="col-12 input-group p-0">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    Şifrə
                </div>
            </div>
            <input v-model="password" type="password" class="form-control"
                   id="password" placeholder="şifrəni yaz">
        </div>

        <div class="modal-footer pt-2 pb-2 pr-0 mr-0">
            <button @click="sendBuyerData" type="button" id="send" class="btn btn-primary">
                <span v-if="sendLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span v-if="sendLoader">Gözlə...</span>
                <span v-else>Registrasiya</span>
            </button>
        </div><!-- End Göndər button -->
    </div>
</template>

<script>
export default {
    name: "buyerregisterform",
    props: ['cars','errorClearForBuyerRegister'],
    data(){
        return {
            car: this.cars.length ? this.cars[76].name : '',
            phone: '',
            password: '',
            errors: [],
            status: 1,
            disable: 'disabled',
            sendLoader: false,
            inputIdNames:['phone','password']
        }
    },
    watch: {
        errorClearForBuyerRegister: function(){
            this.errors = []
            this.inputIdNames.forEach( id => {
                this.dangerBorderRemove(id)
            })
        }
    },
    methods:{
        sendBuyerData(){
            this.errors = [];

            this.addDisabled('disabled','disabled');
            this.sendLoader = true;

            axios.post('/register', {
                status: 1,
                marka: this.car,
                phone: this.phone.trim(),
                password: this.password.trim()
            }).then(res => {
                if( res.data ) {
                    if (res.status == 201) {
                        if( res.data.user ) {
                            window.location.href = '/buyer/profile/' + res.data.user.id
                            this.sendLoader = false;
                        }
                    }
                }
                console.info(res)
                console.log('Successfully - '+res.status+' - '+ res)
            })
            .catch(err => {
                if( err.response ) {
                    if (err.response.data.errors) {
                        this.errors.push(err.response.data.errors)
                        this.sendLoader = false;
                        this.removeDisabled('disabled');
                        console.log('Err Buyer - ', this.errors)
                    }
                }

                // For Buyer Start
                for(let i=0; i < this.errors.length; i++ ) {
                    if (this.errors[i]['phone']) {
                        this.dangerBorderAdd('phone');
                        break;
                    } else {
                        this.dangerBorderRemove('phone')
                    }
                }

                for(let i=0; i < this.errors.length; i++ ) {
                    if (this.errors[i]['password']) {
                        this.dangerBorderAdd('password');
                        break;
                    } else {
                        this.dangerBorderRemove('password')
                    }
                }

                console.log('Error BU - '+err)
                // For Buyer End
            })
        },
        dangerBorderAdd(id){
            if( document.getElementById(id) ){
                document.getElementById(id).classList.add('border-danger')
            }
        },
        dangerBorderRemove(id){
            if( document.getElementById(id) ){
                document.getElementById(id).classList.remove('border-danger')
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
    },
    mounted() {
        console.log(this.cars)
    }
}
</script>

<style scoped>

</style>
