<template>
    <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
        <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
            <user-left-side-bar
                :auth_user="auth_user"
                :auth_check="auth_check"
                :auth_user_get_sends="auth_user_get_sends"
                :orders="orders"
                :new_orders="new_orders"
                :reset_answers="reset_answers"
            ></user-left-side-bar>
        </div>

        <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0 pb-3 flash__bg border-left border-white">
            <div class="col-12 p-md-2 p-sm-0 mt-4 flash__bg">
                <div class="ml-5 mb-3">
                    <h5 class="text-uppercase send__title ml-4">Cavablar</h5>
                </div>

                <div class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                    <div v-if="answers_all != null" class="">
                        <div class="row mb-4 ml-1">
                            'partials.answer_count_show'
                        </div>

                        <div v-if="answers_all.length > 0" class="">
                            <answer-all-announce @resetAnswersInUserSideBarSex="resetAnswersInUserSideBarSeven"></answer-all-announce>
                        </div>
                        <div v-else class="">
                            <span class="">Yox</span>
                        </div>
                    </div>

                    <h3 v-else class="text-center not__announce">Elan tapılmadı!</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowAllAnswerSellersTable",
    props: [
        'answers_all', 'auth_user',
        'auth_check', 'new_orders',
        'orders', 'auth_user_get_sends'
    ],
    data(){
        return {
            reset_answers: null,
        }
    },
    methods: {
        resetAnswersInUserSideBarSeven(answer_id){
            if( answer_id != null ) {
                return this.reset_answers = answer_id.answer_id;
            }
        },
    },
    computed:{

    },
    mounted() {

    }
}
</script>

<style scoped>

</style>


