<template>
    <div class="">
        <table class="table border-top-0 border-bottom">
            <thead>
                <th> Adı </th>
                <th class="text-right"> Göndərilən yer </th>
            </thead>
            <tbody>
                <tr v-if="answers != null && answers.length > 0" v-for="answer in answers">
                    <td class="text-left send__all-td pt-1 pb-0">
                        <div class="d-block">
                            <answer-all-modal :answer="answer"></answer-all-modal>
                        </div>
                    </td>

                    <td v-if="answer.user != null && answer.user.length > 0" class="text-right pt-1 pb-1 pr-1">
                        <show-all-answer-sellers
                            :answer="answer"
                            :answer_users="answer.getanswerusers"
                        ></show-all-answer-sellers>
                    </td>

                    <td class="col-1 text-right pt-1 pl-0">
                        <a :href="'announce/buyer-announce-delete/'+answer.id" class="text-dark">
                            <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "AnswerAllAnnounce",
    props: ['answers_all'],
    data(){
        return {
            answers:[],
        }
    },
    methods:{
        // getAnswerAllDetails(){
        //     if( this.answers_all != null && this.answers_all.length > 0 ) {
        //         this.answers_all.forEach( answer => {
        //             this.answerAxios(answer);
        //         });
        //     }
        // },
        answersAnnounce(){
            axios.post('/announce/answers-post')
            .then( res => {
                if( res.status == 200 ){
                    if( res.data.answers_all !== undefined ){
                        this.answers = res.data.answers_all;

                        console.log( 'snswers --- ', this.answers );
                    }
                }
            })
            .catch( err => {
                console.log( 'err_snswers -- ', err.response.data );
            });
        }
    },
    mounted(){
        this.answersAnnounce();
        // console.log( 'AAAAAAQQQQQ --- ', this.a )
    }
}
</script>

<style scoped>

</style>
