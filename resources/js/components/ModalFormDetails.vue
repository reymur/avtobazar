<template>
    <div class="">
        <form action="">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text text-uppercase">Ehtiyat</span>
                </div>
                <input type="text" aria-label="Last name"
                       class="form-control border-info  text-uppercase"
                       placeholder="Hissəsinin adı">
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="marka">Marka</label>
                </div>
                <select v-if="cars.length" v-model="selectCar" @change="carsSelect" class="custom-select" id="marka" required>
                    <option v-if="exampleCar" value="">Məsələ, {{ exampleCar.name }}</option>
                    <option v-for="car in cars" :value="car.id">
                        {{ car.name}}
                    </option>
                </select>

                <div class="input-group-prepend">
                    <label class="input-group-text" for="model">Model</label>
                </div>
                <select class="custom-select" v-model="selectModel" id="model" required>
                    <option v-if="exampleModel" v-for="example in exampleModel" value="">Məsələ, {{ example.name }}</option>
                    <option v-if="carTypeReturns.length" v-for="typeReturn in carTypeReturns[0]" :value="typeReturn.id">
                        {{ typeReturn.title }}
                    </option>
                </select>
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="year">Buraxılış</label>
                </div>
                <select class="custom-select" id="year" required>
                    <option v-if="years.length" v-for="year in years" :value="year.id">
                        {{ year.year }}
                    </option>
                </select><!-- End Years -->

                <div class="input-group-prepend">
                    <label class="input-group-text" for="motor">Motor</label>
                </div>
                <select class="custom-select" id="motor" required>
                    <option v-if="motors.length" v-for="motor in motors" :value="motor.id">
                        {{ motor.motor }}
                    </option>
                </select> <!-- End Motor -->
            </div>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Texpasport</span>
                </div>
                <input type="text" aria-label="First name"
                       class="form-control" placeholder="Daha dəqiq məlumat üçün">
            </div>

            <div class="input-group is-invalid mb-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="marka">Qebul etsin</label>
                </div>
                <select class="custom-select" id="" required>
                    <option value="">Magazalar</option>
                    <option value="">Oluxanalar</option>
                    <option value="">Hamisi</option>
                </select>

                <div class="input-group-prepend">
                    <label class="input-group-text" for="marka">Veziyeti</label>
                </div>
                <select class="custom-select" id="" required>
                    <option value="">Yeni</option>
                    <option value="">Az Islenmis</option>
                    <option value="">Islenmis</option>
                    <option value="">Normal</option>
                    <option value="">Kohne</option>
                </select>
            </div>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Təxmini qiymət</span>
                </div>
                <input type="text" aria-label="First name" class="form-control" placeholder="min AZN">
                <input type="text" aria-label="Last name" class="form-control" placeholder="max AZN">
            </div>

            <div class="form-group mb-2 d-inline-flex">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="city">Şəhər</label>
                </div>
                <select class="custom-select" id="city" required>
                    <option v-if="cities.length" v-for="city in cities" value="">{{ city.city }}</option>
                </select>

                <div class="custom-file col-3 p-2">
                    <input type="file" class="custom-file-input" id="customFileLangHTML">
                    <label class="custom-file-label pt-2 pl-2" for="customFileLangHTML" data-browse="Şəkil">
                        <span class="p-0 border-0 input-group-text bg-transparent">
                            <svg width="2.4em" height="2.4em" viewBox="0 0 16 16" class="bi bi-camera-fill mt-n2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                              <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                            </svg>
                        </span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Əlavə məlumat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"
                          placeholder="Satıcının sizi anlanması üçün məlumatı dəqiq və konkret yazın"></textarea>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "formDetails",
    props: ['cars','types','cities','years','motors'],
    data(){
        return {
            selectCar: '',
            selectModel: '',
            carTypeReturns: [],
            exampleCar: {name:'BMW'},
            exampleModel: [{name:'X5'}],
        }
    },
    methods: {
        carsSelect(){
            axios.post('cars/json-models', {id: this.selectCar})
                .then(types => {
                    this.carTypeReturns = [];
                    this.exampleCar = false;
                    this.exampleModel = false;
                    this.carTypeReturns.push(types.data.types)
                    console.log(this.exampleModel )
                })
                .catch(res => {
                    console.log(res.response.data.errors)
                })
        },
    },
    computed: {

    },
    mounted(){
        // this.carsSelect();
        console.log(this.exampleModel)
    }
}
</script>

<style scoped>

</style>
