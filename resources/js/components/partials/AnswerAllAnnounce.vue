<template>

    <div class="">
        <table class="table border-top-0 border-bottom">
            <thead>
                <th> Adı </th>
                <th class="text-right"> Göndərilən yer </th>
            </thead>
            <tbody>
                <tr>
                    <td v-if="loader" class="col-7 text-left send__all-td pt-3 pb-2">
                        <div class="m-auto text-right py-5 pr-3">
                            <div class="m-auto py-5">
                                <span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr v-if="!loader && agree_show_only_new_answers && new_answers[0] != null && new_answers[0].length > 0" v-for="answer in new_answers[0]">
                    <td class="col-9 text-left send__all-td pt-3 pb-2">
                        <div class="d-block">
                            <answer-all-modal :answer="answer"></answer-all-modal>
                        </div>
                    </td>

                    <td v-if="answer.user != null && answer.user.length > 0" class="col-3 text-right pt-1 pb-1 pr-1 align-middle">
                        <show-all-answer-sellers
                            :answer="answer"
                            :new_answers_count="new_answers[1]"
                            :answer_users="answer.get_is_answers"
                            :collAnsweredUsersFilter="collAnsweredUsersFilter"
                            @resetAnswersInUserSideBarThree="resetAnswersInUserSideBarFife"
                            @modalIsVisibleOne="modalIsVisibleTwo"
                        ></show-all-answer-sellers>
                    </td>

                    <td class="col-1 text-right pt-1 pl-0 align-middle">
                        <a :href="'announce/buyer-announce-delete/'+answer.id" class="text-dark">
                            <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr v-if="!loader && !agree_show_only_new_answers && answers != null && answers.length > 0" v-for="answer in answers">
                    <td class="col-9 text-left send__all-td pt-3 pb-2">
                        <div class="d-block">
                            <answer-all-modal :answer="answer"></answer-all-modal>
                        </div>
                    </td>

                    <td v-if="answer.user != null && answer.user.length > 0" class="col-3 text-right pt-1 pb-1 pr-1 align-middle">
                        <show-all-answer-sellers
                            :answer="answer"
                            :new_answers_count="null"
                            :answer_users="answer.get_is_answers"
                            :collAnsweredUsersFilter="false"
                            @resetAnswersInUserSideBarThree="resetAnswersInUserSideBarFife"
                            @modalIsVisibleOne="modalIsVisibleTwo"
                        ></show-all-answer-sellers>
                    </td>

                    <td class="col-1 text-right pt-1 pl-0 align-middle">
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
    props: ['showOnlyNewAnswers','showAllAnswers','collAnsweredUsersFilter'],
    data(){
        return {
            loader: false,
            answers:[],
            new_answers:[],
            answer_users:null,
            isTrue: false,
            agree_show_only_new_answers: false,
        }
    },
    watch: {
        showOnlyNewAnswers(){
            if( this.showOnlyNewAnswers ){
                this.loader = true;
                this.answersAnnounce(true);
                console.log('Old answers1 = ',this.answers)
            }
        },
        showAllAnswers(){
            if( this.showAllAnswers ){
                this.loader = true;
                this.answers = [];
                this.answersAnnounce(false);
                this.agree_show_only_new_answers = false;
                console.log('Old answers2 = ',this.answers)
            }
        },
        isTrue(){
            if( this.isTrue ){
                this.getNewAnswers();
                if( this.new_answers[0].length != null && this.new_answers[1].length != null ){
                    if( this.new_answers[0].length > 0 && this.new_answers[1].length > 0 ){
                        this.agree_show_only_new_answers = true;
                        console.log('New answers = ', this.new_answers[0] )
                    }
                }
            }
        }
    },
    methods:{
        getNewAnswers(){
            let i = 0;
            let j = 0;
            let arr = [];
            let new_answers = [];

            this.answers.forEach( answer => {
                if( answer.user != null ){
                    answer.user.forEach((user) => {
                        answer.get_is_answers.filter((getisanswers) => {
                            if( user.id == getisanswers.user_id ){
                                if ( getisanswers.seen == null ) arr.push(answer)
                            }
                        });
                    });
                }
            });

            new_answers = arr.filter((answer) => {
                if(arr[i++] != arr[++j]) return answer;
            });

            this.new_answers[0] = new_answers;
            this.new_answers[1] = arr;
            console.log( 'this.new_answers[1] === ', this.new_answers );
        },
        answersAnnounce(count){
            axios.post('/announce/answers-post')
                .then( res => {
                    if( res.status == 200 ){
                        if( res.data.answers_all !== undefined && res.data.answers_all != null ){
                            this.answers = res.data.answers_all;
                            this.isTrue = !!count;
                            this.loader = false;
                        }
                    }
                })
                .catch( err => {
                    if( err.response !== undefined && err.response.data != null ){
                        console.log( 'err_answers -- ', err.response.data );
                    }
                });
        },
        resetAnswersInUserSideBarFife(answer){
            this.answersAnnounce(false);

            if( answer.id != null ) {
                this.$emit('resetAnswersInUserSideBarSex', {
                    id: answer.id
                })
            }
        },
        modalIsVisibleTwo(el){
            if( el.data !== undefined ) {
                this.$emit('modalIsVisibleThree', {
                    data: el.data
                });
            }
        }
    },
    computed: {

    },
    created() {
        this.loader = true;
        this.answersAnnounce(true);
    },
    mounted(){
    //     console.log( 'Old answers --- ', this.answers )
    }
}
</script>

<style scoped>

</style>
