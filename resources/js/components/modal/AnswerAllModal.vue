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
                            <span v-if="answer.spare_parts" class="text-black-50">
                                <span class="">
                                    {{ answer.created_at }}
                                </span>
                                <span class="ml-2">
                                    {{ answer.city }}
                                </span>
                            </span>
                            <span v-else class="letter__spacing">
                                Yox
                            </span>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-2 pb-1">
                        <table class="table table-bordered">
                            <tbody>

<!--                                <div v-if="answer.created_at" class="mr-3 mx-2 text-right text-black-50">-->
<!--                                    <span>-->
<!--                                        {{ answer.created_at }}-->
<!--    &lt;!&ndash;                                    {{ Illuminate\Support\Carbon::now()->diffForHumans($answer->created_at) }}&ndash;&gt;-->
<!--                                    </span>-->
<!--                                </div>-->

                                <tr v-if="answer.spare_parts" class="">
<!--                                    <td scope="row" class="text-right text-black-50 py-2">Ehtiyat hissəsi:</td>-->
                                    <td class="text-break text-center p-2" colspan="2">
                                        <div class="p-2 show__seller-text">
                                            {{ answer.spare_parts }}
                                        </div>
                                    </td>
                                </tr>

                                <tr v-if="answer.title">
                                    <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                                    <td class="text-break text-center py-2">{{ answer.title }}</td>
                                </tr>

                                <tr v-if="answer.marka && answer.model && answer.motor">
                                    <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                                    <td class="text-break text-center py-2">
                                        {{ answer.marka }}
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        {{ answer.model }}
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        {{ answer.motor }}
                                    </td>
                                </tr>

<!--                                <tr v-if="answer.model">-->
<!--                                    <td scope="row" class="text-right text-black-50 py-2">Model:</td>-->
<!--                                    <td class="text-break text-center py-2">{{ answer.model }}</td>-->
<!--                                </tr>-->

                                <tr v-if="answer.year">
                                    <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                                    <td class="text-break text-center py-2">{{ answer.year }}</td>
                                </tr>

<!--                                <tr v-if="answer.motor">-->
<!--                                    <td scope="row" class="text-right text-black-50 py-2">Motor:</td>-->
<!--                                    <td class="text-break text-center py-2">{{ answer.motor }}</td>-->
<!--                                </tr>-->

                                <tr v-if="answer.texpassport">
                                    <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                                    <td class="text-break text-center text-uppercase py-2 flash__texpass">
                                        {{ answer.texpassport }}
                                    </td>
                                </tr>

<!--                                <tr v-if="answer.city">-->
<!--                                    <td scope="row" class="text-right text-black-50 py-2">Şəhər:</td>-->
<!--                                    <td class="text-break text-center py-2">{{ answer.city }}</td>-->
<!--                                </tr>-->

                                <tr v-if="answer.image">
                                    <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                                    <td class="text-break text-center py-2">
                                        <img :src="'/images/users/announcement/'+answer.image" :alt="answer.image"
                                            class="modal__image"
                                        >
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

        }
    },
    methods:{

    },
    mounted(){

    }
}
</script>

<style scoped>

</style>
