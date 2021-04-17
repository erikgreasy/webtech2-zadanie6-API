require('bootstrap')
import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';
import routes from './routes';
import Axios from 'axios'
import BASE_URL from '../../config';

Vue.prototype.$http = Axios;
Vue.prototype.$baseurl = BASE_URL.BASE_URL;

Vue.use(VueRouter)


const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})
  

var app = new Vue({
    router,
    components: {
        App
    },
    el: '#app',
    render: h => h(App)
});