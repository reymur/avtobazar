<template>
    <div class="">
        <vue-picture-swipe
            :items="imageItems(sale)"
        ></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "CardImageSwipe",
    props: ['sale'],
    data(){
        return {
            host: window.location.host,
            protocol: window.location.protocol,
            url: this.host,
        }
    },
    methods: {
        imageItems(sale){
            if( sale.image != null ){
                return [{
                    src: '/images/sale/' + sale.image.title,
                    thumbnail: '/images/sale/' + sale.image.title,
                    w:1200,
                    h:800,
                    alt: sale.image.title
                }]
            }
        }
    },
    mounted(){
        console.log('IMAGE - ', this.sale.image )
    }
}
</script>

<style scoped>

</style>
