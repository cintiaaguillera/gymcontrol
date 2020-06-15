

require('./bootstrap');
window.Vue = require('vue');

import fontawesome from './font-awesome/all.min.js';
//import 'bootstrap-select/dist/js/bootstrap-select.js';
import customscripts from './customscripts/scripts.js';

import vuex from 'vuex';
import vuethemask from 'vue-the-mask';

Vue.use(vuethemask)
Vue.use(vuex);

Vue.component('cadastro-cliente', require('./components/form-cadastro-cliente.vue').default);
Vue.component('cadastro-instrutor', require('./components/form-cadastro-instrutor.vue').default);
Vue.component('registro-pagamento', require('./components/form-registro-pagamento.vue').default);
Vue.component('form-login', require('./components/form-login.vue').default);
Vue.component('table-manage-clientes', require('./components/table-manage-clientes.vue').default);
Vue.component('table-manage-instrutores', require('./components/table-manage-instrutores.vue').default);

Vue.component('messages', require('./components/messages.vue').default);


const app = new Vue({
    el: '#main_app',
});
