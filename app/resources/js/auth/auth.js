import store from "../store"

class Auth {
  constructor() {
    let token = window.localStorage.getItem('token')
    store.dispatch('token', token)

    let userData = window.localStorage.getItem('user')
    userData = userData ? JSON.parse(userData) : null
    store.dispatch('user', userData)

    if (token) {
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + token

      this.getUser()
    }
  }

  login(token, user) {
    window.localStorage.setItem('token', token)
    window.localStorage.setItem('user', JSON.stringify(user))

    axios.defaults.headers.common['Authorization'] = 'Bearer ' + token

    store.dispatch('token', token)
    store.dispatch('user', user)
  }

  logout() {
    // ローカルストレージ削除

    // tokenの無効化
  }

  check() {
    return !!store.getters.token
  }

  getUser() {
    api.call('get', '/api/user')
      .then(({ data }) => {
        store.dispatch('user', data)
      })
  }
}

export default Auth