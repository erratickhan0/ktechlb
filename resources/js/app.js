import Vue from "vue";

require('./bootstrap');
window.$ = window.jQuery = require('jquery');


window.bus = new Vue();
if (typeof window.vue_data === 'undefined') {
    window.vue_data = {};
}
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate/dist/vee-validate.full.esm';
Vue.component('validation-provider', ValidationProvider);
Vue.component('validation-observer', ValidationObserver);
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast, { position: 'top-right' });
import { ToggleButton } from 'vue-js-toggle-button';
Vue.component('ToggleButton', ToggleButton);
Vue.component('brands-form', require('./components/BrandsForm').default);
console.log('zee');
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
