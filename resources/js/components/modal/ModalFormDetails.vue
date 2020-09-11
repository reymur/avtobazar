<template>
    <div class="">
        <form action="" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <div class="col-12 mb-1">
                    <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                        <ul v-for="error in errors" class="alert-danger my-1 py-2">
                            <li v-for="err in error['spare_parts']" class="py-2">
                                {{ err }}
                            </li>
                            <li v-for="err in error['when']" class="py-2">
                                {{ err }}
                            </li>
                            <li v-for="err in error['texpassport']" class="py-2">
                                {{ err }}
                            </li>
                            <li v-for="err in error['note']" class="py-2">
                                {{ err }}
                            </li>
                            <li v-for="err in error['image']" class="py-2">
                                {{ err }}
                            </li>
                        </ul>
                    </div>
                </div><!--End Errors -->

<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text text-uppercase">Ehtiyat</span>-->
<!--                </div>-->
<!--                <input v-model="spare_parts" type="text" id="spare_parts" aria-label="Last name"-->
<!--                       class="form-control border-info text-uppercase"-->
<!--                       placeholder="Hissəsinin adı"-->
<!--                >&lt;!&ndash; End spare_parts (Ehtiyat) &ndash;&gt;-->
            </div>

            <div class="form-group">
                <label for="spare_parts" class="spare__parts">Ehtiyyat Hissəsi haqda məlumat:</label>
                <textarea v-model="spare_parts" class="form-control" id="spare_parts" col="auto" rows="2"
                          placeholder="Satıcının sizi anlanması üçün məlumatı dəqiq və konkret yazın Məsələn: 4 ədəd şam, 1 ədəd yanacağ filteri
                          "></textarea>
            </div><!-- End spare_parts (Ehtiyat) -->

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="marka">Marka</label>
                </div>
                <select v-if="cars.length" v-model="marka" @change="carsSelect"
                        class="custom-select invalid" id="marka" required>
                    <option v-for="car in cars" :value="car.name">
                        {{ car.name}}
                    </option>
                </select><!-- End Marka -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="model">Model</label>
                </div>
                <select v-model="model" class="custom-select" id="model" required>
                    <option v-if="carTypeReturns.length" v-for="type in carTypeReturns[0]" :value="type.title">
                        {{ type.title }}
                    </option>
                </select><!-- End Model -->
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="year">Buraxılış</label>
                </div>
                <select v-model="yearSelect" class="custom-select invalid" id="year" required>
                    <option v-if="years.length" v-for="year in years" :value="year.year">
                        {{ year.year }}
                    </option>
                </select><!-- End Years -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="motor">Motor</label>
                </div>
                <select v-model="motorSelect" class="custom-select invalid" id="motor" required>
                    <option v-if="motors.length" v-for="motor in motors" :value="motor.motor">
                        {{ motor.motor }}
                    </option>
                </select> <!-- End Motor -->
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="to">Qebul edən?</label>
                </div>
                <select v-model="toSelect" @change="toFunc" class="custom-select" id="to" required>
                    <option :value="1">Mağaza</option>
                    <option :value="2">Ölüxana</option>
                    <option :value="3">Har ikisi</option>
                </select><!-- End To (Qebul etsin) -->
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="when">Hansı?</label>
                </div>
                <v-select v-model="when" id="when" class="marka"
                          taggable multiple label="country"
                          placeholder="Mağaza və ya ölüxananı seçin"
                          :options="whos">
                </v-select>
            </div><!-- End V-SELECT -->

            <div v-if="texPass" class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Texpasport</span>
                </div>
                <input v-model="texPassInput" type="text" id="texpassport" aria-label="First name"
                       class="form-control" placeholder="Daha dəqiq məlumat üçün">
            </div><!-- End Texpasport -->

            <div v-if="inputLoader" class="input-group mb-2 border-0">
                <div class="input-group-prepend"></div>
                <input type="text" class="form-control border-0">
            </div>

            <div class="input-group mb-2 d-inline-flex">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="condition">Veziyeti</label>
                </div>
                <select v-model="condition" class="custom-select invalid" id="condition" required>
                    <option value="1">Yeni</option>
                    <option value="2">Az işlənmiş</option>
                    <option value="3">İşlənmiş</option>
                    <option value="4">Normal</option>
                    <option value="5">Köhnə</option>
                    <option value="6">Fərqi yoxdu</option>
                </select><!-- End condition (Veziyeti) -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="city">Şəhər</label>
                </div>
                <select v-model="citySelect" class="custom-select invalid" id="city" required>
                    <option v-if="cities.length" v-for="city in cities" :value="city.city">{{ city.city }}</option>
                </select><!-- End cities -->
            </div>

            <div class="custom-file col-3 p-2 mb-2">
                <input @change="fileSelect" type="file" value="file" class="custom-file-input invalidImage" id="file">
                <label class="custom-file-label pt-2 pl-2" for="file" id="image" data-browse="Şəkil">
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

<!--            <div class="form-group">-->
<!--                <label for="note">Əlavə məlumat</label>-->
<!--                <textarea v-model="note" class="form-control" id="note" rows="2"-->
<!--                          placeholder="Satıcının sizi anlanması üçün məlumatı dəqiq və konkret yazın"></textarea>-->
<!--            </div>&lt;!&ndash; End Note (Əlavə məlumat) &ndash;&gt;-->

            <div class="modal-footer pt-1 pb-3 mr-2">
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">Xeyir</button>
                <button @click="sendInfo" type="button" class="btn btn-primary" id="announceSend">
                    <span v-if="sendLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span v-if="sendLoader">Gözlə...</span>
                    <span v-else>Göndər</span>
                </button>
            </div><!-- End Göndər button -->
        </form>
    </div>
</template>

<script>
export default {
    name: "formDetails",
    props: ['cars','types','cities','years','motors'],
    data(){
        return {
            imageLoader: false,
            texPass: 1,
            toloader: false,
            img: null,
            inputLoader: false,
            priceLoader: false,
            spare_parts: '',
            marka: 'BMW',
            model: '',
            yearSelect: 2020,
            motorSelect: 2000,
            toSelect: 1,
            whos: [],
            condition: 1,
            when: [],
            texPassInput: '',
            citySelect: 'Bakı',
            image: null,
            note: null,
            carTypeReturns: [],
            exampleCar: {name:'BMW'},
            exampleModel: [{name:'X5'}],
            errors: [],
            sendLoader: false,
        }
    },
    methods: {
        changeConditionValue(){
            if( this.toSelect === 1 ){ this.condition = 1 }
            else if( this.toSelect === 2 ){ this.condition = 2 }
            else if( this.toSelect === 3 ){ this.condition = 6 }

            console.log( this.toSelect === 3  )
        },
        getWhos(){
            this.whos = [];

            axios.post('seller/get-whos', {
                id:this.toSelect
            })
            .then(res => {
                if( res.data.users ){
                    if( res.data.users.length > 1 ){
                        this.whos = ['Hamısı'];
                    }

                    res.data.users.forEach( val => {
                        this.whos.push(val.name)
                    })
                    console.log('resddd = ', this.whos)

                    return this.whos;
                }
            })
            .catch(err => {
                console.log('err = ', err.response)
            })

            this.changeConditionValue();
        },
        carsSelect(){
            axios.post('cars/json-models', {name: this.marka})
                .then(types => {
                    this.carTypeReturns = [];
                    this.exampleCar = false;
                    this.exampleModel = false;
                    this.carTypeReturns.push(types.data.types)
                    this.model = types.data.types[0].title
                    console.log('exampleModel - ', this.exampleModel )
                })
                .catch(err => {
                    console.log('err - ', err)
                })
        },
        toFunc(){
            if( this.toSelect == 2 ){
                setTimeout(() => {
                    this.texPass = false
                    this.condition = 2;
                },800)
            }
            else if( this.toSelect == 3 ){
                setTimeout(() => {
                    this.texPass = true
                    this.condition = 6;
                },800)
            }
            else{
                setTimeout(() => {
                    this.texPass = true
                    this.condition = 1;
                },800)
            }

            this.getWhos();
        },
        fileSelect(e){
            const file = (e.target.files || e.dataTransfer.files)[0];
            if( file ){
                this.imageLoader = true;
                const reader = new FileReader();

                reader.onload = (e) => { this.img = e.target.result };
                reader.readAsDataURL(file);

                return this.image = file;
            }
        },
        sendInfo(){
            this.errors = [];
            let image = [];
            let upload_max_filesize = null;
            image['image'] = ['Şəkil 6 meqabit-dən çox olmamalıdır!'];

            if( this.image != null ){
                upload_max_filesize = this.image.size / 1024 / 1024;
            }

            this.addDisabled('disabled','disabled');
            this.sendLoader = true;

            if( this.errors.length === 0 ){
                if( upload_max_filesize <= 6 || upload_max_filesize == null ){

                    let formdata = new FormData();
                    formdata.append('spare_parts', this.spare_parts.trim());
                    formdata.append('marka', this.marka);
                    formdata.append('model', this.model);
                    formdata.append('year', this.yearSelect);
                    formdata.append('motor', this.motorSelect);
                    formdata.append('who', this.toSelect);
                    formdata.append('when', this.when);
                    formdata.append('city', this.citySelect);
                    formdata.append('condition', this.condition);
                    formdata.append('texpassport', this.texPassInput.trim());
                    formdata.append('image', this.image);

                    axios.post('announce/send-announce',formdata, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(res => {
                        console.log('fffff = ', res.data)
                        if( res.status == 200 ) {
                            // window.location.href = '/announce/sends';
                            console.log(res)
                        }

                        // if( res.data ){
                        //     res.data.forEach( (key, val) => {
                                console.log('image - ', res.data.data.image);
                                console.log('texpassport - ', res.data.data.texpassport);
                            // });
                        if( res.data && res.data.data ){
                            let image = res.data.data.image;
                            let texpassport = res.data.data.texpassport;

                            if( image == null && texpassport == null ){
                                this.removeDangerBorder('spare_parts');
                                this.removeDangerBorder('vs1__combobox');
                            }
                            else if( image == null ){
                                this.removeDangerBorder('spare_parts');
                                this.removeDangerBorder('vs1__combobox');
                                this.removeDangerBorder('texpassport');

                            }
                            else if( texpassport == null ){
                                this.removeDangerBorder('spare_parts');
                                this.removeDangerBorder('vs1__combobox');
                                this.removeDangerBorder('image');
                            }
                            else{
                                this.removeDangerBorder('spare_parts')
                                this.removeDangerBorder('vs1__combobox')
                                this.removeDangerBorder('texpassport')
                                this.removeDangerBorder('image')
                            }
                        }

                        // this.removeDangerBorder('spare_parts')
                        // this.removeDangerBorder('vs1__combobox')
                        // this.removeDangerBorder('texpassport')
                        // this.removeDangerBorder('image')
                        // }
                    })
                    .catch(err => {
                        this.errors = [];
                        this.removeDisabled('disabled');
                        this.sendLoader = false;

                        if( err.response.data && err.response.data.errors ){
                            this.errors.push( err.response.data.errors);

                            this.addDangerBorder(err.response.data.errors, 'spare_parts')
                            this.addDangerBorder(err.response.data.errors, 'when')
                            this.addDangerBorder(err.response.data.errors, 'texpassport')
                            this.addDangerBorder(err.response.data.errors, 'image')
                        }
                        console.log( 'Err - ', err.response.data.errors )
                    })
                }
                else{
                    console.log('2222 = ', document.getElementById('spare_parts').classList.contains('border-danger'))
                    this.errors = [];
                    this.errors.push(image);
                    this.removeDisabled('disabled');
                    this.addDangerBorder(this.errors[0], 'image')
                    if( document.getElementById('spare_parts').classList.contains('border-danger') ){
                        document.getElementById('spare_parts').classList.remove('border-danger')
                    }
                    if( document.getElementById('vs1__combobox').classList.contains('border-danger') ){
                        document.getElementById('vs1__combobox').classList.remove('border-danger')
                    }
                    if( document.getElementById('texpassport').classList.contains('border-danger') ){
                        document.getElementById('texpassport').classList.remove('border-danger')
                    }
                    this.sendLoader = false;
                }

            }
        },
        addDisabled(key, val){
            document.getElementById('announceSend').setAttribute(key,val);
        },
        removeDisabled(key){
            document.getElementById('announceSend').removeAttribute(key);
        },
        addDangerBorder(errors, id=null){
            console.log('id = ', id)
            if( id == 'when' ){
                if( errors[id] !== undefined && errors[id] != null && errors[id].length > 0 ) {
                    document.getElementById('vs1__combobox').classList.add('border-danger');
                }
                else if( document.getElementById('vs1__combobox').classList.contains('border-danger') ){
                    document.getElementById('vs1__combobox').classList.remove('border-danger');
                }
            }else{
                if( errors[id] !== undefined && errors[id] != null && errors[id].length > 0 ) {
                    document.getElementById(id).classList.add('border-danger');
                }
                else if( document.getElementById(id).classList.contains('border-danger') ){
                    document.getElementById(id).classList.remove('border-danger');
                }
            }
        },
        removeDangerBorder( id = null ){
            if( document.getElementById(id).classList.contains('border-danger') ){
                document.getElementById(id).classList.remove('border-danger');
            }
        }
    },
    mounted(){
        this.carsSelect();
        this.getWhos();
        // console.log(this.file)
        // console.log(this.cities)
    }
}
</script>

<style scoped>

</style>
