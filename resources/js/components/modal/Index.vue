<template>
    <div class="modal fade" id="staticBackdrop"
         data-backdrop="static" data-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <div class="row pl-2">
                        <div class="list-group" style="display:contents" id="list-tab" role="tablist">
                            <a class="col list-group-item p-2 list-group-item-action active"
                               id="list-home-list" data-toggle="list" href="#list-home"
                               role="tab" aria-controls="home">Sadə</a>

                            <a class="col list-group-item p-2 list-group-item-action"
                               id="list-profile-list" data-toggle="list" href="#list-profile"
                               role="tab" aria-controls="profile">Ətraflı</a>
                        </div>
                    </div>

                    <!--MainCloseElement-->
                    <button type="button" class="close pt-4" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pt-2">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <form-details
                                :cars="cars"
                                :types="types"
                                :cities="cities"
                                :years="years"
                                :motors="motors"
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
    props: ['cars','types','cities','years','motors'],
    mounted(){
        // console.log()
    }
}
</script>

<style scoped>

</style>
