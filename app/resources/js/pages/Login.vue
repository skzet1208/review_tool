<template>
  <div>
    <h1>Login</h1>

    <p>
      <label for="username">Email</label>

      <input type="text" name="username" v-model="username">
    </p>

    <p>
      <label for="password">Password</label>

      <input type="password" name="password" v-model="password">
    </p>

    <button @click="login">Login</button>
  </div>
</template>
 
<script>
export default {
  created() {
    this.isLogin();
  },

  data() {
    return {
      username: "",
      password: ""
    };
  },

  methods: {
    isLogin() {
      if (auth.check()) {
        this.$router.push("/dashboard");
      }
    },
    login() {
      let data = {
        username: this.username,
        password: this.password
      };

      axios
        .post("/api/login", data)
        .then(({ data }) => {
          auth.login(data.token, data.user);

          this.$router.push("/dashboard");
        })
        .catch(({ response }) => {
          if (response.status === 401) {
            this.logout();
          }
        });
    }
  }
};
</script>