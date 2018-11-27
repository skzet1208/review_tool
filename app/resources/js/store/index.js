import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isLogin: false,
    tickets: [],
  },
  mutations: {
    login: state => { state.isLogin = true },
    set_tickets: (state, payload) => { state.tickets = payload },
  },
})