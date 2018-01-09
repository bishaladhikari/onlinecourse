
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('lessons', require('./components/authors/lesson/Lessons.vue'));
Vue.component('lesson', require('./components/authors/lesson/Lesson.vue'));
Vue.component('edit-lesson', require('./components/authors/lesson/EditLesson.vue'));
Vue.component('create-lesson', require('./components/authors/lesson/CreateLesson.vue'));
Vue.component('create-article', require('./components/authors/article/CreateArticle.vue'));
Vue.component('create-video', require('./components/authors/video/CreateVideo.vue'));
// Vue.component('manage-section', require('./components/authors/section/ManageSection.vue'));
// Vue.component('create-lesson', require('./components/authors/lesson/CreateLesson.vue'));
// import VueSweetAlert from 'vue-sweetalert'
//
// Vue.use(VueSweetAlert);
// import VueResource from 'vue-resource';
import VueClip from 'vue-clip'

Vue.use(VueClip)
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

const app = new Vue({
    el: '#app',

});
