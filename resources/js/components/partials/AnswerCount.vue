<template>
    <div class="d-inline-flex">
        <div class="position-relative">
            <div class="main__menu-answers-count">
<!--                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->

                <span v-if="new_answers.length !== null && new_answers.length > 0" class="pb-1 px-1">
                    <span class="badge badge-success badge__bg text-white rounded-circle badge__font_size">
                        {{ new_answers.length }}
                    </span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserSideBarOrders",
    data(){
        return {
            old_answers:[],
            new_answers:[],
            loader: false,
        }
    },
    watch:{

    },
    methods: {
        getNewAnswers( answers ) {
            if ( answers !== undefined ) {
                if ( answers != null) {
                    this.new_answers = [];

                    answers.forEach(val => {
                        if (val.seen == null) {
                            this.new_answers.push(val);
                        }
                    });
                }
            }
        },
        ifNoUpdateMainMenuAnswersCount(){
            setTimeout( () => {
                if( this.loader != false ) {
                    axios.post('/announce/main-menu-answers-count', {
                        data: 2
                    })
                    .then(res => {
                        console.log('AAAAAA - ', res)
                    })
                    .catch(err => {
                        console.log('BBBBBb - ', err.response)
                    });
                }
            }, 2000);
        }
    },
    created() {
        // this.loader = true;

        Echo.channel('answer')
            .listen('AnswerCount', ({data}) => {
                this.getNewAnswers( data );
                // this.loader = false;
            });
    },
    mounted() {
        this.ifNoUpdateMainMenuAnswersCount();
    }
}
</script>

<style scoped>

</style>
