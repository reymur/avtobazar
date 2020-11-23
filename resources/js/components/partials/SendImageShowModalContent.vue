<template>
    <div class="">
        <vue-picture-swipe
            class="flash__image"
            :items="items"
            :options="{
                    clickToCloseNonZoomable: false,
                }"
        ></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "SendImageShowModalContent",
    props: ['path','data'],
    data(){
        return {
            items: [{
                src: this.path + this.data.image,
                thumbnail: this.path + 'small_'+this.data.image,
                w: 1200,
                h: 800,
                alt: this.data.image
            }]
        }
    }
}
</script>

<style scoped>

</style>
