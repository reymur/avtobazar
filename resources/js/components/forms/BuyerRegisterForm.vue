<template>
    <div class="">
        <div class="col-12 mb-1">
            <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                <ul class="alert-danger py-2 my-1">
                    <li v-for="error in errors" class="py-2" v-if="error.autoNumber">{{ error.autoNumber[0] }}</li>
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
                <div class="input-group-text p-1">
                    <img src="images/cars/registerNumbers/number.png" alt="" class="register__number-size ">
                </div>
            </div>
            <input v-model="autoNumber" type="text" class="form-control text-uppercase"
                   id="autoNumber" placeholder="Avtomobilin nömrəsini qeyd edin">
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

        <div class="modal-footer pt-2 pb-2 pr-0 mr-0">
            <button type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal">Xeyir</button>
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
    props: ['cars'],
    data(){
        return {
            car: this.cars.length ? this.cars[76].name : '',
            autoNumber: '',
            password: '',
            errors: [],
            status: 1,
            disable: 'disabled',
            sendLoader: false,
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
                autoNumber: this.autoNumber.trim(),
                password: this.password.trim()
            }).then(res => {
                if( res.status == 201 ){
                    window.location.href = '/announce/sends';
                    this.sendLoader = false;
                    this.removeDisabled('disabled');
                }
                console.log(res.status)
            })
            .catch(err => {
                if(err.response.data.errors){
                    this.errors.push(err.response.data.errors)
                    this.sendLoader = false;
                    this.removeDisabled('disabled');
                    console.log('Err Buyer - ', this.errors )
                }

                // For Buyer Start
                for(let i=0; i < this.errors.length; i++ ) {
                    if (this.errors[i]['autoNumber']) {
                        document.getElementById('autoNumber')
                            .classList.add('border-danger');
                        break;
                    } else {
                        document.getElementById('autoNumber')
                            .classList.remove('border-danger')
                    }
                }

                for(let i=0; i < this.errors.length; i++ ) {
                    if (this.errors[i]['password']) {
                        document.getElementById('passBuyer')
                            .classList.add('border-danger');
                        break;
                    } else {
                        document.getElementById('passBuyer')
                            .classList.remove('border-danger')
                    }
                }
                // For Buyer End
            })
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
