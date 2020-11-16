<template>
    <div class="">
        <!-- Button trigger modal -->
        <a href="" @click="showSellers()" class="p-1" data-toggle="modal" :data-target="'#show_all_sellers-'+answer.id">
            <span v-if="(not_seen != null && not_seen.length > 0) && client_for_seen == null" class="">
                <span class="badge badge-success">
                    {{ not_seen.length }}
                </span>
                <span class="text-primary">
                    Cavab
                </span>
            </span>
            <span v-else class="">
                <span class="badge badge-secondary">
                    {{ answer_seen.length }}
                </span>
                <span class="text-secondary">
                    Baxılıb
                </span>
            </span>
        </a>

        <!-- Modal -->
        <div class="modal fade" :id="'show_all_sellers-'+answer.id" tabindex="-1" data-backdrop="static" data-keyboard="false" :aria-labelledby="'show_all_sellers-'+answer.id" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" :id="'show_all_sellers-'+answer.id">
                            <span class="mr-0">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </span>
                            <span class="text-uppercase letter__spacing">
                                <span class="">{{ answer_users.length }}</span>
                                 Cavab
                            </span>
                        </h6>

                        <button @click="closeButton" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-2 pb-1 px-0">
                        <table class="table table-bordered">
                            <tbody>
                                <tr v-if="loader">
                                    <td class="p-3 d-flex text-center m-auto border-0">
                                        <div class="m-auto">
                                            <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span v-if="loader" class="pl-2 letter__spacing">Gözlə...</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr v-if="!loader && answered_users != null && answered_users.length && user_click">
                                    <td v-if="loader" class="p-3 d-flex text-center mb-3 show__seller-text">
                                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span v-if="loader">Gözlə...</span>
                                    </td>
                                    <td v-if="!loader" class="text-center border-0 d-flex p-3 mb-3 show__seller-text">
                                        <div class=" m-auto">
                                            {{ answer.spare_parts }}
                                        </div>
                                    </td>
                                    <td v-for="seller in answered_users" class="pt-0 pb-1 pr-0 d-flex">
                                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span v-if="loader">Gözlə...</span>

                                        <div v-if="!loader" class="col-4 text-left pl-1 mt-3">
                                            <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span v-if="loader">Gözlə...</span>

                                            <a href="" class="pb-2 answer__seller">
                                            <span v-if="seller.name" class="d-flex pl-2">
                                                {{ seller.name }}
                                            </span>
                                            </a>

                                            <div class="d-flex answer__phone-div">
                                                <a v-if="seller.phone" :href="'tel:'" class="answer__phone-a">
                                                    <span class="pr-1">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-forward-fill text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </span>

                                                    {{ seller.phone }}
                                                </a>
                                            </div>
                                        </div>
                                        <div v-if="seller.id && answer.id" class="col-8 text-right ml-auto pl-0 pr-0">
                                            <show-all-answer-sellers-answers-show-table
                                                :answer_users="answer_users"
                                                :answer_id="answer.id"
                                                :seller_id="seller.id"
                                                :close_modal="close_modal"
                                                @resetAnswersInUserSideBarOne="resetAnswersInUserSideBarTwo"
                                            >
                                            </show-all-answer-sellers-answers-show-table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="modal-footer py-1">
                            <button @click="closeButton" type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowAllAnswerSellers",
    props: ['answer','new_answers_count','answer_users','collAnsweredUsersFilter'],
    data(){
        return {
            answered_users: [],
            filtered_answer_users: 0,
            show_count: true,
            is_seen: [],
            not_seen: [],
            seen_null_update:[],
            answer_seen: this.answer_users,
            client_for_seen: null,
            errors: null,
            loader: false,
            user_click: false,
            close_modal: false,
            open_modal_window: false,
            count: null,
            show_only_new_answers: [],
            answeredUsersFilterParam: false,
            show_new_answer_count: [],
        }
    },
    methods:{
        answeredUsersFilter(answer, only_new_answers){
            let arr = [];
            let new_answers = [];
            let old_answers = [];
            this.filtered_answer_users = [];

            if( answer.user != null ){
                answer.user.forEach((user) => {
                    answer.get_is_answers.forEach((getisanswers) => {
                        if( user.id == getisanswers.user_id ){
                            if ( getisanswers.seen == null ) new_answers.push(user)
                            if ( getisanswers.seen != null ) old_answers.push(user)
                        }
                    });
                });

                if( only_new_answers )
                    return this.filtered_answer_users = arr.concat(new_answers);
                else return this.filtered_answer_users = arr.concat(new_answers, old_answers);
            }
        },
        showAnsweredUsers(){
            if( this.filtered_answer_users.length > 0 ){
                this.loader = true;
                this.answered_users = [];

                this.filtered_answer_users.forEach(( user ) => {
                    setTimeout(() => {
                        this.answered_users.push(user);
                        this.loader = false;
                    },100);
                });
            }
        },
        showSellers(){
            this.$emit('modalIsVisibleOne',{
                data: 1
            });

            if( this.answeredUsersFilterParam === true ) {
                this.answeredUsersFilter(this.answer, true);
            }
            else this.answeredUsersFilter(this.answer, false);

            this.user_click = true;
            this.showAnsweredUsers();
        },
        resetAnswersInUserSideBarTwo(answer){
            if( answer.id != null ) {
                this.$emit('resetAnswersInUserSideBarThree', {
                    id: answer.id
                });
            }
        },
        getAnswerSeen(){
            const answer_id = this.answer.id;
            const answers = this.new_answers;

            if( answers != null ){
                if( answers != null && answers.length != null && answers.length > 0 ){
                    answers.filter( answer => {
                        if( answer.id == answer_id ){
                            this.not_seen.push(answer);
                            this.is_seen.push(this.not_seen)
                        }
                    });
                }
            }
            else{
                if( this.answer_users.length > 0 ){
                    this.answer_users.filter( val => {
                        if( val.seen != null ){
                            this.is_seen.push(val);
                        }else{
                            this.not_seen.push(val);
                        }
                    });
                }
            }
        },
        closeButton(){
            this.$emit('modalIsVisibleOne',{
                data: 0
            });

            this.user_click = false;

            setTimeout(() => {
                this.getAnswerSeen();
                this.is_seen = [];
                this.not_seen = [];
            }, 400);

            this.close_modal = true;
        }
    },
    created() {
        this.answeredUsersFilterParam = this.collAnsweredUsersFilter;
        this.getAnswerSeen();
    },
    mounted(){
        console.log('mounted collAnsweredUsersFilter = ', this.collAnsweredUsersFilter)
        // this.answeredUsersFilter(this.answer);
        // this.getAnswerSeen();
        // console.log( 'this.filtered_answer_users = ',  this.filtered_answer_users );
    }
}
</script>

<style scoped>

</style>
