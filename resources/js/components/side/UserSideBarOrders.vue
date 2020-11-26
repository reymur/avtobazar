<template>
    <div class="d-inline-flex">
        <span class="pr-1">
            Sifarişlər
        </span>

        <div v-if="orders_count != null && orders_count > 0" class="">

            <span v-if="new_orders_count != null && new_orders_count > 0" class="badge badge-success badge__bg-orders">
                {{ new_orders_count }}
            </span>

            <span v-else class="badge badge-secondary">
                {{ orders_all }}
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
    props: ['orders_count','new_orders'],
    data(){
        return {
            orders_all:this.orders_count,
            new_orders_count:this.new_orders
        }
    },
    mounted() {
        console.log( 'AAAAAAAAAAAAAAa === ', this.orders_count)
    }
}
</script>

<style scoped>

</style>
