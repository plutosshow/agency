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

//Main
Vue.component('show-flats-component', require('./components/main/ShowFlatsComponent').default);
Vue.component('pagination-component', require('./components/main/PaginationComponent').default);
Vue.component('filter-component', require('./components/main/FilterComponent').default);
//Form.requests
Vue.component('form-request', require('./components/admin/forms/requests/FormRequest').default);
Vue.component('detail-request', require('./components/admin/forms/requests/DetailRequestComponent').default);
Vue.component('create-request', require('./components/admin/forms/requests/CreateRequestComponent').default);
//Users
Vue.component('table-users-component', require('./components/admin/tables/users/TableUsersComponent').default);
Vue.component('update-users-component', require('./components/admin/tables/users/UpdateUsersComponent').default);
Vue.component('create-users-component', require('./components/admin/tables/users/CreateUsersComponent').default);
//Flats
Vue.component('table-flats-component', require('./components/admin/tables/flats/TableFlatsComponent').default);
Vue.component('update-flats-component', require('./components/admin/tables/flats/UpdateFlatsComponent').default);
Vue.component('create-flats-component', require('./components/admin/tables/flats/CreateFlatsComponent').default);
//Roles
Vue.component('table-roles-component', require('./components/admin/tables/roles/TableRolesComponent').default);
Vue.component('update-roles-component', require('./components/admin/tables/roles/UpdateRoleComponent').default);
Vue.component('create-roles-component', require('./components/admin/tables/roles/CreateRoleComponent').default);
Vue.component('list-roles-component', require('./components/admin/tables/roles/ListRolesCompinent').default);
//Gallery
Vue.component('gallery-flats-component', require('./components/admin/gallery/GalleryFlatsComponent').default);
//Pages
Vue.component('page-about-component', require('./components/admin/pages/about/PageAboutComponent.vue').default);
Vue.component('create-employee-output', require('./components/admin/pages/about/CreateEmployeeOutput').default);




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
