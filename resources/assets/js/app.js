
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
Vue.component('upload-video', require('./components/authors/video/UploadVideo.vue'));
Vue.component('embed-video', require('./components/authors/video/EmbedVideo.vue'));

// Vue.component('video-upload', require('./components/authors/video/VideoUpload.vue'));
// Vue.component('manage-section', require('./components/authors/section/ManageSection.vue'));
// Vue.component('create-lesson', require('./components/authors/lesson/CreateLesson.vue'));
// import VueSweetAlert from 'vue-sweetalert'
//
// Vue.use(VueSweetAlert);
// import VueResource from 'vue-resource';
// global.jQuery = require('jquery');
// let $ = global.jQuery;
// window.$ = $;
// // load everything from jquery-ui
require('jquery-ui/ui/widgets/sortable.js');

import VueClip from 'vue-clip'

Vue.use(VueClip)
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

const app = new Vue({
    el: '#app',

});

