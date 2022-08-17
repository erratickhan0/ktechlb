window.Vue = require('vue');

require('./bootstrap');
window.$ = window.jQuery = require('jquery');
require('./ckeditor');

window.bus = new Vue();
if (typeof window.vue_data === 'undefined') {
    window.vue_data = {};
}
axios.defaults.baseURL = process.env.MIX_APP_URL;

window.Laravel = {
    "baseUrl": process.env.MIX_APP_URL
}
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate/dist/vee-validate.full.esm';
Vue.component('validation-provider', ValidationProvider);
Vue.component('validation-observer', ValidationObserver);
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast, { position: 'top-right' });
import { ToggleButton } from 'vue-js-toggle-button';
Vue.component('ToggleButton', ToggleButton);
import { BModal } from 'bootstrap-vue';
Vue.component('b-modal', BModal);
import { BButton } from 'bootstrap-vue';
Vue.component('b-button', BButton);
Vue.component('brands-form', require('./components/BrandsForm').default);
Vue.component('settings-form', require('./components/SettingsForm').default);
Vue.component('slider-form', require('./components/SliderForm').default);
Vue.component('news-details', require('./components/NewsDetails').default);
Vue.component('icon-details', require('./components/IconDetails').default);
Vue.component('middle-banner-details', require('./components/middleBannerDetails').default);


import vSelect from 'vue-select';
Vue.component('v-select', vSelect);
import 'vue-select/dist/vue-select.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
const app = new Vue({
    el: '#vue-host',
    data: function() {
        return {
            vue_data: window.vue_data,
        };
    },
    methods: {

    }
});

$('[data-target="#confirm_delete"]').on('click', function() {
    let action = $(this).data('action');
    let title = $(this).data('title');
    let message = $(this).data('confirm');
    let button_label = $(this).data('button-label');
    let modal = $('#confirm_delete');
    let method = $(this).data('method');

    if (title != null) {
        $(modal)
            .find('.modal-title')
            .html(title);
    }
    if (message != null) {
        $(modal)
            .find('.modal-body')
            .html(message);
    }
    if (button_label != null) {
        $(modal)
            .find('.modal-content .js-default-button')
            .html(button_label);
    }
    if (method != null) {
        $(modal)
            .find('input[name=_method]')
            .val(method);
    }

    $(modal)
        .find('form')
        .attr('action', action);

    $(modal).on('shown.bs.modal', function() {
        $(modal)
            .find('.js-default-button')
            .focus();
    });
});
