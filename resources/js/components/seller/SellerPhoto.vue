<template>
    <div class="">
        <vue-picture-swipe
            id="swipe"
            :items="userPhoto"
        ></vue-picture-swipe>
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
                thumbnail: '/images/users/sellers/' + this.user.image,
                w:1200,
                h:800,
                alt: this.user.image
            }]
        }
    },
    mounted() {
        document.getElementById('swipe').firstChild.childNodes[0].classList.add('seller')
        document.getElementById('swipe')
                .firstChild.childNodes[0].childNodes[0].firstChild.classList.add('seller_img')

        console.log('AAABBB = ',  )
    }
}
</script>

<style scoped>
    .seller {
        width: 250px;
    }
</style>
