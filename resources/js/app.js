
require('./bootstrap');

window.Vue = require('vue');

// global event bus
window.EventBus = new Vue();

import Vue from 'vue';

import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes'

Vue.component('home-main', require('./components/Master.vue').default);
Vue.component('search', require('./components/Search.vue').default);

import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history',
})

const app = new Vue({
    el: '#app',
    router
});
