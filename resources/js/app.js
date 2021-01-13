require('./bootstrap');

import Vue from 'vue'

window.Vue = require('vue').default;

Vue.component('hello-world', require('./components/HelloWorld.vue').default);

Vue.component('avatar-upload', require('./components/AvatarUpload.vue').default);

const app = new Vue({
    el: '#app',
});