import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import router from './router'
import Vuex from 'vuex'
import * as Helper from './helpers';
import store from "./store";

Vue.prototype.Helper = Helper;
Vue.use(Vuex)

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
