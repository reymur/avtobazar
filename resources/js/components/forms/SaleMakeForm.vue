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
                        <div class="">
                            <div class="d-flex">
                                <input v-model="phone" type="text" class="form-control" id="phone-0" placeholder="">
                                <div @click="phoneNumberInputAdd" class="phone__number-add">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                                        <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                    </svg>
                                </div>
                            </div>

                            <div v-if="phone_errors[0] !== undefined && phone_errors[0].match(/\d/) == 0 && phone_errors[0].indexOf('phones.') !== -1" class="mb-2">
                                <div v-if="phone_errors[0] !== null" class="d-block invalid-feedback mt-1 ml-md-3 ml-sm-3">
                                    {{ phoneErrorsReplace( phone_errors[0], 0 ) }}
                                </div>
                            </div>
                            <div v-else-if="phone_errors[0] !== undefined && phone_errors[0].indexOf('phones.') === -1" class="mb-2">
                                <div v-if="phone_errors[0] !== null" class="d-block invalid-feedback mt-1 ml-md-3 ml-sm-3">
                                    {{ replacePhoneOneError( this.phone_errors[0], 0 ) }}
                                </div>
                            </div>
                        </div>

                        <div id="num-add" class="">
<!--                            <div v-if="phone_errors.length > 1">-->
<!--                                <div v-for="error in phone_errors">-->
<!--                                    <div class="d-block invalid-feedback mt-1 ml-md-3 ml-sm-3">-->
<!--                                        {{ phoneErrorsReplace(error, 5) }}-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div v-else-if="phone_errors.length == 1">-->
<!--                                <div v-for="error in phone_errors" class="d-block invalid-feedback mt-1 ml-md-3 ml-sm-3">-->
<!--                                    {{ phoneErrorsReplace(error, phone_errors.length) }}-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <div v-else class="">
                        <input v-model="phone" type="text" class="form-control" id="phone" placeholder="">
                        <div v-if="phone_errors.length > 1">
                            <div v-for="error in phone_errors">
                                <div class="d-block invalid-feedback mt-1 ml-md-3 ml-sm-3">
                                    {{ phoneErrorsReplace(error, 5) }}
                                </div>
                            </div>
                        </div>
                        <div v-else-if="phone_errors.length == 1">
                            <div v-for="error in phone_errors" class="d-block invalid-feedback mt-1 ml-md-3 ml-sm-3">
                                {{ phoneErrorsReplace(error, phone_errors.length) }}
                            </div>
                        </div>
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
            phone: '',
            phone2: [],
            phones: [],
            phone_errors: [],
            phone_code: '',
            number_add: 1,
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
        phoneNumberInputAdd(){
            console.log('aaaaaaaa00000 --- ')

            let num_add = document.getElementById("num-add");
            let new_phone_parent = document.createElement("div");
            let new_phone = document.createElement("div");
            let new_del_btn = document.createElement("div");

            if( this.number_add < 5 ) {
                new_phone_parent.className = 'new-phone-parent';
                new_phone.id = 'new-phone';
                new_phone.className = 'd-flex nums';
                new_del_btn.addEventListener('click', this.delPhoneInput)
                new_phone.innerHTML = "<input type='text' id=\"phone-num\" class='form-control'></div>"
                new_del_btn.innerHTML = "<div class='phone__number-del' id=\"number-del\">" +
                    "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"currentColor\" className=\"bi bi-file-minus\" viewBox=\"0 0 16 16\">" +
                    "<path d=\"M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z\"/>" +
                    "<path d=\"M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 " +
                    "1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z\"/></svg>";

                new_phone.appendChild(new_del_btn);
                new_phone_parent.appendChild(new_phone);
                num_add.appendChild(new_phone_parent);

                this.number_add++;
            }
        },
        delPhoneInput(e){
            if( this.number_add !== 0 ) {
                let del_phone = e.target.parentElement.parentElement.parentElement.parentElement.className;

                if( del_phone.indexOf("new-phone-parent") !== -1 ) {
                    // this.getNewPhoneInputs();

                    e.target.parentElement.parentElement.parentElement.parentElement.remove();
                    console.log('del - ', this.number_add )
                    this.number_add--;
                }
            }
        },
        phoneNumberDel(e){
            console.log(
                e.target
            )
        },
        refactPhoneErrors(){
            this.phone_errors = [];

            if( this.errors.length > 0 ) {
                for (let i = 0; i < 5; i++) {
                    if (this.errors[0]['phones.' + i] !== undefined) {
                        this.phone_errors.push(this.errors[0]['phones.' + i][0])
                    }
                    else if( this.errors[0]['phones'] !== undefined ){
                        this.phone_errors = [];
                        this.phone_errors.push(this.errors[0]['phones'][0]);
                    }
                }

                // console.log( 'Phone = ', this.phone_errors );
            }
        },
        phoneErrorsReplace(error, num){
            let next_error = null;

            if( this.replaceLastLetter(error,num) !== undefined && this.replaceLastLetter(error, num) !== null ){
                next_error = this.replaceLastLetter(error, num);
            }

            console.log( 'Phone 333 = ', num );
            return next_error;
        },
        replaceLastLetter(error, num){
            let number_replace = '';
            let dot_replace = '';
            let error_org = '';
            console.log('ZZZZZ - ',num, error )
            if ( (error !== undefined && error !== null) && (num !== undefined && num !== null) ) {
                if ( error.indexOf('phones.'+num) !== undefined && error.indexOf('phones.'+num) !== null ) {
                    if( error.indexOf('phones.'+num) > -1 ) {
                        number_replace = error.replace( 'phones.'+num, 'phones.'+(num+1) );
                        dot_replace = number_replace.replace(
                            'phones.'+(num+1),
                            '"phones - '+(num+1)+'"'
                        );

                        return dot_replace;
                    }
                }
                else if( error.indexOf('phones') > -1 && error.indexOf('phones.') === -1 ){
                    error_org = error.replace('phones', '"phones"');
                    return error_org
                }
            }

            return null;
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
        getOnlyNumbers(str){
            let regexp = /\d/g;
            if( str.match( regexp ) ){
                return str.match( regexp ).join('') ;
            }

            return null;
        },
        phoneNumbers(){
            this.phones = [];
            let nums    = null;
            let phone   = null;
            let phone2  = null;

            if( document.getElementsByClassName("nums" ) !== undefined &&
                document.getElementsByClassName("nums" ) !== null ) {

                nums = document.getElementsByClassName("nums" );

                if( nums !== null && nums !== undefined && nums.length > 0 ) {
                    for( let i=0; i <= nums.length; i++ ) {
                        if( nums[i] !== null && nums[i] !== undefined ) {
                            if( nums[i].childNodes[0].value !== null &&
                                nums[i].childNodes[0].value !== undefined )
                            {
                                phone = nums[i].childNodes[0].value;
                                console.log( 'QQQQQQQQQQ = ', phone )
                                // if( this.getOnlyNumbers( phone ) ) {
                                    this.phones[i] = phone;
                                    // this.phones[i] = this.getOnlyNumbers( phone );
                                // }
                            }
                        }
                    }

                    if( /*this.getOnlyNumbers( this.phone ) &&*/ this.phones.length > 0 ) {
                        phone2 = this.phone;
                        // phone2 = this.getOnlyNumbers( this.phone );
                        this.phones.unshift( phone2 )
                        return this.phones;
                    }
                }
            }

            return this.getOnlyNumbers( this.phone );
        },
        saleAnnounceMake(){
            this.errors = [];
            let fd      = new FormData();
            this.phoneNumbers();

            fd.append('marka', this.marka == 'Markanı seçin' ? '' : this.marka);
            fd.append('model', this.model_m == 'Modeli seçin' ? '' : this.model_m );
            fd.append('title', this.title);
            fd.append('condition', this.condition_m);
            fd.append('price', this.price);
            fd.append('city', this.city_m);
            fd.append('note', this.note);
            fd.append('name', this.name);

            if( this.phoneNumbers() !== null ) {
                let phones = this.phoneNumbers();

                if( Array.isArray( phones ) ){
                    phones.forEach(num => {
                        fd.append('phones[]', num);
                    });
                }else{
                    fd.append('phones[]', phones);
                }
            }

            if( this.fileList !== null && this.fileList.length !== null ) {
                this.fileList.forEach( file => {
                    fd.append('images[]', file );
                })
            }

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
                     this.refactPhoneErrors();
                     this.addPhoneErrorsHtmlDivs();
                 }

                 console.log('err sale --- ', err.response.data )
             })
        },
        replacePhoneOneError( error, num ){
            if( error !== null && num !== null ) {
                if( error.indexOf('phones') !== -1 ) {
                    return error.replace('phones', 'phones - '+ num)
                }
                return null;
            }
            return null;
        },
        getErrorNumber(num){
            if( num !== null && num !== undefined ) {
                if (this.phone_errors[num] !== undefined && this.phone_errors[num] !== null) {
                    let err_dot = this.phone_errors[num].match(/\./)[0];
                    let err_num = this.phone_errors[num].match(/\d/)[0];

                    if (err_dot && err_num) {
                        return err_num
                    }

                    return null;
                }

                return null;
            }

            return null;
        },
        getErrorInputNumber(){
            let arr = [];
            let err_class = document.getElementsByClassName('error-class');
            let arr_errors = Array.prototype.slice.call(err_class);

            if( arr_errors !== null && arr_errors !== undefined ) {
                if( arr_errors.length !== null && arr_errors.length !== undefined ) {
                    for( let i = 0; i < arr_errors.length; i++ ) {
                        if( arr_errors[i] !== null && arr_errors[i] !== undefined ) {
                            if( arr_errors[i].id !== null && arr_errors[i].id !== undefined ) {
                                arr.push(arr_errors[i].id);
                            }
                        }
                    }

                    return arr_errors;
                }

                return null;
            }

            return null;
        },
        delIfExists(id, err_num){
            let exists = id;

            console.log('Exists = ', id)
            if( id !== null ) {
                // exists = document.getElementById()

                if( document.getElementById(id) !== undefined && document.getElementById(id) !== null ) {
                    let el = document.getElementById(id);
                    console.log('VCCC = ', el )
                    if (el !== null) {
                        el.remove();
                    }
                }
            }
        },
        delIfNotError(div, error){
            if( (div !== undefined && div !== null) && error !== undefined && error !== null ) {
                if( error.length !== undefined && error.length !== null ) {
                    let error_num_arr = [];
                    let div_num_arr = [];

                    for(let i=0; i < error.length; i++) {
                        let error_num = error[i].match(/\d/);

                        if( error_num !== undefined && error_num !== null ) {
                            if( error_num[0] !== undefined && error_num[0] !== null ) {
                                if( error_num[0] > 0 ) {
                                    error_num_arr.push(error_num[0]);
                                }
                            }
                        }
                    }

                    if (div.length !== undefined && div.length !== null) {
                        for (let j = 0; j < div.length; j++) {
                            if (div[j].lastChild !== undefined && div[j].lastChild !== null) {
                                let div_err = div[j].lastChild;

                                if (div_err.id !== undefined && div_err.id !== null) {
                                    let err_id = div_err.id;

                                    if (err_id.match(/\d/) !== null && err_id.match(/\d/) !== undefined) {
                                        let err_id_num = err_id.match(/\d/)[0];

                                        div_num_arr.push(err_id_num);
                                        // if (Number(error_num[0]) == Number(err_id_num)) {
                                        //
                                        //     is_has_num.push( Number(err_id_num) );
                                        //
                                        //     // if (document.getElementById('error-parent-' + err_id_num) !== null) {
                                        //     //     document.getElementById('error-parent-' + err_id_num).remove();
                                        //     //     console.log('DIV = ', Number(error_num[0]), Number(err_id_num))
                                        //     // }
                                        // }
                                    }
                                }
                            }
                        }
                    }

                    error_num_arr.filter(function(a){
                        for (let i=0; i < div_num_arr.length; i++ ) {
                            if( a == div_num_arr[i] ) {
                                return delete div_num_arr[i]
                            }
                        }
                    })

                    for (let i=0; i < div_num_arr.length; i++ ) {
                        if( div_num_arr[i] !== undefined && div_num_arr[i] !== null ) {
                            document.getElementById('error-parent-'+div_num_arr[i]).remove();
                        }
                    }

                    console.log('DIV2 = ', div_num_arr )

                    // div_num_arr.filter( x => {
                    //     console.log('DIV2 = ', error_num_arr.includes(x) )
                    //
                    //     // if (document.getElementById('error-parent-' + x) !== null) {
                    //     //     return document.getElementById('error-parent-' + x).remove();
                    //     //     // console.log('DIV = ', x)
                    //     // }
                    // });

                    // console.log('div_num_arr = ', arr);
                }
            }
        },
        deleteDublicateErrorInputs(id, errors){
            let id_num     = id ? id.substr(-1,1) : id;
            let not_exists = null;
            let error_parent = null;
            let new_phone_parent = document.getElementsByClassName('new-phone-parent');
            let arr = Array.prototype.slice.call(new_phone_parent);
            console.log('TTTTT= = ',id_num)

            if( arr !== null && arr !== undefined ) {
                if( arr.length !== null && arr.length !== undefined ) {
                    for( let i=0; i < arr.length; i++ ) {
                        if( arr[i].lastChild !== null ) {
                            if( arr[i].lastChild.id !== null && arr[i].lastChild.id !== undefined ) {

                                for( let i = 1; i < 5; i++ ) {
                                    let error_parent_num = document.getElementById('error-parent-'+i);

                                    if( error_parent_num !== null ) {
                                        if(  Number(error_parent_num.id !== null ) ) {
                                            let id_num = Number(error_parent_num.id.substr(-1, 1));

                                            if( id_num > Number(arr.length) ) {
                                                if( document.getElementById('error-parent-'+ id_num) ) {
                                                    document.getElementById('error-parent-' + id_num ).remove();
                                                }
                                            }
                                        }
                                    }
                                }

                                // if( arr_id.match(/\d/) !== null && arr_id.match(/\d/) !== undefined ) {
                                //     if( arr_id.match(/\d/)[0] !== null && arr_id.match(/\d/)[0] !== undefined ) {
                                //         let el_num = arr_id.match(/\d/)[0];
                                //
                                //
                                //
                                //         for( let j=0; j < errors.length; j++ ) {
                                //             if( this.getErrorNumber(j) != 0 ) {
                                //                 let err_num = this.getErrorNumber(j);
                                //                 console.log('REMOVED = ', j, ' - ', el_num, err_num);
                                //                 if (err_num != el_num) {
                                //                     not_exists = err_num;
                                //                     // arr[i].lastChild.remove();
                                //                 }
                                //             }
                                //         }
                                //
                                //         if( not_exists == el_num ) {
                                //             let remove_el_id = (Number(el_num) - 1);
                                //
                                //             if( arr[i].lastChild !== null && arr[i].lastChild !== undefined ) {
                                //                 let remove_el = document.getElementById('error-parent-'+Number(remove_el_id));
                                //
                                //                 if( remove_el !== null && remove_el !== undefined ) {
                                //                     remove_el.remove();
                                //                     console.log('NOT - ', not_exists, el_num, remove_el );
                                //                 }
                                //             }
                                //         }
                                //     }
                                // }
                            }
                        }
                    }
                }

                return null;
            }

            return null;
        },
        deleteAllErrorInputs(errors){
            let remove_el = document.getElementsByClassName('error-class');
            let arr = Array.prototype.slice.call(remove_el);

            if( arr != null && arr ) {
                if( arr.length !== null && arr.length !== undefined ) {
                    if( arr.length > 0 ) {
                        if( errors !== null ) {
                            if( errors.length > 0 && errors.length < 2 ) {
                                if( errors[0].match(/\./) !== null && errors[0].match(/\d/) !== null ) {
                                    let err_num = errors[0].match(/\d/);

                                    if( err_num[0] !== null ) {
                                        if( err_num[0] == 0 ) {

                                            for(let i=0; i < arr.length; i++ ) {
                                                let del = document.getElementsByClassName('error-class')[i];

                                                if( del !== null && del !== undefined ) {

                                                    del.remove();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        getAllPhoneParents(){
            let el = null;

            if( document.getElementsByClassName('new-phone-parent') !== undefined &&
                document.getElementsByClassName('new-phone-parent') !== null) {

                let el = document.getElementsByClassName('new-phone-parent');
            }

            // console.log('AAAAAA --- ', document.getElementsByClassName('new-phone-parent') );
            return document.getElementsByClassName('new-phone-parent');
        },
        addPhoneErrorsHtmlDivs(){
            let allPhones = this.getAllPhoneParents();

            // console.log('DDDDd = ', allPhones.length)
            console.log('QQQQQQQQQQ11111112222 = ', allPhones )
            //
            if( allPhones !== null && allPhones.length !== null ) {
                if( this.phone_errors.length !== null && this.phone_errors.length > 0 ) {
                    for( let i=0; i < allPhones.length; i++ ) {
                        if (this.phone_errors.length < 2 && this.phone_errors[0] !== null) {
                            if (this.phone_errors[0].indexOf('phones.') === -1) {
                                this.delIfExists("error-parent" );
                                let phone_error_parent_div = document.createElement("div");
                                let phone_error_div = document.createElement("div");

                                phone_error_parent_div.id = "error-parent";
                                phone_error_div.className = "d-block invalid-feedback mt-1 ml-md-3 ml-sm-3";
                                phone_error_div.innerHTML = this.replacePhoneOneError(this.phone_errors[0], (i + 2));
                                phone_error_parent_div.appendChild(phone_error_div);
                                allPhones[i].appendChild(phone_error_parent_div);
                            }
                        }
                    }

                    if( this.phone_errors[0].match(/\./) !== null && this.phone_errors[0].match(/\d/) !== null ){
                        for( let j=0; j < this.phone_errors.length; j++ ) {
                            let if_has_dot = this.phone_errors[j].match(/\./);
                            let error_num = this.phone_errors[j].match(/\d/);

                            if( Number(error_num[0]) > 0 ) {
                                if( document.getElementById("new-phone-parent") !== undefined ) {
                                    this.deleteDublicateErrorInputs( "error-parent-"+ Number(error_num), this.phone_errors );
                                    this.delIfExists("error-parent-"+ Number(error_num[0]), this.phone_errors );

                                    console.log('SXXXX - ', allPhones.length , this.phone_errors.length )

                                    if( allPhones.length == this.phone_errors.length ) {
                                        console.log('ERRRR111 - ', Number(error_num))
                                        let phone_error_parent_div = document.createElement("div");
                                        let phone_error_div = document.createElement("div");

                                        phone_error_parent_div.id = "error-parent-"+ Number(error_num);
                                        phone_error_parent_div.className = "error-class";
                                        phone_error_div.className = "d-block invalid-feedback mt-1 ml-md-3 ml-sm-3";
                                        phone_error_div.innerHTML =
                                            this.phoneErrorsReplace(this.phone_errors[j], Number(error_num) );

                                        phone_error_parent_div.appendChild(phone_error_div);

                                        allPhones[j].appendChild(phone_error_parent_div);
                                    }
                                    else {
                                        let phone_error_parent_div = document.createElement("div");
                                        let phone_error_div = document.createElement("div");

                                        console.log('WQ - ', !(Number(error_num[0]) < 0) )

                                        phone_error_parent_div.id = "error-parent-"+ Number(error_num);
                                        phone_error_parent_div.className = "error-class";
                                        phone_error_div.className = "d-block invalid-feedback mt-1 ml-md-3 ml-sm-3";
                                        phone_error_div.innerHTML =
                                            this.phoneErrorsReplace(this.phone_errors[j], Number(error_num) );

                                        phone_error_parent_div.appendChild(phone_error_div);

                                        if( !(Number(error_num[0]) < 0) ) {
                                            let a = allPhones[error_num - 1].appendChild(phone_error_parent_div);
                                        }
                                    }
                                }
                            }
                            this.deleteAllErrorInputs(this.phone_errors);
                        }

                        this.delIfNotError(allPhones, this.phone_errors);
                    }
            }
        }

            // new_error_div.innerHTML = () => {
            //     if( this.phone_errors.length > 0 ) {
            //         "<div className=\"d-block invalid-feedback mt-1 ml-md-3 ml-sm-3\">"+
            //         this.phoneErrorsReplace( this.phone_errors[0], this.phone_errors.length) +
            //         "</div>"
            //     }
            // }
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
