import Vue from 'vue'
import Vuex from 'vuex'
import mutations from './mutations'
import actions from './actions'
import task from './modules/task'

Vue.use(Vuex)

export default new Vuex.Store({
  // Global
  state: {
    // Auth
    token: '',
    user: [],
  },
  getters: {
    // Auth
    token: state => { return state.token },
    user: state => { return state.user },
  },
  modules: {
    task,
  },
  mutations,
  actions,
})