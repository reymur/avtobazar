<template>
    <div class="">
        <table v-if="orders != null && orders.length" class="table border-top-0 border-bottom">
            <tbody>
                <tr v-for="order in no_answered" v-if="order">
                    <td class="text-left send__all-td pt-2 pb-1 pb-0">
                        <div class="d-block">
                            <orders-all-modal
                                :order="order"
                                :auth_check="auth_check"
                                :auth_user="auth_user"
                                :auth_user_status="auth_user_status"
                                :disabled="null"
                            >
                            </orders-all-modal>
                        </div>
                    </td>
                    <td class="text-right send__all-td pt-2 pb-1 pb-0 pr-0">
                        <div class="d-block">
                            <span class="badge badge-success">
                                yeni
                            </span>
                        </div>
                    </td>
                    <td class="col-1 text-right  pt-1 pl-0">
                        <a :href="'order_delete' + order.announcement_id" class="text-dark">
                            <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr v-for="order in is_answered" v-if="order">
                    <td class="text-left send__all-td pt-2 pb-1 pb-0">
                        <div class="d-block">
                            <orders-all-modal
                                :order="order"
                                :auth_check="auth_check"
                                :auth_user="auth_user"
                                :auth_user_status="auth_user_status"
                                :disabled="'disabled'"
                            >
                            </orders-all-modal>
                        </div>
                    </td>
                    <td class="text-right send__all-td pt-2 pb-1 pb-0 pr-0">
                        <div v-if="is_seen[order.id] == null" class="d-block">
                            <span class="badge badge-light">
                                <svg width="1.9em" height="1.9em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </span>
                        </div>
                        <div v-else class="d-block">
                            <span class="badge badge-light">
                                <svg width="1.9em" height="1.9em" viewBox="0 0 16 16" class="bi bi-check2-all text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M12.354 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                  <path d="M6.25 8.043l-.896-.897a.5.5 0 1 0-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 0 0 .708 0l7-7a.5.5 0 0 0-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                                </svg>
                            </span>
                        </div>
                    </td>
                    <td class="col-1 text-right pl-1 pt-1 pl-0">
                        <a :href="'/orders-delete/' + order.announcement.id" class="text-dark">
                            <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div v-else class="d-block">
            <h4 class="text-center p-5 letter__spacing">
                Sifariş tapılmadı!
            </h4>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrdersAllAnnounce",
    props: ['orders','auth_check','auth_user','auth_user_status'],
    data(){
        return {
            is_answered: [],
            is_seen: [],
            no_answered: null,
        }
    },
    methods:{
        isAnswered(){
            this.getIsAnswered(this.orders);
            this.getNoAnswered();
        },
        getIsAnswered(orders){
            if( orders !== undefined && orders != null ) {
                orders.forEach(order => {
                    if (order.get_seller_answers != null && order.get_seller_answers.length > 0) {
                        if (order.announcement !== undefined && order.announcement != null) {
                            if (this.auth_check && this.auth_user) {
                                // console.log('AAAAAAA - ', order)
                                order.get_seller_answers.filter((answer) => {
                                    if (order.announcement.id == answer.announcement_id && answer.user_id == this.auth_user.id) {
                                        this.is_answered.push(order);
                                        this.is_seen[order.id] = answer.seen ?? null;
                                    }
                                });
                            }
                        }
                    }
                });
            }
        },
        getNoAnswered(){
            if(this.orders.length && this.is_answered.length ){
                let order_count = this.orders.length;
                let answered_count = this.is_answered.length;
                this.no_answered = this.orders;

                for(let i=0; i < order_count; i++){
                    for(let j=0; j < answered_count; j++){
                        if( this.orders[i] !== undefined && this.is_answered[j] !== undefined ) {
                            if (this.orders[i].id == this.is_answered[j].id) {
                                delete this.no_answered[i];
                            }
                        }
                    }
                }
            }else if( this.orders.length ){
                this.no_answered = this.orders;
            }
        }
    },
    mounted() {
        this.isAnswered();
        console.log('AAAAAAAAAAA Page ooo - ', this.orders);
        // console.log('OrdersAllAnnounce Page is_answered', this.is_answered);
        // console.log('OrdersAllAnnounce Page no_answered', this.no_answered);
    }
}
</script>

<style scoped>

</style>
