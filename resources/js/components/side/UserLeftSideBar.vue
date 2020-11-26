<template>
    <div class="">
        <table class="mx-xl-auto mx-lg-auto text-md-left text-sm-left">
            <tbody class="d-lg-block d-md-inline-flex d-sm-inline-flex">
                <tr>
                    <td class="text-left pb-xl-3 pb-lg-3 p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">
                        <a v-if="auth_user.status == 1" :href="'/buyer/profile/'+ auth_user.id" class="d-lg-block border-bottom text-decoration-none px-2">
                            <span class="letter__spacing"> Profil </span>
                        </a>

                        <a v-if="auth_user.status == 2" :href="'/seller/profile/'+ auth_user.id" class="d-lg-block border-bottom text-decoration-none px-2">
                            <span class="letter__spacing"> Profil </span>
                        </a>
                    </td>
                </tr>

                <tr v-if="auth_check && auth_user.status == 2">
                    <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">
                        <a :href="'/announce/orders'"
                           :class="'d-lg-block text-blue '+ currentPage('/orders')">
                            <user-side-bar-orders
                                :orders_count="orders_count"
                                :new_orders="new_orders"
                            ></user-side-bar-orders>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2">
                        <a v-if="auth_check" :href="'/announce/sends'"
                           :class="'d-lg-block text-blue '+ currentPage('/sends')">
                            <span v-if="auth_user_get_sends != null && auth_user_get_sends.length > 0" class="">
                                Göndərilənlər
                                <span class="badge badge-secondary">
                                   {{ auth_user_get_sends.length }}
                                </span>
                            </span>
                            <span v-else class="d-lg-block text-blue">
                                Göndərilənlər
                                <span class="badge badge-secondary">
                                    0
                                </span>
                            </span>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td class="text-left p-xl-1 p-lg-1 p-md-2 p-sm-2 d-inline-flex">
                        <a :href="'/announce/answers'"
                           :class="'d-lg-block text-blue '+ currentPage('/answers')">
                            <user-side-bar-answers
                                :reset_answers="reset_answers"
                            ></user-side-bar-answers>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    name: "UserLeftSideBar",
    props: [
        'auth_user','auth_check',
        'auth_user_get_sends','orders_count',
        'new_orders','reset_answers'
    ],
    data(){
        return {
            current_page: '',
        }
    },
    methods:{
        currentPage( page ){
            let curr = window.location.pathname

            if( curr.indexOf( page ) != -1 )
                return this.current_page = 'border-bottom border-dark text-black-50 text-decoration-none';
            else
                return this.current_page = 'border-0';
        }
    },
    mounted() {
        console.log( ' window.location.pathname11 = ',  window.location.pathname.indexOf('/answers') )
        // this.currentPage()
    }
}
</script>

<style scoped>

</style>
