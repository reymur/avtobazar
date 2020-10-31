<template>
    <div class="d-inline-flex">
        <div v-if="new_answers !== null" class="">
            <div v-if="new_answers.length > 0" class="">
                <a @click="showOnlyNewAnswers" href="">
                    <span class="letter__spacing">
                        Yeni
                    </span>

                    <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span v-else class="badge badge-success mt-n2">
                        {{ new_answers.length }}
                    </span>
                </a>
            </div>
            <div v-else class="">
                <span class="letter__spacing">
                    Yeni
                </span>

                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span v-else class="badge badge-secondary mt-n2">
                    0
                </span>
            </div>
        </div>

        <span class="ml-2 mr-2">
            |
        </span>

        <div v-if="old_answers != null" class="">
            <a href="" @click="showAllAnswers">
                <div v-if="old_answers.length > 0" class="">
                    <span class="letter__spacing">
                         Ümumi
                    </span>

                    <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span v-else class="badge badge-secondary mt-n2">
                        {{ old_answers.length }}
                    </span>
                </div>
                <div v-else class="badge badge-secondary mt-n2">
                    0
                </div>
            </a>
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
            loader: false,
        }
    },
    methods: {
        showOnlyNewAnswers(e){
            e.preventDefault();
            this.$emit('showOnlyNewAnswersInParent');
        },
        showAllAnswers(e){
            e.preventDefault();
            this.$emit('showAllnswersInParent');
        },
        getAnswers(){
            axios.post('/announce/side-bar-answers-vue')
                .then( res => {
                    if( res.status == 200 ) {
                        if( res.data.answers !== undefined ) {
                            this.getNewAnswers(res.data.answers);
                            this.loader = false;
                        }
                    }
                })
                .catch( err => {
                    console.log( 'err = ', err.response );
                });
        },
        getNewAnswers(answers){
            if( answers != null && answers !== undefined ) {
                this.new_answers = [];
                this.old_answers = [];

                answers.forEach(val => {
                    if (val.seen == null) {
                        this.new_answers.push(val);
                    }

                    this.old_answers.push(val);
                });
            }
        }
    },
    watch:{
        reset_answers(){
            if( this.new_answers != null ) {
                setTimeout(() => {
                    this.getAnswers();
                }, 1000);
            }
        }
    },
    created() {
        this.loader = true;
        this.getAnswers();
    },
    mounted() {
        // this.getAnswers();
    }
}
</script>

<style scoped>

</style>
