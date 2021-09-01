<template>
    <div class="d-block">
        <!-- Button trigger modal -->
        <a v-if="disabled" @click="showModalContent" href="" class="text-secondary" data-toggle="modal" :disabled="disabled" :data-target="'#send_all-' + order.announcement.id">
            {{ order.announcement.spare_parts ? order.announcement.spare_parts  : 'Yox' }}
        </a>

        <a v-else @click="showModalContent" href="" class="d-block ow__anywvere text-primary" data-toggle="modal" :disabled="disabled" :data-target="'#send_all-' + order.announcement.id">
            {{ order.announcement.spare_parts ? order.announcement.spare_parts  : 'Yox' }}
        </a>

        <!-- Modal -->
        <div class="modal fade" :id="'send_all-' + order.announcement.id" tabindex="-1" :aria-labelledby="'send_all-' + order.announcement.id" aria-hidden="true">
            <div class="modal-dialog">
                <div v-if="show_content" class="modal-content">
                    <show-modal-content
                        :data="order.announcement"
                        :auth_check="auth_check"
                        :auth_user_status="auth_user_status"
                        :disabled="disabled"
                    ></show-modal-content>
                </div>
            </div>
        </div>

        <div v-if="order.announcement" class="">
            <order-answer-modal-parent
                :order="order.announcement"
            ></order-answer-modal-parent>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrdersAllModal",
    props: ['order','auth_check','auth_user','auth_user_status','disabled'],
    data(){
        return {
            show_content: false,
        }
    },
    methods:{
        showModalContent(){
            this.show_content = true;
        }
    },
    mounted() {
        // sessionStorage.clear()
        console.log('OrdersAllModal Page');
    }
}
</script>

<style scoped>

</style>
