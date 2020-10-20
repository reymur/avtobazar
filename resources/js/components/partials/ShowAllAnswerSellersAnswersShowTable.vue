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
    props: ['answer_id','seller_id','close_modal'],
    data(){
        return {
            answer_info: null,
            answer_info2: null,
            loader: false,
        }
    },
    methods: {
        getUserAnswer(){
            this.loader = true;

            axios.post('/announce/get-show-all-answer-vue',{
                answer_id:this.answer_id,
                seller_id:this.seller_id
            })
            .then( res => {
                if( res.status == 200 ) {
                    if( res.data.answer !== undefined ) {
                        this.answer_info = res.data.answer;
                        this.loader = false;
                        this.AnswerTestOnSeen( res.data.answer, this.answer_id, this.seller_id );
                        // console.log('this.answer_info - ', this.answer_info.seen, 'Status = ',res.status);
                    }
                }
                // console.log('res - ', res.data);
            })
            .catch( err => {
                console.log( 'this.answer_info - ', err.data);
            });
        },
        AnswerTestOnSeen(answer_info, answer_id, seller_id){
            if( answer_info != null && answer_info !== undefined ){
                if( answer_info.seen == null && answer_info.seen !== undefined ){
                    this.collGetNewAnswers(answer_id, seller_id);
                }else{
                    this.answer_info2 = null;
                }
            }
        },
        collGetNewAnswers(answer_id, seller_id){
            // setTimeout(() => {
                this.getNewUserAnswers(answer_id, seller_id);
            // }, 200);
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
                        console.log('ANSWER new - ', res.data.answers )
                    }
                    // console.log('ANSWER new2 - ', res.data.answers )
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
        userClick(){
            // if(this.close_modal == true ){
            //     this.getUserAnswer();
            //     console.log('AAAAAAAAAAAAAAAAAAa' )
            // }
        }
    },
    created() {
        this.getUserAnswer();
    },
    mounted(){
        // this.userClick();
        // this.getUserAnswer();
    }
}
</script>

<style scoped>

</style>
