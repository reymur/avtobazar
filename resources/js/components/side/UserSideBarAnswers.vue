<template>
    <div class="d-inline-flex">
        <span class="pr-1">
            Cavablar
        </span>

        <div v-if="old_answers.length > 0" class="">
            <span v-if="new_answers !== null && new_answers.length" class="badge badge-success">
                {{ new_answers.length }}
            </span>

            <span v-else class="badge badge-secondary">
                {{ old_answers.length }}
            </span>
        </div>

        <div v-else class="">
            <span class="badge badge-secondary">
                0
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserSideBarOrders",
    props: ['reset_answers'],
    data(){
        return {
            old_answers:[],
            new_answers:[],
        }
    },
    methods: {
        getAnswers(){
            axios.post('/announce/side-bar-answers-vue')
             .then( res => {
                 if( res.status == 200 ) {
                     if( res.data.answers !== undefined ) {
                         this.getNewAnswers(res.data.answers);
                         console.log('res111 = ', res.data.answers);
                     }
                 }
             })
             .catch( err => {
                 console.log( 'err111 = ', err.response );
             });
        },
        getNewAnswers(answers){
            if( answers != null && answers !== undefined ) {
                this.new_answers = [];
                this.old_answers = [];

                answers.forEach(val => {
                    if (val.seen == null) {
                        this.new_answers.push(val);
                    } else {
                        this.old_answers.push(val);
                    }
                });
            }
        }
    },
    watch:{
        reset_answers(){
            if( this.new_answers != null ) {
                setTimeout(() => {
                    this.getAnswers();
                }, 1500);
            }
        }
    },
    mounted() {
        this.getAnswers();
        console.log( 'AAAAAAAAAAAAAAa', this.reset_answers )
    }
}
</script>

<style scoped>

</style>
