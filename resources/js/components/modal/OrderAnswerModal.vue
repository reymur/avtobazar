<template>
    <div class="">
        <div class="modal-content answer__modal-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 pb-1">
                <div class="mt-2 mb-2">
                    <div class="d-inline-flex">
                        <div class="col-7 mb-3 pr-1">
                            <label for="which">Orginal?</label>
                            <select v-model="which" class="custom-select " id="which" required>
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

                    <div class="d-inline-flex">
                        <div class="col-7 mb-3 pr-1">
                            <label for="which">Vəziyyəti?</label>
                            <select v-model="condition" class="custom-select" id="condition" required>
                                <option selected disabled value="">Seçin...</option>
                                <option v-for="condition in conditions" :value="condition.title">
                                    {{ condition.title }}
                                </option>
                            </select>
                            <div class="invalid-tooltip">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="custom-file col-5 p-2 mt-4 ml-1" id=image-parent>
                            <input type="file" value="file" class="custom-file-input invalidImage" id="file">
                            <label class="custom-file-label pt-2 pl-2 mt-2" for="file" id="image" data-browse="Çək">
                                <span class="p-0 border-0 input-group-text bg-transparent">
                                    <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                      <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                </span>
                            </label>
                        </div><!-- End Image Button -->
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
            condition: '',
            errors: [],
            loader: false,
            disabled: false,
            conditions: [],
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
        getConditions(){
            axios.post('/get-conditions')
             .then( res => {
                 if( res.status == 200 ){
                     if(res.data.conditions != null ){
                         this.conditions = res.data.conditions
                     }
                     console.log('res condition - ',this.conditions )
                 }
             }).catch( err => {
                if( err.response != null ){
                    console.log('res condition - ',err.response.data.errors )
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
    created() {
        this.getConditions();
    },
    mounted() {
        console.log('res condition - ',this.conditions )
        // this.addDisabled('disabled','disabled');
    }
}
</script>

<style scoped>
    #image-parent {
        width: 40px;
    }
</style>
