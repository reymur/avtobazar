
require('./bootstrap');

window.Vue = require('vue');


Vue.component('index', require('./components/modal/Index.vue').default);
Vue.component('form-simple', require('./components/modal/ModalFormSimple.vue').default);
Vue.component('form-details', require('./components/modal/ModalFormDetails.vue').default);
Vue.component('modal-footer', require('./components/modal/ModalFooter.vue').default);
Vue.component('modal-main-close-element', require('./components/modal/MainCloseElement.vue').default);
Vue.component('register', require('./components/modal/Registration.vue').default);

const app = new Vue({
    el: '#app',
});
