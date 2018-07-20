
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.BootstrapVue = require('bootstrap-vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('active-nominations', require('./components/ActiveNominations.vue'));
Vue.component('add-nomination', require('./components/AddNomination'));

let source = [];

const app = new Vue({
    el: '#app',
    data: {
        addNomination: false,
        activeNominations: []
    },
    components: ['active-nominations', 'add-nomination']
});
