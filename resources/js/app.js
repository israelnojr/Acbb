
require('./bootstrap');

window.Vue = require('vue');

// vue router 
import VueRouter from 'vue-router';
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;

Vue.use(VueRouter)
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

let routes = [
    {
        path: '/example', name: 'example', component: require('./components/ExampleComponent.vue').default
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('profile-form', require('./components/profileForm.vue').default);
// Vue.component('know-your-ward', require('./components/kyw-button.vue').default);




const app = new Vue({
    el: '#app',
});
