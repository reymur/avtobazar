<template>
    <div class="row col-lg-12 m-md-auto m-sm-auto px-md-0 px-sm-0">
        <div class="col-lg-2 text-right left__bar-bg py-lg-3 py-md-2 py-sm-2 mb-xl-0 mb-lg-0 mb-md-2 mb-sm-2">
            <user-left-side-bar
                :orders_count="orders.length"
                :new_orders="new_orders"
                :auth_user="auth_user"
                :auth_check="auth_check"
                :auth_user_get_sends="auth_user_get_sends"
            ></user-left-side-bar>
        </div>

        <div class="col-lg-10 px-lg-2 px-md-0 px-sm-0 pb-3 flash__bg border-left border-white">
            <div class="col-md-12 p-md-2 p-sm-0 mt-4 flash__bg">
                <div class="ml-5 mb-3">
                    <h5 class="text-uppercase send__title ml-4">Sifarişlər</h5>
                </div>

                <div v-if="orders.length" class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-4 bg-white flash__shadow">
                    <div class="text-success">
                    </div>

                    <orders-all-announce
                        :orders="orders"
                        :auth_check="auth_check"
                        :auth_user="auth_user"
                        :auth_user_status="auth_user_status"
                    ></orders-all-announce>
                </div>
                <div v-else class="col-lg-10 col-md-12 col-sm-12 mx-auto mt-lg-2 py-5 bg-white flash__shadow">
                    <div class="text-center letter__spacing">
                        <h4> Sifariş tapılmadı! </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Orders",
    props: [
        'orders','new_orders','answers_all','auth_check',
        'auth_user','auth_user_status',
        'auth_user_get_sends'
    ],
    data(){
        return {

        }
    },
    methods:{

    },
    mounted() {
        console.log('Orders Page');
    }
}
</script>

<style scoped>

</style>
