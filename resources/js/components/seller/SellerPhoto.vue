<template>
    <div class="">
        <vue-picture-swipe :items="userPhoto"></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "SellerPhoto",
    props: ['user'],
    data(){
        return {
            image_path: '/images/users/sellers/',
            photo: this.user.image,
            userPhoto: [{
                src: '/images/users/sellers/' + this.user.image,
                thumbnail: '/images/users/sellers/' + 'small_'+this.user.image,
                w:1200,
                h:800,
                alt: this.user.image
            }]
        }
    },
    mounted() {
        console.log('PPPPPPP = ', this.image_path + this.user.image)
    }
}
</script>

<style scoped>

</style>
