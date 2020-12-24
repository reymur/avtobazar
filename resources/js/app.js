
require('./bootstrap');

// window.Vue = require('vue');


Vue.component('index', require('./components/partials/Index.vue').default);
Vue.component('form-simple', require('./components/modal/ModalFormSimple.vue').default);
Vue.component('form-details', require('./components/modal/ModalFormDetails.vue').default);
Vue.component('modal-footer', require('./components/modal/ModalFooter.vue').default);
Vue.component('modal-main-close-element', require('./components/partials/MainCloseElement.vue').default);
Vue.component('register', require('./components/register/Registration.vue').default);
Vue.component('saller', require('./components/partials/Saller.vue').default);
Vue.component('buyer-login-form', require('./components/forms/BuyerLoginForm.vue').default);
Vue.component('buyer-register-form', require('./components/forms/BuyerRegisterForm.vue').default);
Vue.component('seller-login-form', require('./components/forms/SellerLoginForm.vue').default);
Vue.component('seller-register-form', require('./components/forms/SellerRegisterForm.vue').default);
Vue.component('seller-photo', require('./components/seller/SellerPhoto.vue').default);
Vue.component('seller-photo-edit', require('./components/seller/SellerPhotoEdit.vue').default);
Vue.component('card-image-swipe', require('./components/seller/CardImageSwipe.vue').default);
Vue.component('login-not-modal', require('./components/register/Login.vue').default);
Vue.component('register-not-modal', require('./components/register/Register.vue').default);
Vue.component('orders', require('./components/pages/Orders.vue').default);
Vue.component('orders-all-announce', require('./components/partials/OrdersAllAnnounce.vue').default);
Vue.component('orders-all-modal', require('./components/modal/OrdersAllModal.vue').default);
Vue.component('orders-count', require('./components/partials/OrdersCount.vue').default);
Vue.component('show-modal-content', require('./components/partials/ShowModalContent.vue').default);
Vue.component('send-image-show-modal-content', require('./components/partials/SendImageShowModalContent.vue').default);
Vue.component('send-flash-table-image-show', require('./components/partials/SendFlashTableImageShow.vue').default);
Vue.component('order-answer-modal-parent', require('./components/modal/OrderAnswerModalParent.vue').default);
Vue.component('order-answer-modal', require('./components/modal/OrderAnswerModal.vue').default);
Vue.component('user-left-side-bar', require('./components/side/UserLeftSideBar.vue').default);
Vue.component('user-side-bar-orders', require('./components/side/UserSideBarOrders.vue').default);
Vue.component('answer-count-show', require('./components/partials/AnswerCountShow.vue').default);
Vue.component('answer-count', require('./components/partials/AnswerCount.vue').default);
Vue.component('answers', require('./components/pages/Answers.vue').default);
Vue.component('answer-all-announce', require('./components/partials/AnswerAllAnnounce.vue').default);
Vue.component('user-side-bar-answers', require('./components/side/UserSideBarAnswers.vue').default);
Vue.component('answer-all-modal', require('./components/modal/AnswerAllModal.vue').default);
Vue.component('show-all-answer-sellers', require('./components/modal/ShowAllAnswerSellers.vue').default);
Vue.component('show-all-answer-sellers-answers-show-table', require('./components/partials/ShowAllAnswerSellersAnswersShowTable.vue').default);

Vue.component('sale-make-form', require('./components/forms/SaleMakeForm.vue').default);
Vue.component('sale-flash-info', require('./components/partials/SaleFlashInfo.vue').default);
Vue.component('sale-image-show', require('./components/partials/SaleImageShow.vue').default);
Vue.component('vue-image-upload', require('./components/partials/VueImageUpload.vue').default);

import Vue from 'vue';

import vSelect from 'vue-select';

import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

import VuePictureSwipe from 'vue-picture-swipe';
Vue.component('vue-picture-swipe', VuePictureSwipe);

import VueTinyLazyloadImg from 'vue-tiny-lazyload-img'
Vue.use(VueTinyLazyloadImg);

import VueUploader from "vux-uploader-component";
Vue.component('vux-uploader-component', VueUploader);

Vue.component('v-select', vSelect);
Vue.component('vue-phone-number-input', VuePhoneNumberInput);

const app = new Vue({
    el: '#app',
});
