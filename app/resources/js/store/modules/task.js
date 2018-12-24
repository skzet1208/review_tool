const state = {
  tickets: [],
  dialog_visible: false,
}

const getters = {
  tickets: state => (status_key) => {
    return state.tickets[status_key]
  },
  dialog_visible: state => {
    return state.dialog_visible
  },
}

const mutations = {
  myReviews: (state, payload) => { state.tickets = payload },
  tickets: (state, payload) => { state.tickets[payload.status_key] = payload.tickets },
  dialog_visible: (state, payload) => { state.dialog_visible = payload },
}

const actions = {
  myReviews: ({ commit }) => {
    return axios.post("/api/ticket/my/review", { user_id: 1 }).then(res => {
      commit("myReviews", res.data);
    });
  },
  tickets: ({ commit }, { status_key, tickets }) => {
    commit("tickets", { status_key: status_key, tickets: tickets })
  },
  dialog_visible: ({ commit }, bool_params) => {
    commit("dialog_visible", bool_params)
  },
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}