import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { sync } from 'vuex-router-sync'
import store from './store'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';
require('./bootstrap')

Vue.use(ElementUI)

sync(store, router)

const app = new Vue({
  store,
  router,
  el: '#app',
  render: h => h(App)
})