<template>
    <div class="modal fade" id="sellerModalComponent"
         data-backdrop="static" data-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <div class="row pl-2">
                        <div class="list-group" style="display:contents" id="list-tab" role="tablist">
                            <span>Elanım</span>
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
                            AAAAAAAAAAAAAAAA
                        </div>
                    </div>
                </div>

                <div class="modal-footer p-0 mr-2">
                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">Xeyir</button>
                    <button type="button" class="btn btn-primary">Göndər</button>
                </div><!-- End Göndər button -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "Saller"
}
</script>

<style scoped>

</style>
