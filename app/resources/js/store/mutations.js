export default {
  // Auth
  token: (stare, payload) => { stare.token = payload },
  user: (state, payload) => { state.user = payload },
}