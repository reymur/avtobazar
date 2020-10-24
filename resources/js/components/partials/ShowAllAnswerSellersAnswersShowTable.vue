<template>
    <div class="">
        <table class="table mt-1 mb-0">
            <tbody>
                <tr>
                    <td v-if="answer_info2 != null && close_modal" class="text-right border-0 pt-1 pb-0 pl-0 pr-3">
                        <div class="d-inline-flex pt-1">
                            <div class="text-right border-0 answer__which letter__spacing">
                                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span v-if="loader">Gözlə...</span>

                                <span class="text-h1">
                                    {{ answer_info2.which }}
                                </span>
                            </div>

                            <div v-if="answer_info2.seen != null" class="bg-secondary answer__price-div-for-seen">
                                 <span class="answer__price">
                                    {{ answer_info2.price }}
                                </span>
                                <span class="answer__price-currency">AZE</span>
                            </div>
                            <div v-else class="answer__price-div">
                                 <span class="answer__price">
                                    {{ answer_info2.price }}
                                </span>
                                <span class="answer__price-currency">AZE</span>
                            </div>
                        </div>
                    </td>

                    <td v-else-if="answer_info" class="text-right border-0 pt-1 pb-0 pr-3">
                        <div class="d-inline-flex pt-1">
                            <div v-if="answer_info.seen == null" class="text-right border-0 m-0 answer__which letter__spacing">
                                <span class="badge badge-success mr-2 text-uppercase new__price-el">Yeni</span>
                            </div>

                            <div class="text-right border-0 answer__which letter__spacing">
                                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span v-if="loader">Gözlə...</span>

                                <span class="text-h1">
                                    {{ answer_info.which }}
                                </span>
                            </div>

                            <div v-if="answer_info.seen != null" class="bg-secondary answer__price-div-for-seen">
                                 <span class="answer__price">
                                    {{ answer_info.price }}
                                </span>
                                <span class="answer__price-currency">AZE</span>
                            </div>
                            <div v-else class="answer__price-div">
                                 <span class="answer__price">
                                    {{ answer_info.price }}
                                </span>
                                <span class="answer__price-currency">AZE</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span v-if="loader">Gözlə...</span>
    </div>
</template>

<script>
export default {
    name: "ShowAllAnswerSellersAnswersShowTable",
    props: ['answer_users','answer_id','seller_id','close_modal'],
    data(){
        return {
            answer_info: null,
            answer_info2: null,
            answer_update: null,
            loader: false,
        }
    },
    methods: {
        AnswerTestOnSeen(answer_info, answer_id, seller_id){
            if( answer_info != null && answer_info !== undefined ){
                if( answer_info.seen == null && answer_info.seen !== undefined ){
                    this.collGetNewAnswers(answer_id, seller_id);
                    this.resetAnswersInUserSideBar(answer_id);
                }else{
                    this.answer_info2 = null;
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
                    if( res.data.answers !== undefined ) {
                        this.answer_info2 = res.data.answers;
                        this.answer_update = res.status;
                    }
                }
            })
            .catch( err => {
                if( err.response !== undefined ) {
                    if( err.response.data !== undefined ) {
                        if( err.response.data.errors !== undefined ) {
                            this.errors = err.response.data.errors;
                        }
                    }
                }
            });
        },
        resetAnswersInUserSideBar(answer_id){
            if( answer_id != null ) {
                this.$emit('resetAnswersInUserSideBarOne', {
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
                            this.answer_info = this.answer_info[0]
                            this.AnswerTestOnSeen(this.answer_info, this.answer_id, this.seller_id)
                        }else{
                            this.answer_info = null;
                        }
                    }
                }
            }
        },
        answeredUsersFilter(answer_users, seller_id){
            return this.answer_info = answer_users.filter( user => {
                return user.user_id == seller_id;
            });
        },
    },
    created() {
        // this.getUserAnswer();
        this.getAnswersUser();
    },
    mounted(){
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
