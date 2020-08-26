
require('./bootstrap');

window.Vue = require('vue');


Vue.component('index', require('./components/modal/Index.vue').default);
Vue.component('form-simple', require('./components/modal/ModalFormSimple.vue').default);
Vue.component('form-details', require('./components/modal/ModalFormDetails.vue').default);
Vue.component('modal-footer', require('./components/modal/ModalFooter.vue').default);
Vue.component('modal-main-close-element', require('./components/modal/MainCloseElement.vue').default);
Vue.component('register', require('./components/modal/Registration.vue').default);
Vue.component('saller', require('./components/modal/Saller.vue').default);

import Vue from 'vue'
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)


const app = new Vue({
    el: '#app',
});
