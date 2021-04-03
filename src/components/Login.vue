<template>
  <form id="login" @submit.prevent="login">
    <div>
      <img src="@/assets/logo.png" alt="logo">
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" v-model="email" id="email">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" v-model="password" id="password">
    </div>
    <div>
      <button>Login</button>
    </div>
    <div>
      Pass Reminder
    </div>
  </form>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {
    login() {
      axios({
        method: 'post',
        url: `${process.env.VUE_APP_API_URL}users/login.json`,
        data: {
          email: this.email,
          password: this.password
        }
      })
      .then(response => this.$store.commit('saveToken', response.data.token))
      .catch(err => console.error(err))
    }
  }
}
</script>

<style scoped>
#login {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-size: 2rem;
}

#login div {
  margin: 1rem 0;
}

img {
  width: 40vw;
}

label {
  min-width: 20vw;
  display: inline-block;
}

input, button {
  font-size: 2rem;
  max-width: 80vw;
}

</style>