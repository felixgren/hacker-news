require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('hello-world', require('./components/HelloWorld.vue').default);

const app = new Vue({
    el: 'body',
});