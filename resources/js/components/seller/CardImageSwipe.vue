<template>
    <div class="">
        <vue-picture-swipe
            :items="imageItems(announce)"
        ></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "CardImageSwipe",
    props: ['announce'],
    data(){
        return {
            host: window.location.host,
            protocol: window.location.protocol,
            url: this.host,
        }
    },
    methods: {
        imageItems(announce){
            if( announce.image != null ){
                return [{
                    src: '/images/users/sellers/' + announce.image,
                    thumbnail: '/images/users/sellers/' + 'small_'+ announce.image,
                    w:1200,
                    h:800,
                    alt: announce.image
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
