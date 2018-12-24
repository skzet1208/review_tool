export default {
  // Auth
  token: ({ commit }, token) => {
    commit('token', token)
  },
  user: ({ commit }, user) => {
    commit('user', user)
  },
}