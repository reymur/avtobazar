<template>
    <div class="">
        <table class="table mt-1 mb-0">
            <tbody>
                <tr>
                    <td v-if="price" class="text-right border-0 pt-1 pb-0 pr-3 d-inline-flex">
                        <div v-if="price" class="text-right border-0 answer__which letter__spacing">
                            {{ which }}
                        </div>

                        <div class="answer__price-div d-inline">
                            <span class="answer__price">
                                {{ price }}
                            </span>
                            <span class="answer__price-currency">AZE</span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <span v-if="sendLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span v-if="sendLoader">Gözlə...</span>
    </div>
</template>

<script>
export default {
    name: "ShowAllAnswerSellersAnswersShowTable",
    props: ['answer_id','seller_id'],
    data(){
        return {
            which: null,
            price: null,
            loader: false,
        }
    },
    methods: {
        getUserAnswer(){
            axios.post('/announce/get-show-all-answer-vue',{
                answer_id:this.answer_id,
                seller_id:this.seller_id
            })
            .then( res => {
                if( res.status == 200 ) {
                    this.which = res.data.answer.which,
                    this.price = res.data.answer.price,
                    console.log('res.status - ', res.data);
                }
                console.log('res - ', res.data);
            })
            .catch( err => {
                console.log( '', err.data);
            });
        }
    },
    mounted(){
        this.getUserAnswer();
    }
}
</script>

<style scoped>

</style>
