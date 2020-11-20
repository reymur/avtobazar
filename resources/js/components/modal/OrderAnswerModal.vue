<template>
    <div class="">
        <div class="modal-content answer__modal-bg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span @click="resetInputs" aria-hidden="true">&times;</span>
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
                        </div>

                        <div class="col-5 mb-3 pl-1">
                            <label for="price">Qiymət</label>
                            <input type="text" v-model="price" class="form-control" id="price" placeholder="AZE" required>
                        </div>
                    </div>

                    <div class="d-inline-flex">
                        <div class="col-7 mb-3 pr-1">
                            <label for="which">Vəziyyəti?</label>
                            <select v-model="conditionSelect" class="custom-select" id="condition" required>
                                <option selected disabled value="">Seçin...</option>
                                <option v-for="condition in conditions" :value="condition.title">
                                    {{ condition.title }}
                                </option>
                            </select>
                        </div>

                        <div class="custom-file col-5 p-2 mt-4 ml-1" id=image-parent>
                            <input @change="fileSelect" type="file" value="file" class="custom-file-input invalidImage" id="file">
                            <label class="custom-file-label pt-2 pl-2 mt-2" for="file" id="image" data-browse="Çək">
                                <span class="p-0 border-0 input-group-text bg-transparent">
                                    <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                      <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                </span>
                            </label>
                        </div><!-- End Image Button -->

                        <div v-if="imageLoader" class="card col-lg-6 col-md-6 col-sm-11 mt-2 mb-3 modal__image" style="width: 18rem;">
                            <img :src="img" id="imageId" class="imageId card-img-top" alt="Image">
                        </div><!-- End Image Show -->
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
                            <li v-for="e in err['condition']" class="py-2">
                                {{ e }}
                            </li>
                            <li v-for="e in err['image']" class="py-2">
                                {{ e }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer py-1">
                    <button @click="resetInputs" type="button" class="btn btn-secondary" data-dismiss="modal">Xeyir</button>
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
            price: null,
            conditionSelect: '',
            img: null,
            image: null,
            errors: [],
            loader: false,
            imageLoader: false,
            disabled: false,
            conditions: [],
        }
    },
    methods: {
        setFormData(){
            const form_data = new FormData();
            form_data.append('which',    this.which );
            form_data.append('price',    this.price );
            form_data.append('order_id', this.order_id );
            form_data.append('condition', this.conditionSelect );
            form_data.append('image',    this.image );

            return form_data;
        },
        saveAnswer(){
            this.errors = [];
            this.loader = true;
            this.imageloader = true;
            this.disabled = 'disabled';

            let image = [];
            let upload_max_filesize = null;
            image['image'] = ['Şəkil 8 meqabit-dən çox olmamalıdır!'];

            if( this.image != null )
                upload_max_filesize = this.image.size / 1024 / 1024;
            // alert( upload_max_filesize )
            if( upload_max_filesize <= 8 || upload_max_filesize == null ) {
                axios.post('/announce/answers-create', this.setFormData(), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(res => {
                        if (res.status === 200) {
                            let err = ['which','price','image','condition'];
                            err.forEach( err => {
                                this.removeDangerBorder(err);
                            });

                            window.location.href = '/announce/orders'
                        }
                    })
                    .catch(err => {
                        if (err.response.data.errors !== undefined) {
                            let errors = err.response.data.errors;
                            this.errors.push(err.response.data.errors);
                            this.loader = false;
                            this.disabled = false;
                            // this.removeDisabled('disabled');
                            console.log('err = ', this.errors);

                            if( this.errors.length ){
                                this.errors.forEach( error => {
                                    if( error['which'] ) this.addDangerBorder('which');
                                    else this.removeDangerBorder('which');
                                    if( error['price'] ) this.addDangerBorder('price');
                                    else this.removeDangerBorder('price');
                                    if( error['condition'] ) this.addDangerBorder('condition');
                                    else this.removeDangerBorder('condition');
                                    if( error['image'] ) this.addDangerBorder('image');
                                    else this.removeDangerBorder('image');
                                })
                            }
                        }
                    })
            }
            else {
                this.errors = [];
                this.errors.push(image);
                this.sendLoader = false;
            }
        },
        fileSelect(e){
            const file = (e.target.files || e.dataTransfer.file)[0];

            if( file ){
                this.fileLoader = true;
                const reader = new FileReader();

                reader.onload = e => { this.img = e.target.result }
                reader.readAsDataURL(file);

                return this.image = file;
            }
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
        addDangerBorder(id){
            if( document.getElementById(id) ){
            console.log( 'ID - ', document.getElementById(id).classList )
                document.getElementById(id).classList.add('border-danger');
            }
        },
        removeDangerBorder(id){
            if( document.getElementById(id).classList.contains('border-danger') ){
            console.log( 'ID - ', document.getElementById(id).classList )
                document.getElementById(id).classList.remove('border-danger');
            }
        },
        resetInputs(){
                this.which = '';
                this.price = '';
                this.conditionSelect = '';
                this.img = null;
                this.image = null;
                this.errors = [];

                let err = ['which','price','image','condition'];

                err.forEach( err => {
                    if( document.getElementById(err).classList.contains('border-danger') ){
                        document.getElementById(err).classList.remove('border-danger');
                    }
                })
        }
    },
    created() {
        this.getConditions();
    },
    mounted() {
        console.log('res condition - ',this.conditions )
    }
}
</script>

<style scoped>
    #image-parent {
        width: 40px;
    }
</style>
