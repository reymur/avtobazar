
require('./bootstrap');

window.Vue = require('vue');


Vue.component('form-simple', require('./components/ModalFormSimple.vue').default);
Vue.component('form-details', require('./components/ModalFormDetails.vue').default);
Vue.component('modal-footer-buttons', require('./components/ModalFooterButtons.vue').default);

const app = new Vue({
    el: '#app',
});
