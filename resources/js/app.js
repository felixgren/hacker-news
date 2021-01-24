require('./bootstrap');

import Vue from 'vue';
import VueResource from 'vue-resource';

window.Vue = require('vue').default;
Vue.use(VueResource);
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});

Vue.component('hello-world', require('./components/HelloWorld.vue').default);
Vue.component('avatar-upload', require('./components/AvatarUpload.vue').default);
Vue.component('post-comments', require('./components/PostComments.vue').default);

// The data is from views at layouts/app.blade.php
const app = new Vue({
    el: '#app',
    data: window.hackernews
});