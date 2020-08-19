<template>
    <div class="">
        <button @click="closedAndResetModal" type="button"
                class="btn btn-secondary"
                data-dismiss="modal">Xeyir</button>
        <button @click="sendAnnouncement" type="button" class="btn btn-primary">Göndər</button>
    </div>
</template>

<script>
import formDetails from "./ModalFormDetails";

export default {
name: "modalFooter",
    props: ['formDetails'],
    methods: {
        closedAndResetModal(){
            this.formDetails.to = 1,
            this.formDetails.imageLoader = false,
            this.formDetails.texPass = true,
            this.formDetails.toloader = false,
            this.formDetails.img = null,
            this.formDetails.inputLoader = false,
            this.formDetails.priceLoader = false,
            this.formDetails.selectCar = '',
            this.formDetails.selectModel = '',
            this.formDetails.carTypeReturns = [],
            this.formDetails.exampleCar = {name:'BMW'},
            this.formDetails.exampleModel = [{name:'X5'}]
        },
        sendAnnouncement(){
            console.log('SSSSSSSS = ', this.formDetails.exampleCar )
        }
    },
    mounted() {
        console.log('BBB fff = ', this.formDetails )
    }
}
</script>

<style scoped>

</style>
