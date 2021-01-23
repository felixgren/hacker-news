require('./bootstrap');

import Vue from 'vue';
import VueResource from 'vue-resource';

// const api  = axios.create({
//     baseURL: 'api.domain.com',
//     headers: {
//       'Content-Type': 'application/json'
//     }
//   })

// export default api


window.Vue = require('vue').default;
require('vue-resource');

// Vue.http.interceptors.push((request, next) => {
//     request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

//     next();
// });

Vue.component('hello-world', require('./components/HelloWorld.vue').default);
Vue.component('avatar-upload', require('./components/AvatarUpload.vue').default);
Vue.component('post-comments', require('./components/PostComments.vue').default);

Vue.use(VueResource);

// The data is from views at layouts/app.blade.php
const app = new Vue({
    el: '#app',
    data: window.hackernews
});