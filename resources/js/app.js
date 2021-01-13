require('./bootstrap');

import Vue from 'vue'
import axios from 'axios';

// const api  = axios.create({
//     baseURL: 'api.domain.com',
//     headers: {
//       'Content-Type': 'application/json'
//     }
//   })

// export default api


window.Vue = require('vue').default;

Vue.component('hello-world', require('./components/HelloWorld.vue').default);
Vue.component('avatar-upload', require('./components/AvatarUpload.vue').default);
Vue.component('post-comments', require('./components/PostComments.vue').default);

// Vue.use(axios); can't use directly, easier to use vue resource

const app = new Vue({
    el: '#app',
});