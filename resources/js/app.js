/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

global.jquery = global.jQuery = global.$ = require('jquery');

window.Vue = require('vue').default;

require('./slider');

require('./jquery.mask.min');

require('./mask');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('show-flats-component', require('./components/ShowFlatsComponent').default);
Vue.component('pagination-component', require('./components/PaginationComponent').default);
Vue.component('filter-component', require('./components/FilterComponent').default);
Vue.component('form-request', require('./components/admin/FormRequest').default);
Vue.component('detail-request', require('./components/admin/DetailRequestComponent').default);
Vue.component('create-request', require('./components/admin/CreateRequestComponent').default);
Vue.component('table-users-component', require('./components/admin/tables/TableUsersComponent').default);
Vue.component('update-users-component', require('./components/admin/tables/UpdateUsersComponent').default);
Vue.component('create-users-component', require('./components/admin/tables/CreateUsersComponent').default);
Vue.component('table-flats-component', require('./components/admin/tables/TableFlatsComponent').default);
Vue.component('update-flats-component', require('./components/admin/tables/UpdateFlatsComponent').default);
Vue.component('create-flats-component', require('./components/admin/tables/CreateFlatsComponent').default);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



window.addEventListener('load', function () {
    const app = new Vue({
        el: '#app',
        data: {
            message: ''
        }
    });
})
