<template>
    <div class="modal fade" id="staticBackdrop"
         data-backdrop="static" data-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <div class="row pl-2">
                        <p class="modal__main-title">Axtardığın Ehtiyyat Hissəsini TAP</p>
                    </div>

                    <!--MainCloseElement-->
                    <button @click="resetModal" type="button" class="close pt-4" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span><!--Close icon-->
                    </button>
                </div>

                <div class="modal-body pt-2">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <form-details
                                :user="user"
                                :cars="cars"
                                :types="types"
                                :cities="cities"
                                :years="years"
                                :motors="motors"
                                :fuelTypes="fuelTypes"
                            ></form-details>
                        </div>

                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <!--Form Simple-->
<!--                            <form-simple-->
<!--                                :cars="cars"-->
<!--                                :types="types"-->
<!--                                :cities="cities"-->
<!--                                :years="years"-->
<!--                                :motors="motors"-->
<!--                            ></form-simple>-->
                            <!--Form Details-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "index",
    props: ['user','cars','types','cities','years','motors','fuelTypes'],
    data(){
        return {
            resetModalDetails: 0
        }
    },
    methods: {
        resetModal(){
            this.resetModalDetails = 1;
            this.$root.$emit('remove', this.resetModalDetails);
        }
    },
    mounted(){
        // console.log()
    }
}
</script>

<style scoped>

</style>
