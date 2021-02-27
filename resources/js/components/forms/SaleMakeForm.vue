<template>
    <div class="py-3 bg__color">
        <!--Details section-->
        <div class="d-block m-auto col-lg-10 col-xl-10 px-md-4 px-sm-4">
            <div class="form-group col-md-11 col-sm-12 pb-3 m-auto">
                <div class="d-lg-flex d-xl-flex">
                    <label for="sale-marka" class="col-lg-2 col-xl-2 text-lg-left pl-lg-0 pl-xl-0 mt-lg-2 mt-xl-2 mr-lg-3 mr-xl-3 mr-xl-3 pl-md-0 pl-sm-0">
                        Marka<span class="text-subtitle-2 text-danger">*</span>
                    </label>
                    <select @change="carTypes" v-if="cars != null && cars.length > 0"
                        class="form-control col-lg-8 col-xl-8"
                        v-model="marka" id="sale-marka">
                        <option :disabled="disabled_marka">{{ marka }}</option>
                        <option v-for="car in cars" v-if="car.name != marka" :value="car.name">
                            {{ car.name }}
                        </option>
                    </select>
                </div>

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-5 pl-lg-1 ml-xl-5 pl-xl-1 ml-md-0 pl-sm-0">
                        <div v-if="error.marka" class="d-block invalid-feedback ml-lg-4 ml-xl-5 mt-1">
                            {{ error.marka[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-11 col-sm-12 pb-3 m-auto">
                <div class="d-lg-flex d-xl-flex">
                    <label for="sale-model" class="col-lg-2 col-xl-2 pl-lg-0 pl-xl-0 mt-lg-2 mt-xl-2 mr-lg-3 mr-xl-3 mr-xl-3 pl-md-0 pl-sm-0">
                        Model<span class="text-subtitle-2 text-danger">*</span>
                    </label>
                    <select v-if="models != null && models.length > 0" v-model="model_m"
                        class="col-lg-8 col-xl-8 form-control" id="sale-model">
                        <option :disabled="disabled_model">{{ model_m }}</option>
                        <option v-for="model in model_types" v-if="model.title != model_m" :value="model.title">
                            {{ model.title }}
                        </option>
                    </select>
                </div>

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-5 pl-lg-1 ml-xl-5 pl-xl-1 ml-md-0 pl-sm-0">
                        <div v-if="error.model" class="d-block invalid-feedback ml-lg-4 ml-xl-5 mt-1">
                            {{ error.model[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-11 col-sm-12 pb-2 m-auto">
                <div class="d-lg-flex d-xl-flex">
                    <label for="condition" class="col-lg-2 col-xl-2 pl-lg-0 pl-xl-0 mt-lg-2 mt-xl-2 mr-lg-3 mr-xl-3 mr-xl-3 pl-md-0 pl-sm-0">
                        Vəziyyəti<span class="text-subtitle-2 text-danger">*</span>
                    </label>
                    <select @change="conditionChange" v-if="conditions != null && conditions.length > 0" v-model="condition_m"
                        class="col-lg-8 col-xl-8 form-control" id="condition">
                        <option :disabled="disabled_condition">{{ condition_m }}</option>
                        <option v-for="condition in conditions"
                                v-if="condition.title != condition_m && condition.id != 6"
                                :value="condition.title">
                            {{ condition.title }}
                        </option>
                    </select>
                </div>

                <div class="text-black-50 ml-lg-5 ml-xl-5 ml-md-0 ml-sm-0">
                    <small class="text-black-50 ml-lg-5 ml-xl-5 letter__spacing">
                        &nbsp;Ehtiyyat hissəsinin vəziyyəti
                    </small>
                </div>

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-5 pl-lg-1 ml-xl-5 pl-xl-1 ml-md-3 pl-sm-3">
                        <div v-if="error.condition" class="d-block invalid-feedback ml-lg-4 mt-1">
                            {{ error.condition[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-11 col-sm-12 pb-3 m-auto">
                <div class="d-lg-flex d-xl-flex">
                    <label for="title" class="col-lg-2 col-xl-2 px-lg-0 px-xl-0 px-md-0 px-sm-0 mt-lg-2 mt-xl-2 mr-lg-3 mr-xl-3 mr-xl-3 pl-md-0 pl-sm-0">
                        Elanın adı<span class="text-subtitle-2 text-danger">*</span>
                    </label>
                    <input v-model="title" type="text" class="col-lg-8 col-xl-8 orm-control mb-1" id="title" placeholder="">
                </div>

                <div class="text-black-50 ml-lg-5 ml-xl-5 ml-md-0 ml-sm-0 mt-n1">
                    <small class="text-black-50 ml-lg-5 ml-xl-5 letter__spacing">
                        &nbsp;Elanlın adı bölməsinə qiymət yazmayın!
                    </small>
                </div>

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-5 pl-lg-1 ml-xl-5 pl-xl-1 ml-md-0 pl-sm-0 mb-2">
                        <div v-if="error.title" class="d-block invalid-feedback ml-lg-4 ml-xl-5 mt-1">
                            {{ error.title[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-11 col-sm-12 pb-3 m-auto">
                <div class="d-flex">
                    <label for="price" class="pt-2 mr-3">
                        Qiymət, AZN<span class="text-left text-subtitle-2 text-danger">*</span>
                    </label>
                    <input v-model="price" type="text" class="col-2 form-control" id="price" placeholder="">
                </div>

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-5 pl-lg-1 ml-xl-5 pl-xl-1 ml-md-0 pl-sm-0">
                        <div v-if="error.price" class="d-block invalid-feedback ml-lg-4 ml-xl-5 mt-1">
                            {{ error.price[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-11 col-sm-12 pb-3 m-auto">
                <div class="d-lg-flex d-xl-flex">
                    <label for="city" class="col-lg-2 col-xl-2 pl-lg-0 pl-xl-0 mt-lg-2 mt-xl-2 mr-lg-3 mr-xl-3 pl-md-0 pl-sm-0">
                        Şəhər<span class="text-subtitle-2 text-danger">*</span>
                    </label>
                    <select v-if="cities != null && cities.length > 0" v-model="city_m"
                            class="form-control col-lg-8 col-xl-8" id="city">
                        <option selected>{{ city_m }}</option>
                        <option v-for="city in cities" v-if="city.city != 'Bakı'" :value="city.city">
                            {{ city.city }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-11 col-sm-12 pt-2 pb-3 m-auto">
                <div class="d-lg-flex d-xl-flex">
                    <label for="body" class="col-lg-2 col-xl-2 px-lg-0 px-xl-0 mt-lg-2 mt-xl-2 mr-lg-3 mr-xl-3 mr-xl-3 pl-md-0 pl-sm-0">
                        Məzmun<span class="text-subtitle-2 text-danger">*</span>
                    </label>
                    <textarea v-model="note" class="col-lg-8 col-xl-8 form-control mb-1" id="body" rows="6"></textarea>
                </div>

                <div class="text-black-50 ml-lg-5 ml-xl-5 ml-md-0 ml-sm-0">
                    <small class="text-black-50 ml-lg-5 ml-xl-5 ml-md-0 ml-sm-0 letter__spacing">
                        &nbsp;Məzmun bölməsinə qiymət yazmayın!
                    </small>
                </div>

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-5 pl-lg-1 ml-xl-5 pl-xl-1 ml-md-0 pl-sm-0">
                        <div v-if="error.note" class="d-block invalid-feedback ml-lg-4 ml-xl-5 mt-1">
                            {{ error.note[0] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Image Upload section-->
        <div class="col-lg-10 col-xl-10 col-md-12 col-sm-12 m-lg-auto m-xl-auto mt-4 mb-3 p-md-0 p-sm-0">
            <vue-image-upload
                :image_limit="image_limit"
                :image_errors="image_errors"
                @imageList="getImageList"
            ></vue-image-upload>
        </div><!--VueImageUpload-->

        <!--Name section-->
        <div class="form-group col-lg-10 col-xl-10 col-md-12 col-sm-12 m-lg-auto m-xl-auto px-md-4 px-sm-4 border border-info">
            <div class="form-group col-lg-7 col-xl-7 col-md-12 col-sm-12 m-lg-auto m-xl-auto pb-lg-3 pt-4">
                <label for="name">
                    Adınız<span class="text-subtitle-2 text-danger">*</span>
                </label>
                <input v-model="name" type="text" class="form-control" id="name" placeholder="">

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-0 pl-lg-0 ml-xl-0 pl-xl-0 ml-md-0 pl-sm-0">
                        <div v-if="error.name" class="d-block invalid-feedback ml-lg-0 ml-xl-0 mt-1">
                            {{ error.name[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-lg-7 col-xl-7 col-md-12 col-sm-12 m-lg-auto m-xl-auto pt-4 pt-md-2 pt-sm-2">
                <label for="phone">
                    Mobil nömrə<span class="text-subtitle-2 text-danger">*</span>
                </label>

                <div class="">
                    <div v-if="true" class="">
                        <div class="d-flex">
                            <input v-model="phone" type="text" class="form-control" id="phone-0" placeholder="">
                            <div @click="phoneNumberAdd" class="phone__number-add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                </svg>
                            </div>
                        </div>

                        <div id="num-add" class="">
<!--                            <div v-if="num > 0" :id="'del-'+num" class="d-flex">-->
<!--                                <input type="text" class="form-control" :id="'phone-'+num" placeholder="">-->
<!--                                <div @click="phoneNumberDel" class="phone__number-del">-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" className="bi bi-file-minus" viewBox="0 0 16 16">-->
<!--                                        <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>-->
<!--                                        <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>-->
<!--                                    </svg>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <div v-else class="">
                        <input v-model="phone" type="text" class="form-control" id="phone" placeholder="">
                    </div>
                </div>

<!--                <input-mask type="tel" v-model="phone" mask="999 99 99" maskChar=" " class="form-control"></input-mask>-->

                <div v-if="errors">
                    <div v-for="error in errors" class="ml-lg-0 pl-lg-0 ml-xl-0 pl-xl-0 ml-md-0 pl-sm-0">
                        <div v-if="error.phone" class="d-block invalid-feedback ml-lg-0 ml-xl-0 mt-1">
                            {{ error.phone[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-lg-7 col-xl-7 col-md-12 col-sm-12 m-lg-auto m-xl-auto pt-lg-4 pt-xl-4 pb-4 pt-md-2 pt-sm-2">
                <button @click="saleAnnounceMake" class="btn btn-success">Göndər</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SaleMakeForm",
    props:['user','cars','models','cities','conditions'],
    data(){
        return {
            marka: 'Markanı seçin',
            model_types: this.models,
            model_m: 'Modeli seçin',
            condition_m: this.conditions[0].title,
            city_m: this.cities[7].city,
            name: '',
            title: '',
            price: '',
            phone: [],
            phone2: [],
            phone_code: '',
            number_add: 0,
            add_num: 0,
            svg_add: '',
            note: '',
            fileList: [],
            disabled_marka: 'disabled',
            disabled_model: 'disabled',
            disabled_condition: 'disabled',
            errors: [],
            image_errors: [],
            image_errors_load: true,
            image_limit: 6,
        }
    },
    methods: {
        phoneNumberAdd(){
            let div = document.getElementById("num-add");
            let new_input = document.createElement("div");
            let new_del_btn = document.createElement("div");

            if( this.number_add < 4 ) {
                new_input.id = 'new-phone-' + this.number_add++;
                new_input.className = 'd-flex nums';
                new_del_btn.addEventListener('click', this.addFunc)
                new_input.innerHTML = "<input type='text' id=\"phone-num-"+this.number_add+"\" class='form-control'></div>"
                new_del_btn.innerHTML = "<div class='phone__number-del' id=\"number-del-"+this.number_add+"\">" +
                    "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"currentColor\" className=\"bi bi-file-minus\" viewBox=\"0 0 16 16\">" +
                    "<path d=\"M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z\"/>" +
                    "<path d=\"M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 " +
                    "1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z\"/></svg>"

                new_input.appendChild(new_del_btn);
                div.appendChild(new_input);

                let new_phone = document.getElementById("phone-num-"+ this.number_add ).value;

                console.log( 'add - ', this.number_add )
            }
        },
        addFunc(e){
            if( this.number_add !== 0 ) {
                let del_phone = e.target.parentElement.parentElement.parentElement.id;

                if( del_phone.indexOf("new-phone-") !== -1 ) {
                    this.number_add--;
                    e.target.parentElement.parentElement.parentElement.remove();
                    console.log('del - ', this.number_add )
                }
            }
        },
        phoneNumberDel(e){
            console.log(
                e.target
            )
        },
        refactImageErrors(){
            let i = 0;
            this.image_errors = [];

            if( this.errors.length > 0 ) {
                for (i; i < this.image_limit; i++) {
                    if (this.errors[0]['images.' + i] !== undefined) {
                        this.image_errors.push(this.errors[0]['images.' + i][0])
                    }
                    else if( this.errors[0]['images'] !== undefined ){
                        this.image_errors = [];
                        this.image_errors.push(this.errors[0]['images'][0]);
                    }
                }
            }

        },
        getImageList(imageList){
            this.fileList = [];
            imageList.forEach( file => {
                this.fileList.push(file.blob)
            })
        },
        saleAnnounceMake(){
            this.errors = [];
            let fd = new FormData();
            let phones = [];

            fd.append('marka', this.marka == 'Markanı seçin' ? '' : this.marka);
            fd.append('model', this.model_m == 'Modeli seçin' ? '' : this.model_m );
            fd.append('title', this.title);
            fd.append('condition', this.condition_m);
            fd.append('price', this.price);
            fd.append('city', this.city_m);
            fd.append('note', this.note);
            fd.append('name', this.name);
            fd.append('phone', this.phone);

                if( document.getElementsByClassName("nums" ) !== undefined &&
                    document.getElementsByClassName("nums" ) !== null )
                {
                    let nums = document.getElementsByClassName("nums" );

                    for( let i=0; i <= nums.length; i++ ) {
                        if( document.getElementsByClassName("nums" ) !== undefined ) {
                            if( document.getElementsByClassName("nums" )[i] !== undefined ) {
                                if( document.getElementsByClassName("nums" )[i].childNodes[0].value !== null &&
                                    document.getElementsByClassName("nums" )[i].childNodes[0].value !== undefined ) {
                                    phones[i] = document.getElementsByClassName("nums" )[i].childNodes[0].value;
                                }
                            }
                        }
                    }
                }

            console.log( phones );

            this.fileList.forEach( file => {
                fd.append('images[]', file );
            })

            axios.post('/announce/sale-announce-save', fd, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
             .then(res => {
                 if( res.status == 200 ){
                     console.log('res sale --- ', res.data )
                     window.location.href =
                         'http://avtolavka/announce/sale-flash-info?' +
                         'marka='+res.data.marka+'&pin='+res.data.pin+'&number='+res.data.number
                 }
             })
             .catch( err => {
                 if( err.response.data.errors !== undefined ){
                     let errors = err.response.data.errors;
                     this.errors.push( errors );
                     this.refactImageErrors();
                 }

                 console.log('err sale --- ', err.response.data.errors )
             })
        },
        carTypes(){
            let car_name = null;
            this.disabled_marka = false;
            this.disabled_model = false;

            this.cars.filter(car => {
                if(car.name == this.marka){
                    car_name = car.name;
                }
            });

            if( car_name != null ){
                axios.post('/cars/json-models', {name: car_name})
                     .then(res => {
                         if( res.status == 200 ){
                             if( res.data.types != null && res.data.types.length > 0 ){
                                 this.model_m = res.data.types[0].title;
                                 this.model_types = res.data.types;
                                 console.log('res === ', this.model_types)
                             }
                         }
                     })
                     .catch(err => {
                         console.log('err === ', err.response.data)
                     })
            }
            console.log('AAAAA - ', car_name)
        },
        conditionChange(){
            this.disabled_condition = false;
        }
    }
}
</script>

<style scoped>

</style>
