<template>
    <div class="d-inline-flex">
        <div class="position-relative">
            <div v-if="new_answers.length != null && new_answers.length > 0" class="main__menu-answers-count">
<!--                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->

                <span v-if="new_answers.length != null && new_answers.length > 0" class="pb-1 px-1">
                    <span v-if="auth_user.status == 1" class="badge badge-success badge__bg-buyer text-white rounded-circle badge__font_size">
                        {{ new_answers.length }}
                    </span>
                    <span v-if="auth_user.status == 2" class="badge badge-success badge__bg text-white rounded-circle badge__font_size">
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
    props: ['auth_user'],
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
        Echo.channel('answer')
            .listen('AnswerCount', ({data}) => {
                this.getNewAnswers( data );
                // this.loader = false;
            });
    },
    mounted() {
        console.log( 'SSSSSSSS111 = ', this.auth_user.status)
        this.ifNoUpdateMainMenuAnswersCount();
    }
}
</script>

<style scoped>

</style>
