<template>
    <div class="send__flash-image">
        <vue-picture-swipe
            :items="itemsFunc(announce.image)"
        ></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "SendFlashTableImageShow",
    props: ['announce'],
    data(){

    },
    methods: {
        itemsFunc(image){
            if( image != null ){
                return [{
                    src: '/images/users/announcement/orders/' + image,
                    thumbnail: '/images/users/announcement/orders/' + 'small_'+ image,
                    w:1200,
                    h:800,
                    alt: image
                }]
            }
        }
    }
}
</script>

<style scoped>

</style>
