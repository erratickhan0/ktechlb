import Vue from "vue";

require('./bootstrap');


window.bus = new Vue();
if (typeof window.vue_data === 'undefined') {
    window.vue_data = {};
}
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate/dist/vee-validate.full.esm';
Vue.component('validation-provider', ValidationProvider);
Vue.component('validation-observer', ValidationObserver);
import VueToast from 'vue-toast-notification';
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

