require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueAxios from 'vue-axios'
import axios from 'axios'
Vue.use(VueAxios, axios);

import App from './App.vue'

import routes from './router'

Vue.component('navigation', require('./components/Navigation.vue').default);

const router = new VueRouter(routes)
// const app = new Vue({
//     el : '#app',
//     router: new VueRouter(routes),
// });

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');