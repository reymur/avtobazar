<template>
    <div class="">
        <div class="modal-content answer__modal-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">
                <div class="d-inline-flex mt-2 mb-2">
                    <div class="col-7 mb-3 pr-1">
                        <label for="which">Orginal?</label>
                        <select v-model="which" class="custom-select" id="which" required>
                            <option selected disabled value="">Seçin...</option>
                            <option value="Orijinal">Orijinal</option>
                            <option value="Pod orijinal">Pod orijinal</option>
                            <option value="Kopya">Kopya</option>
                        </select>
                        <div class="invalid-tooltip">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-5 mb-3 pl-1">
                        <label for="price">Qiymət</label>
                        <input type="text" v-model="price" class="form-control" id="price" placeholder="AZE" required>
                        <div class="invalid-tooltip">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>

                <div class="">
                    <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                        <ul v-for="err in errors" class="alert-danger my-1 py-2">
                            <li v-for="e in err['which']" class="py-2">
                                {{ e }}
                            </li>
                            <li v-for="e in err['price']" class="py-2">
                                {{ e }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Xeyir</button>
                    <button @click="saveAnswer" id="answerA" :disabled="disabled" type="button" class="btn btn-success">
                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span v-if="loader">Gözlə...</span>
                        <span v-else>Göndər</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderAnswerModal",
    props: ['order_id'],
    data(){
        return {
            which: '',
            price: '',
            errors: [],
            loader: false,
            disabled: false,
        }
    },
    methods: {
        saveAnswer(){
            this.errors = [];
            this.loader = true;
            this.disabled = 'disabled';

            axios.post('/announce/answers-create',{
                which: this.which,
                price: this.price,
                order_id:this.order_id,
            })
            .then(res => {
                if( res.status === 200 ) {
                    window.location.href = '/announce/orders'
                }
            })
            .catch(err => {
                if( err.response.data.errors !== undefined ) {
                    this.errors.push(err.response.data.errors);
                    this.loader = false;
                    this.disabled = false;
                    // this.removeDisabled('disabled');
                    console.log('err = ', this.errors);
                }
            })
        },
        addDisabled(key, val){
            // alert(2222222)
            document.getElementById('answerA').setAttribute(key,val);
        },
        removeDisabled(key){
            document.getElementById('answer').removeAttribute(key);
        },
    },
    mounted() {
        console.log( ' MMM - ', this.order_id )
        // this.addDisabled('disabled','disabled');
    }
}
</script>

<style scoped>

</style>
