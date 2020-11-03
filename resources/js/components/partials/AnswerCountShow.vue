<template>
    <div class="d-inline-flex">
        <div class="">
            <div class="">
                <button class="btn p-0" :disabled="add_disabled"  @click="showOnlyNewAnswers">
                    <span v-if="new_answers.length !== null && new_answers.length > 0" :class="'pb-1 px-1 '+new_answer_border">
                        <span class="letter__spacing">
                            Yeni
                        </span>

                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span v-else class="badge badge-success mt-n2">
                            {{ new_answers.length }}
                        </span>
                    </span>

                    <span v-else class="">
                        <span class="letter__spacing">
                            Yeni
                        </span>

                        <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                         <span v-else class="badge badge-secondary mt-n2">
                            0
                        </span>
                    </span>
                </button>
            </div>
        </div>

        <span class="ml-2 mr-2">
            |
        </span>

        <div v-if="old_answers != null && old_answers.length > 0" :class="'px-1 '+old_answer_border">
            <button class="btn p-0" :disabled="add_disabled" @click="showAllAnswers">
                 <span :class="'letter__spacing'+old_answer_text">
                     Ümumi
                </span>

                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span v-else class="badge badge-secondary mt-n2">
                    {{ old_answers.length }}
                </span>
            </button>

            <div v-if="old_answers != null && !old_answers.length" class="badge badge-secondary mt-n2">
                0
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserSideBarOrders",
    props: ['reset_answers','modal_is_visible'],
    data(){
        return {
            old_answers:[],
            new_answers:[],
            loader: false,
            new_answer_border: '',
            new_answer_text: '',
            old_answer_border: '',
            old_answer_text: '',
            old_answer_is_show: 0,
            add_disabled: false,
        }
    },
    watch:{
        modal_is_visible(){
            this.resetNewAnswersIfItEmpty();
        },
        new_answers(){
            if (!this.new_answers.length)
                this.newAnswersStyle('text-dark');
            else
                this.newAnswersStyle('text-info');

            this.addDisabled();
        },
        reset_answers(){
            if( this.new_answers != null ) {
                setTimeout(() => {
                    this.getAnswers();
                }, 1000);
            }
        },
    },
    methods: {
        resetNewAnswersIfItEmpty(){
            if (!this.new_answers.length) {
                let session_answer = sessionStorage.getItem('is_new_answer_count');
                if ( this.modal_is_visible === 0 && session_answer != 0 ) {
                    setTimeout( () => {
                        this.old_answer_text = ' text-dark';
                        if (this.modal_is_visible === 0) this.$emit('showAllAnswersInParent');
                    },1500 )
                }
            }
        },
        showOnlyNewAnswers(e){
            this.old_answer_is_show = 1;
            this.newAnswersStyle('text-info');
            this.$emit('showOnlyNewAnswersInParent');
        },
        showAllAnswers(e){
            this.old_answer_is_show = 1;
            this.oldAnswersStyle();
            this. addDisabled();
            this.$emit('showAllAnswersInParent');
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
        getNewAnswers: function (answers) {
            if ( answers !== undefined ) {
                if ( answers != null) {
                    this.new_answers = [];
                    this.old_answers = [];

                    answers.forEach(val => {
                        if (val.seen == null) {
                            this.new_answers.push(val);
                        } else this.old_answers.push(val);
                    });

                    if (this.new_answers.length !== 0) {
                        sessionStorage.setItem('is_new_answer_count', this.new_answers.length)

                    }
                }
            }
        },
        addDisabled(){
            if( !this.new_answers.length )
                this.add_disabled = 'disabled';
            else
                this.add_disable = false;
        },
        newAnswersStyle(text_color){
            this.new_answer_border = ' border-bottom border-dark';
            this.old_answer_border = ' ';

            this.old_answer_text = ' '+text_color;

        },
        oldAnswersStyle(){
            this.old_answer_border = ' border-bottom border-dark';
            this.old_answer_text = ' text-dark';
            this.new_answer_border = ' text-info';
        },
    },
    computed:{

    },
    created() {
        this.loader = true;
        sessionStorage.setItem('is_new_answer_count', 0);
        this.getAnswers();
    },
    mounted() {
        // this.addDisabled()
        // this.getAnswers();
    }
}
</script>

<style scoped>

</style>
