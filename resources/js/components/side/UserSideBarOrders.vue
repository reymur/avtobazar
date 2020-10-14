<template>
    <div class="d-inline-flex">
        <span class="pr-1">
            Sifarişlər
        </span>

        <div v-if="orders !== null && orders > 0" class="">

            <span v-if="new_orders_count !== null && new_orders_count > 0" class="badge badge-success">
                {{ new_orders_count }}
            </span>

            <span v-else class="badge badge-secondary">
                {{ orders }}
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
    props: ['orders','new_orders'],
    data(){
        return {
            orders_all:this.orders,
            new_orders_count:this.new_orders
        }
    },
    mounted() {
        // console.log( 'AAAAAAAAAAAAAAa')
    }
}
</script>

<style scoped>

</style>
