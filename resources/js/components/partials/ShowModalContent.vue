<template>
    <div v-if="data !== undefined && data != null" class="">
        <div class="modal-header">
           <div v-if="data" class="d-flex">
               <h5 v-if="sender_user != null || sender_user != null" class="modal-title" :id="'send_all-'+ data.id">
                    <span class="mr-0">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </span>
                    <span v-if="sender_user.phone != null && sender_user.status == 1" class="text-uppercase letter__spacing">
                        <a :href="'tel:'+sender_user.phone" class="text-dark ">
                            {{ sender_user.phone }}
                        </a>
                    </span>
                   <span v-if="sender_user.name != null && sender_user.status == 2" class="text-uppercase letter__spacing">
                        <a :href="address+'/seller/seller-store/'+sender_user.id" target="_blank" class="sender__user-name">
                            {{ sender_user.name }}
                        </a>
                       <span class="d-block sender__user-phone">
                            <a :href="'tel:'+sender_user.phone" class="text-dark ">
                                {{ sender_user.phone }}
                            </a>
                       </span>
                    </span>

               </h5>

               <div class="pt-1">
                   <span class="px-3"></span>

                    <span class="pt-1 text-black-50">
                        {{ data.created_at }}
                    </span>

                    <span class="px-3"></span>

                    <span class="pt-1 text-black-50">
                        {{ data.city }}
                    </span>
               </div>
           </div>

            <div v-else class="">
                Yox
            </div>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body pt-2 pb-1">
            <table class="table table-bordered">
                <tr v-if="data.spare_parts">
                    <td class="text-break text-center p-2" colspan="2">
                        <div class="p-2 show__seller-text">
                            {{ data.spare_parts }}
                        </div>
                    </td>
                </tr>

                <tr v-if="data.marka">
                    <td scope="row" class="text-right text-black-50 py-2">Model:</td>
                    <td class="text-break text-center py-2">
                        {{ data.marka }}
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        {{ data.model }}
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-slash ml-n1 mr-n1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        {{ data.motor }}
                    </td>
                </tr>

                <tr v-if="data.year">
                    <td scope="row" class="text-right text-black-50 py-2">Buraxılış:</td>
                    <td class="text-break text-center py-2">
                        {{ data.year }}
                    </td>
                </tr>

                <tr v-if="getFuelTypeAndCondition(data)">
                    <td scope="row" class="text-right text-black-50 py-2">Yanacaq növü:</td>
                    <td class="text-break text-center py-2">
                        {{ fuel_type }}
                    </td>
                </tr>

                <tr v-if="condition">
                    <td scope="row" class="text-right text-black-50 py-2">Vəziyyəti:</td>
                    <td class="text-break text-center py-2">
                        {{ condition }}
                    </td>
                </tr>

                <tr v-if="data.texpassport">
                    <td scope="row" class="text-right text-black-50 py-2">Texpassport:</td>
                    <td class="text-break text-center text-uppercase py-2 flash__texpass">
                        {{ data.texpassport }}
                    </td>
                </tr>

                <tr v-if="data.image">
                    <td scope="row" class="text-right text-black-50 py-2">Şəkil:</td>
                    <td class="text-break text-center py-2">
                        <div class="image__box">
                            <vue-picture-swipe
                                class="flash__image"
                                :items="items"
                                :options="{
                                    clickToCloseNonZoomable: false,
                                }"
                            ></vue-picture-swipe>
                        </div>
                    </td>
                </tr>

                <tr v-if="data.note">
                    <td scope="row" class="text-right text-black-50 py-2">Əlavə məlumat:</td>
                    <td class="text-break text-center py-2">
                        {{ data.note }}
                    </td>
                </tr>

            </table>
            <div class="modal-footer py-1">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>

                <div v-if="auth_check && auth_user_status == 2" class="">
                    <button v-if="disabled" class="btn btn-secondary" :disabled="disabled"
                        :data-target="'#answer-' + data.id">
                        Cavab
                    </button>

                    <a v-else href="" class="btn btn-success" data-toggle="modal"
                        :data-target="'#answer-' + data.id">
                        Cavab
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show_modal_content",
    props: ['data','auth_check','auth_user_status','disabled'],
    data(){
        return {
            sender_user: null,
            fuel_type: null,
            condition: null,
            items: [{
                src: '/images/users/announcement/orders/'+ this.data.image,
                thumbnail: '/images/users/announcement/orders/'+ 'small_'+this.data.image,
                w: 1200,
                h: 800,
                alt: this.data.image
            }],
            address: location.protocol+'//'+location.hostname
        }
    },
    computed: {

    },
    methods:{
        getSender(data){
            if( sessionStorage.getItem('sender_id.'+data.user_id) != data.user_id ) {
                axios.post('/api/get-announce-user', {
                    announcement_user_id: data.user_id
                })
                .then(res => {
                    if (res.data !== undefined && res.data != null) {
                        if ( res.data.sender !== undefined && res.data.sender != null ) {
                            this.sender_user = res.data.sender;
                            sessionStorage.setItem('sender_id.'+data.user_id, res.data.sender);
                            console.log('Res Sender - ', this.sender_user.id);
                        }
                    }
                })
                .catch(err => {
                    console.log('Err Sender - ', err.response)
                });

                return this.sender_user
            }else{
                this.sender_user = sessionStorage.getItem('sender_id.'+data.user_id );
                return this.sender_user;
            }
        },
        getFuelTypeAndCondition(data){
            if( sessionStorage.getItem('announce_id.'+data.id) != data.id ) {
                axios.post('/api/get-fuel-type', {
                    fuel: data.fuel_type,
                    condition: data.condition
                })
                    .then(res => {
                        if (res.data !== undefined && res.data != null) {
                            if (res.data != null) {
                                if ( res.data.fuel_type !== undefined && res.data.condition !== undefined ) {
                                    if ( res.data.fuel_type != null && res.data.condition != null ) {
                                        this.fuel_type = res.data.fuel_type;
                                        this.condition = res.data.condition;
                                        sessionStorage.setItem('announce_id.'+ data.id, data.id);
                                        sessionStorage.setItem('fuel_type.'+ data.id, res.data.fuel_type);
                                        sessionStorage.setItem('condition.'+ data.id, res.data.condition);
                                    }
                                }
                            }
                        }
                    })
                    .catch(err => {
                        console.log('Err Fuel type - ', err.response)
                    });

                return this.fuel_type ?? true;
            }else{
                if( sessionStorage.getItem('announce_id.'+data.id) ){
                    this.fuel_type = sessionStorage.getItem('fuel_type.'+data.id);
                    this.condition = sessionStorage.getItem('condition.'+data.id);
                    return true;
                }
            }
        }
    },
    created() {
        // sessionStorage.clear()
        // this.getFuelType()
        this.getSender(this.data)
    },
    mounted() {
        console.log('UUUUUUUUUU - ', location.protocol+'//'+location.hostname+'/'+location.pathname,  )
    }
}
</script>

<style scoped>

</style>
