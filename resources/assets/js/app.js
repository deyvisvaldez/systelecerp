
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'
import VueResource from 'vue-resource'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(BootstrapVue);
Vue.use(VueResource);

// PAGES GENERAL
Vue.component('clientes', require('./components/pages/clientes.vue'));
Vue.component('obras', require('./components/pages/obras.vue'));
Vue.component('cotizaciones', require('./components/pages/cotizaciones.vue'));
Vue.component('presupuestos', require('./components/pages/presupuestos.vue'));
Vue.component('proveedores', require('./components/pages/proveedores.vue'));


// SERVICE CLIENTE
Vue.component('listcliente', require('./components/services/cliente/list.vue'));
Vue.component('addcliente', require('./components/services/cliente/add.vue'));
Vue.component('editcliente', require('./components/services/cliente/edit.vue'));
Vue.component('removecliente', require('./components/services/cliente/remove.vue'));

// SERVICE PROVEEDOR
Vue.component('listproveedor', require('./components/services/proveedor/list.vue'));
Vue.component('addproveedor', require('./components/services/proveedor/add.vue'));
Vue.component('editproveedor', require('./components/services/proveedor/edit.vue'));
Vue.component('removeproveedor', require('./components/services/proveedor/remove.vue'));

// SERVICE CONTACTO
Vue.component('listcontacto', require('./components/services/contacto/list.vue'));
Vue.component('addcontacto', require('./components/services/contacto/add.vue'));
Vue.component('editcontacto', require('./components/services/contacto/edit.vue'));
Vue.component('removecontacto', require('./components/services/contacto/remove.vue'));

// SERVICE OBRA
Vue.component('listobra', require('./components/services/obra/list.vue'));
Vue.component('addobra', require('./components/services/obra/add.vue'));
Vue.component('editobra', require('./components/services/obra/edit.vue'));
Vue.component('removeobra', require('./components/services/obra/remove.vue'));

// SERVICE COTIZACION
Vue.component('listcotizacion', require('./components/services/cotizacion/list.vue'));
Vue.component('addcotizacion', require('./components/services/cotizacion/add.vue'));
Vue.component('editcotizacion', require('./components/services/cotizacion/edit.vue'));
Vue.component('removecotizacion', require('./components/services/cotizacion/remove.vue'));

// SERVICE PRESUPUESTO
Vue.component('listpresupuesto', require('./components/services/presupuesto/list.vue'));
Vue.component('addpresupuesto', require('./components/services/presupuesto/add.vue'));
Vue.component('editpresupuesto', require('./components/services/presupuesto/edit.vue'));
Vue.component('removepresupuesto', require('./components/services/presupuesto/remove.vue'));

// SERVICE CATALOGO
Vue.component('listcatalogo', require('./components/services/catalogo/list.vue'));
Vue.component('addcatalogo', require('./components/services/catalogo/add.vue'));
Vue.component('editcatalogo', require('./components/services/catalogo/edit.vue'));
Vue.component('removecatalogo', require('./components/services/catalogo/remove.vue'));

export var bus = new Vue();

const app = new Vue({
    el: '#app'
});
