<template>
    <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
        <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
            <user-left-side-bar
                :auth_user="auth_user"
                :auth_check="auth_check"
                :auth_user_get_sends="auth_user_get_sends"
                :orders_count="orders"
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
                            <answer-count-show
                                :reset_answers="reset_answers"
                                :modal_is_visible="modal_is_visible"
                                @showOnlyNewAnswersInParent="showOnlyNewAnswersParent"
                                @showAllAnswersInParent="showAllAnswersParent"
                            ></answer-count-show>
                        </div>

                        <div v-if="answers_all.length > 0" class="">
                            <answer-all-announce
                                :showOnlyNewAnswers="showOnlyNewAnswers"
                                :collAnsweredUsersFilter="collAnsweredUsersFilter"
                                :showAllAnswers="showAllAnswers"
                                @resetAnswersInUserSideBarSex="resetAnswersInUserSideBarSeven"
                                @modalIsVisibleThree="modalIsVisibleFour"
                            ></answer-all-announce>
                        </div>

                        <div v-else class="p-4">
                            <h4 class="text-center letter__spacing">
                                Cavab tapılmadı!
                            </h4>
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
            showOnlyNewAnswers: true,
            showAllAnswers: false,
            collAnsweredUsersFilter: true,
            loader: false,
            modal_is_visible: false,
        }
    },
    methods: {
        showOnlyNewAnswersParent(){
            this.showOnlyNewAnswers = true;
            this.collAnsweredUsersFilter = true;
            this.showAllAnswers = false;
        },
        showAllAnswersParent(){
            this.showOnlyNewAnswers = false;
            this.collAnsweredUsersFilter = false;
            this.showAllAnswers = true;
        },
        resetAnswersInUserSideBarSeven(answer){
            if( answer.id != null ) {
                this.reset_answers = answer.id;
            }
        },
        modalIsVisibleFour(el){
            if( el.data !== undefined ) {
                this.modal_is_visible = el.data;
            }
        },
    },
    computed:{

    },
    created() {
        sessionStorage.clear()
    },
    mounted() {
        console.log('>>>>>>>>>>>')
    }
}
</script>

<style scoped>

</style>


