require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('category-dropdown', require('./components/CategoryDropDown.vue').default);
Vue.component('curso-dropdown', require('./components/curso.vue').default);
Vue.component('curso-admin-dropdown', require('./components/cursoadmin.vue').default);
Vue.component('categoria-estagio-dropdown', require('./components/categoria-estagio-dropdown.vue').default);

const app = new Vue({
    el: '#app',
  });

