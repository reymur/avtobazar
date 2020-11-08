<template>
    <div class="">
        <table class="table mt-1 mb-0">
            <tbody>
                <tr>
                    <td v-if="answer_info" class="text-center border-0 pt-1 pb-0 pr-0">
                        <div class="text-center mt-1">
                            <div class="text-h1 mb-1">
                                {{ answer_info.condition }}
                            </div><!--Condition-->

                            <div class="text-center mb-2">
                                <div v-if="answer_info.image" class="text-center m-auto answer__image-div">
                                    <img :src="image_path + answer_info.image" :alt="answer_info.image" class="answer__image-style">
                                </div>
                                <div v-else class="text-center m-auto answer__icon-div">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-camera answer__icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M15 12V6a1 1 0 0 0-1-1h-1.172a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 9.173 3H6.828a1 1 0 0 0-.707.293l-.828.828A3 3 0 0 1 3.172 5H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                                        <path fill-rule="evenodd" d="M8 11a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        <path d="M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                    </svg>
                                </div>
                            </div><!--Photo-->

                            <div class="text-left answers__time-style">
                                {{ answer_info.created_at ? answer_info.created_at : '' }}
                            </div>
                        </div>
                    </td>

                    <td v-if="answer_info" class="text-right border-0 pt-1 pb-0 pl-0 pr-3">
                        <div v-if="!loader" class="d-inline-flex pt-1 mt-4">
                            <div class="text-right border-0 letter__spacing">
                                <div class="pt-2">
                                    <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                            </div>

                            <span class="text-h1 mr-3 mt-2">
                                {{ answer_info.which }}
                            </span>

                            <div v-if="is_updated === true" class="answer__price-div">
                                 <span class="answer__price">
                                    {{ answer_info.price }}
                                </span>
                                <span class="answer__price-currency">AZE</span>
                            </div><!--Show Seen is null-->
                            <div v-else class="bg-secondary answer__price-div-for-seen">
                                 <span class="answer__price">
                                    {{ answer_info.price }}
                                </span>
                                <span class="answer__price-currency">AZE</span>
                            </div><!--Show Seen is not null-->
                        </div>

                        <div v-if="loader" class="pt-3 pr-4 pb-2 d-inline-flex">
                            <span class="answer__price-currency">&nbsp; &nbsp; &nbsp;</span>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "ShowAllAnswerSellersAnswersShowTable",
    props: [
        'answer_users','answer_id',
        'seller_id','close_modal','clickToNewAnswers'
    ],
    data(){
        return {
            answer_info: null,
            new_answer_info2: null,
            is_updated: false,
            answer_update: null,
            loader: false,
            guard_for_show: null,
            show_seen_guard: true,
            image_path: '/images/users/announcement/answers/',
        }
    },
    methods: {
        AnswerTestOnSeen(answer_info, answer_id, seller_id){
            if( answer_info !== undefined && answer_info != null ){
                console.log('AAAAAAAAAA - ', answer_info.seen )
                if( answer_info.seen !== undefined && answer_info.seen == null ){
                    if( sessionStorage.getItem('except_answer_'+answer_info.id) === null ) {
                        this.loader = true;
                        this.collGetNewAnswers(answer_id, seller_id);
                    }
                    else {
                        if(
                            sessionStorage.getItem('except_answer_'+answer_info.id) != null &&
                            sessionStorage.getItem('except_answer_'+answer_info.id) != answer_info.id
                        ) {
                            this.loader = true;
                            this.collGetNewAnswers(answer_id, seller_id);
                        }
                    }
                }
            }
        },
        collGetNewAnswers(answer_id, seller_id){
            setTimeout(() => {
                this.getNewUserAnswers(answer_id, seller_id);
            }, 200);
        },
        getNewUserAnswers(answer_id, seller_id){
            axios.post('/announce/answer-seen-update-vue',{
                seller_id:seller_id,
                announcement_id:answer_id,
            })
            .then( res => {
                if( res.status == 200 ) {
                    if( res.data.answer != null && this.is_updated !== undefined ) {
                        const answer = res.data.answer;
                        this.answer_info = answer;
                        this.is_updated = res.data.is_updated;
                        this.loader = false;

                        if( this.is_updated ) {
                            sessionStorage.setItem(
                                'except_answer_'+answer.id, answer.id
                            );
                            this.resetAnswersInUserSideBar(answer_id);
                        }
                    }
                }
            })
            .catch( err => {
                if( err.response !== undefined ) {
                    if( err.response.data !== undefined ) {
                        if( err.response.data.errors !== undefined && err.response.data.errors != null ) {
                            this.errors = err.response.data.errors;
                        }
                        if( err.response.data.seen !== undefined && err.response.data.seen != null ) {
                            this.show_seen_guard = false;
                            console.log( 'err.seen_id = ', err.response.data.seen.id )
                        }
                    }
                }
            });
        },
        resetAnswersInUserSideBar(answer_id){
            if( answer_id != null ) {
                this.$emit('resetAnswersInUserSideBarOne',{
                    id: answer_id
                });
            }
        },
        getAnswersUser(){
            if( this.answer_users !== undefined && this.answer_users != null && this.answer_users.length ){
                if( this.answer_id !== undefined && this.answer_id != null ){
                    if( this.seller_id !== undefined && this.seller_id != null ){
                        this.answeredUsersFilter(this.answer_users, this.seller_id);

                        if( this.answer_info.length > 0 && this.answer_info[0] != null ) {
                            this.answer_info = this.answer_info[0];
                            this.AnswerTestOnSeen(this.answer_info, this.answer_id, this.seller_id)
                        }else{
                            this.answer_info = null;
                        }
                    }
                }
            }
        },
        answeredUsersFilter(answer_users, seller_id){
            let arr = [];
            arr = answer_users.filter( user => {
                return user.user_id == seller_id;
            });

            return this.answer_info = arr;
        },
    },
    created() {
        // this.getUserAnswer();

        this.getAnswersUser();
    },
    mounted(){
        // console.log( 'this.is_new_answers = ', this.is_new_answers )
        // this.userClick();
        // this.getUserAnswer();
        // console.log('answer_id = ', this.answer_id)
        // console.log('users = ', this.users)
        // this.getAnswersUser();
        // console.log('answer_info = ', this.answer_info)
        // console.log('answered_user = ', this.answered_user)
    }
}
</script>

<style scoped>

</style>
