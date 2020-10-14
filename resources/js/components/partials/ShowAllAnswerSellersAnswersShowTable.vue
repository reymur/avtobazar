<template>
    <div class="">
        <table class="table mt-1 mb-0">
            <tbody>
                <tr>
                    <td v-if="price" class="text-right border-0 pt-1 pb-0 pr-3 d-inline-flex">
                        <div v-if="price" class="text-right border-0 answer__which letter__spacing">
                            <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span v-if="loader">Gözlə...</span>

                            {{ which }}
                        </div>


                        <div v-for="not_seen in is_not_seen" class="answer__price-div d-inline">
                            <span  v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span v-if="loader">Gözlə...</span>

                            <span class="answer__price">
                                {{ not_seen.price }}
                            </span>
                            <span class="answer__price-currency">AZE</span>
                        </div>

                        <div v-if="!is_not_seen.length"  class="answer__price-div-for-seen bg-secondary d-inline">
                            <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span v-if="loader">Gözlə...</span>

                            <span class="answer__price">
                                {{ answer_def.price }}
                            </span>
                            <span class="answer__price-currency">AZE</span>
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
    props: ['answer_id','seller_id','not_seen'],
    data(){
        return {
            which: null,
            price: null,
            is_seen: [],
            is_not_seen: [],
            seen_id: null,
            answer_def: null,
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
                        this.which = res.data.answer.which;
                        this.price = res.data.answer.price;
                        this.seen_id = res.data.answer.id;
                        this.answer_def = res.data.answer;
                        this.getSeenAnswers();
                        this.loader = false;
                        // console.log('res.status - ', res.data);
                    }
                }
                // console.log('res - ', res.data);
            })
            .catch( err => {
                // console.log( '', err.data);
            });
        },
        getSeenAnswers(){
            if( this.not_seen.length ){
                this.not_seen.forEach( val => {
                    if( val.id == this.answer_def.id ){
                        this.is_not_seen.push(val);
                    }
                });
            }
        }
    },
    mounted(){
        this.getUserAnswer();
    }
}
</script>

<style scoped>

</style>
