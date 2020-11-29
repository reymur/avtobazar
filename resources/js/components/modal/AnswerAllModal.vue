<template>
    <div class="">
        <!-- Button trigger modal -->
        <a href="" class="" data-toggle="modal" :data-target="'#send_all-'+answer.id">
            {{ answer.spare_parts }}
        </a>

        <!-- Modal -->
        <div class="modal fade" :id="'send_all-'+answer.id" tabindex="-1" :aria-labelledby="'send_all-'+answer.id" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" :id="'send_all-'+answer.id">
                            <span class="mr-0">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </span>

                            <span  v-if="answer.get_sender" class="">
                                {{ answer.get_sender.name ? answer.get_sender.name : '' }}
                                {{ answer.get_sender.autoNumber ? answer.get_sender.autoNumber : '' }}
                            </span>
                        </h5>


                            <span v-if="answer.spare_parts" class="text-black-50 mt-1 ml-4">
                                <span class="">
                                    {{ answer.created_at ? answer.created_at : 'Yox' }}
                                </span>
                                <span class="ml-2">
                                    {{ answer.city ? answer.city : 'Yox' }}
                                </span>
                            </span>
                            <span v-else class="letter__spacing">
                                Yox
                            </span>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-2 pb-1">
                        <table class="table table-bordered">
                            <tbody>
                                <tr v-if="answer.spare_parts" class="">
                                    <td class="text-break text-center p-2" colspan="2">
                                        <div class="p-2 show__seller-text">
                                            {{ answer.spare_parts ? answer.spare_parts : 'Yox' }}
                                        </div>
                                    </td>
                                </tr>

                                <tr v-if="answer.marka && answer.model && answer.motor">
                                    <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                                    <td class="text-break text-center py-2">
                                        {{ answer.marka ? answer.marka : 'Yox' }}
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        {{ answer.model ? answer.model : 'Yox' }}
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        {{ answer.motor ? answer.motor : 'Yox' }}
                                    </td>
                                </tr>

                                <tr v-if="answer.year">
                                    <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                                    <td class="text-break text-center text-uppercase py-2 flash__texpass">
                                        {{ answer.year ? answer.year: 'Yox' }}
                                    </td>
                                </tr>

                                <tr v-if="answer.get_fuel_type">
                                    <td scope="row" class="text-right text-black-50 py-2">Yanacaq növü:</td>
                                    <td class="text-break text-center py-2 flash__texpass">
                                        {{ answer.get_fuel_type.title ? answer.get_fuel_type.title : 'Yox' }}
                                    </td>
                                </tr>

                                <tr v-if="answer.get_condition">
                                    <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                                    <td class="text-break text-center py-2 flash__texpass">
                                        {{ answer.get_condition.title ? answer.get_condition.title : 'Yox' }}
                                    </td>
                                </tr>

                                <tr v-if="answer.texpassport">
                                    <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                                    <td class="text-break text-center text-uppercase py-2 flash__texpass">
                                        {{ answer.texpassport ? answer.texpassport: 'Yox' }}
                                    </td>
                                </tr>

                                <tr v-if="answer.image">
                                    <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                                    <td class="text-break text-center py-2">
                                        <div class="answer__all-modal-image">
                                             <vue-picture-swipe
                                                 :items="imageItems(answer.image)"
                                                 :options="{
                                                    clickToCloseNonZoomable: false,
                                                }"
                                             ></vue-picture-swipe>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="modal-footer py-1">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "AnswerAllModal",
    props: ['answer'],
    data(){
        return {
            image_path: '/images/users/announcement/orders/',

        }
    },
    methods:{
        imageItems(image){
            return [{
                src: this.image_path + image,
                thumbnail: this.image_path + 'small_'+image,
                w: 1200,
                h: 800,
                alt: image
            }]
        }
    },
    mounted(){
        console.log('IIIIIIIIII - ', this.answer.get_sender)
    }
}
</script>

<style scoped>

</style>
