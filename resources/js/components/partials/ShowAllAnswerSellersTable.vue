<template>
    <div class="container">
        <table class="table table-bordered">
            <tbody>
                <tr v-for="user in answer.user">
                    <td class="py-2">
                        <a href="" class="col-12 d-inline-flex pr-1" data-toggle="modal" :data-target="'show-'+answer.id">
                            <div class="text-left mt-2">
                                {{ user.name }}
                            </div>
                            <div v-if="user.image" class="text-right ml-auto">
                                <img :src="'http://avtolavka/images/users/sellers/id_'+ answer.id +'/'+ answer.image" alt="" class="show__seller-image">
                            </div>
                            <div v-else class="text-right ml-auto">
                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                            </div>
                        </a>
                    </td>

                <td>
                    <show-all-answer-sellers-answers-show-table
                        :answer="answer"
                    >
                    </show-all-answer-sellers-answers-show-table>
<!--                    @include('modals.show_all_answer_sellers_answers')-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "ShowAllAnswerSellersTable",
    props: ['answer'],
    data(){
        return {

        }
    },
    methods: {

    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
