<template>
    <div class="">
        <vue-picture-swipe
            :items="imageItems(user)"
        ></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "CardImageSwipe",
    props: ['user'],
    data(){
        return {
            host: window.location.host,
            protocol: window.location.protocol,
            url: this.host,
        }
    },
    methods: {
        imageItems(image){
            if( image.image != null ){
                return [{
                    src: '/images/users/sellers/' + image.image,
                    thumbnail: '/images/users/sellers/' + 'small_'+ image.image,
                    w:1200,
                    h:800,
                    alt: image.image
                }]
            }
        }
    },
    mounted(){
        // console.log('Fiqure Select - ', this.user )
    }
}
</script>

<style scoped>

</style>
