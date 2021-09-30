<template>
    <div class="d-inline-flex">
        <div class="position-relative">
            <div v-if="new_orders != null && new_orders != 0" class="main__menu-orders-count">
                <!--                <span v-if="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->

                <span class="mb-3 px-1">
                    <span class="badge badge-danger badge__bg-orders rounded-circle badge__font_size">
                        {{ new_orders }}
                    </span>
                </span>
            </div>
            <div v-else class="main__menu-orders-count">
                <span class="mb-3 px-1">
                    <span class="badge badge-danger badge__bg-orders rounded-circle badge__font_size">
                        0
                    </span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrdersCount",
    data(){
        return {
            new_orders: null,
            loader: false,
        }
    },
    watch:{

    },
    methods: {
        getNewOrders(){
            axios.get('/announce/get-orders')
                 .then( res => {
                     if( res.data.orders !== undefined && res.data.orders != null ){
                         this.new_orders = res.data.orders;
                     }
                     console.log('res get orders1 = ', res.data)
                 })
                 .catch( err => {
                     console.log('err get orders = ', err.response.data)
                 })
        }
    },
    created() {
        this.getNewOrders();
    },
    mounted() {
        Echo.channel('orders')
            .listen('OrdersCount', (user) => {
                alert(user)
                this.new_orders.push(user)
            });

        console.log( 'Order Count = ', this.new_orders )
    }
}
</script>

<style scoped>

</style>
