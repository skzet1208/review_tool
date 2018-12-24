import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { sync } from 'vuex-router-sync'
import store from './store'
import ElementUI from 'element-ui'
import Api from './auth/api.js'
import Auth from './auth/auth.js'
import 'element-ui/lib/theme-chalk/index.css';
require('./bootstrap')

Vue.use(ElementUI)

sync(store, router)

window.api = new Api();
window.auth = new Auth();

const app = new Vue({
  store,
  router,
  el: '#app',
  render: h => h(App)
})