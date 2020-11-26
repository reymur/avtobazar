<template>
    <div class="">
        <div v-if="imageLoader" class="mb-5 text-center seller__image-edit-div">
<!--            <vue-picture-swipe-->
<!--                :items="image_name"-->
<!--            ></vue-picture-swipe>-->
            <div v-if="loader" class="spinner-border spinner-border-md" role="status" aria-hidden="true"></div>

            <img v-else :src="img" id="image1" class="seller__image-edit" alt="Image">
        </div>
        <div v-else class="mb-5 seller__image-edit-div">
            <div class="">
                <img :src="'/images/users/sellers/'+auth_user.image" class="seller__image-edit" alt="Image">
            </div>
        </div>

        <div class="text-center mt-4 mb-5">
            <input @change="fileSelect" type="file" value="file" class="">
        </div>

        <div v-if="errors.length" class="my-4">
            <div v-for="error in errors" class="alert alert-danger">
                {{ error.image[0] }}
            </div>
        </div>

       <div class="text-center">
           <button @click="saveUserPhoto" :disabled="disabled" class="btn btn-success ml-3">
               <span v-if="loader" class="">
                   Bəli
                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               </span>
               <span v-else class="letter__spacing">Bəli</span>
           </button>

           <a :href="'/seller/profile/'+auth_user.id" class="btn btn-secondary ml-2">
               <span class="letter__spacing">Xeyir</span>
           </a>
       </div>
    </div>
</template>

<script>
export default {
    name: "SellerPhotoEdit",
    props: ['auth_user','slug'],
    data(){
        return {
            slug_name: this.slug,
            image_name: null,
            image: null,
            img: null,
            imageLoader: null,
            loader: false,
            disabled: false,
            errors: [],
        }
    },
    methods:{
        fileSelect(e){
            this.loader = true;
            let file = (e.target.files || e.dataTransfer.files)[0];

            if( file ){
                this.imageLoader = true;
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.img = e.target.result
                }
                reader.readAsDataURL(file);

                this.loader = false;
                return this.image = file;
            }
        },
        saveUserPhoto(){
            this.loader = true;
            this.disabled = 'disabled';
            const formData = new FormData();
            formData.append('image', this.image)

            axios.post('/seller/save-user-photo',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                 .then( res => {
                     if( res.status == 200 ){
                         if( res.data == 'image is updated' ){
                             window.location.href = '/seller/profile/'+ this.auth_user.id
                             this.loader = false;
                             this.disabled = false;
                         }
                         console.log('1111111111 = ', res.data )
                     }
                 })
                 .catch( err => {
                     if( err.response.data.errors !== undefined ){
                         if( err.response.data.errors !== undefined ) {
                             this.errors.push( err.response.data.errors );
                             this.loader = false;
                             this.disabled = false;
                         }
                     }
                 })
        }
        // userPhoto(image){
        //     if( image != null ) {
        //         const img = image;
        //         this.image_name = [{
        //             src: '/images/users/sellers/' + img,
        //             thumbnail: '/images/users/sellers/' + 'small_' + img,
        //             w: 1200,
        //             h: 800,
        //             alt: img
        //         }]
        //     }
        // }
    },
    mounted() {
        this.img = this.auth_user.image;
        console.log('UUUUUUUU = ', this.auth_user.image )
    }
}
</script>

<style scoped>

</style>
