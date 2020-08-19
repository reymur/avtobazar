<template>
    <div class="">
        <form action="" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <div class="col-12 mb-1">
                    <div v-if="errors.length" class="invalid-feedback d-block mb-2">
                        <ul v-for="error in errors" class="alert-danger my-1">
                            <li class="py-2"> {{ error }}</li>
                        </ul>
                    </div>
                </div><!--End Errors -->

                <div class="input-group-prepend">
                    <span class="input-group-text text-uppercase">Ehtiyat</span>
                </div>
                <input v-model="spare_parts" type="text" id="spare_parts" aria-label="Last name"
                       class="form-control border-info  text-uppercase"
                       placeholder="Hissəsinin adı"
                ><!-- End spare_parts (Ehtiyat) -->
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="marka">Marka</label>
                </div>
                <select v-if="cars.length" v-model="marka" @change="carsSelect"
                        class="custom-select" id="marka" required>
                    <option v-for="car in cars" :value="car.id">
                        {{ car.name}}
                    </option>
                </select><!-- End Marka -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="model">Model</label>
                </div>
                <select v-model="model" class="custom-select" id="model" required>
                    <option v-if="carTypeReturns.length" v-for="typeReturn in carTypeReturns[0]" :value="typeReturn.id">
                        {{ typeReturn.title }}
                    </option>
                </select><!-- End Model -->
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="year">Buraxılış</label>
                </div>
                <select v-model="yearSelect" class="custom-select" id="year" required>
                    <option v-if="years.length" v-for="year in years" :value="year.year">
                        {{ year.year }}
                    </option>
                </select><!-- End Years -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="motor">Motor</label>
                </div>
                <select v-model="motorSelect" class="custom-select" id="motor" required>
                    <option v-if="motors.length" v-for="motor in motors" :value="motor.motor">
                        {{ motor.motor }}
                    </option>
                </select> <!-- End Motor -->
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="to">Qebul etsin</label>
                </div>
                <select v-model="toSelect" @change="toFunc" class="custom-select" id="to" required>
                    <option :value="1">Magazalar</option>
                    <option :value="2">Oluxanalar</option>
                    <option :value="3">Hamisi</option>
                </select><!-- End To (Qebul etsin) -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="condition">Veziyeti</label>
                </div>
                <select v-model="condition" class="custom-select" id="condition" required>
                    <option value="1">Yeni</option>
                    <option value="2">Az Islenmis</option>
                    <option value="3">Islenmis</option>
                    <option value="4">Normal</option>
                    <option value="5">Kohne</option>
                </select><!-- End condition (Veziyeti) -->
            </div>

            <div v-if="texPass" class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Texpasport</span>
                </div>
                <input v-model="texPassInput" type="text" id="texPass" aria-label="First name"
                       class="form-control" placeholder="Daha dəqiq məlumat üçün">
            </div><!-- End Texpasport -->

            <div v-if="inputLoader" class="input-group mb-2 border-0">
                <div class="input-group-prepend"></div>
                <input type="text" aria-label="First name" class="form-control border-0">
            </div>

<!--            <div v-if="priceLoader" class="input-group mb-2">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text">Təxmini qiymət</span>-->
<!--                </div>-->
<!--                <input type="text" aria-label="First name" class="form-control" placeholder="min AZN">-->
<!--                <input type="text" aria-label="Last name" class="form-control" placeholder="max AZN">-->
<!--            </div>-->

            <div class="form-group mb-2 d-inline-flex">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="city">Şəhər</label>
                </div>
                <select v-model="citySelect" class="custom-select" id="city" required>
                    <option v-if="cities.length" v-for="city in cities" :value="city.city">{{ city.city }}</option>
                </select><!-- End cities -->

                <div class="custom-file col-3 p-2">
                    <input @change="fileSelect" type="file" value="file" class="custom-file-input" id="file">
                    <label class="custom-file-label pt-2 pl-2" for="file" data-browse="Şəkil">
                        <span class="p-0 border-0 input-group-text bg-transparent">
                            <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                              <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                            </svg>
                        </span>
                    </label>
                </div><!-- End Image Button -->
            </div>

            <div v-if="imageLoader" class="card col-lg-6 col-md-6 col-sm-11 mt-2 mb-3 modal__image" style="width: 18rem;">
                <img :src="img" id="imageId" class="imageId card-img-top" alt="Image">
            </div><!-- End Image Show -->

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Əlavə məlumat</label>
                <textarea v-model="note" class="form-control" id="exampleFormControlTextarea1" rows="2"
                          placeholder="Satıcının sizi anlanması üçün məlumatı dəqiq və konkret yazın"></textarea>
            </div><!-- End Note (Əlavə məlumat) -->

            <div class="modal-footer p-0 mr-2">
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">Xeyir</button>
                <button @click="sendInfo" type="button" class="btn btn-primary">Göndər</button>
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
            marka: 9,
            model: 81,
            yearSelect: 2020,
            motorSelect: 2000,
            toSelect: 1,
            condition: 1,
            texPassInput: '',
            citySelect: 'Bakı',
            image: null,
            note: '',
            carTypeReturns: [],
            exampleCar: {name:'BMW'},
            exampleModel: [{name:'X5'}],
            errors: [],
        }
    },
    methods: {
        carsSelect(){
            axios.post('cars/json-models', {id: this.marka})
                .then(types => {
                    this.carTypeReturns = [];
                    this.exampleCar = false;
                    this.exampleModel = false;
                    this.carTypeReturns.push(types.data.types)
                    this.model = types.data.types[0].id
                    console.log(this.exampleModel )
                })
                .catch(res => {
                    console.log(res.response.data.errors)
                })
        },
        toFunc(){
            if( this.toSelect == 2 ){
                setTimeout(() => {
                    this.texPass = false
                    this.condition = 2;
                },800)
            }else{
                setTimeout(() => {
                    this.texPass = true
                    this.condition = 1;
                },800)
            }
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

            if( this.spare_parts == '' ){
                this.errors.push( '"Ehtiyat" hissəsinin adını seçin!' );
                document.getElementById('spare_parts').classList.add('border-danger');
                // console.log( this.errors[0])
            }else if( document.getElementById('spare_parts').classList.contains('border-danger') ){
                document.getElementById('spare_parts')
                    .classList.remove('border-danger')
            }
            if( this.marka == '' ){
                this.errors.push( '"Markanı" seçin!' );
                document.getElementById('marka').classList.add('border-danger');
            }else if( document.getElementById('marka').classList.contains('border-danger') ){
                document.getElementById('marka')
                    .classList.remove('border-danger')
            }
            if( this.model == '' ){
                this.errors.push( '"Modeli" seçin!' );
                document.getElementById('model').classList.add('border-danger');
            }else if( document.getElementById('model').classList.contains('border-danger') ){
                document.getElementById('model')
                    .classList.remove('border-danger')
            }
            if( this.toSelect !== 2 ){
                if( this.texPassInput == '' ){
                    this.errors.push('"Texpassportun" nömrəsini qeyd edin!')
                    document.getElementById('texPass').classList.add('border-danger');
                }else{
                    document.getElementById('texPass')
                        .classList.remove('border-danger')
                }
            }

            if( this.errors.length === 0 ){
                let formdata = new FormData();
                formdata.append('image', this.image);
                formdata.append('spare_parts', this.spare_parts);
                formdata.append('marka', this.marka);
                formdata.append('yearSelect', this.yearSelect);
                formdata.append('motorSelect', this.motorSelect);
                formdata.append('toSelect', this.toSelect);
                formdata.append('citySelect', this.citySelect);
                formdata.append('condition', this.condition);
                formdata.append('texpassport', this.texPassInput);
                formdata.append('note', this.note);
                axios.post('cars/send-info',formdata, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                 .then(res => {
                     console.log('fffff = ', res.data)
                     if( res.status == 200 ) {
                         window.location.href = '/announce/sends'
                     }
                 })
                  .catch(err => {
                      console.log( err.response )
                  })
                console.log('cccccck = ',this.image)
            }
        }
    },
    mounted(){
        this.carsSelect();
        // console.log(this.file)
        // console.log(this.cities)
    }
}
</script>

<style scoped>

</style>
