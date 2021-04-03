<template>
  <div class="home">
    Sanga
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Home',
  data() {
    return {
      users: []
    }
  },
  created() {
    axios.get(`${process.env.VUE_APP_API_URL}users/index.json`, {
      headers: {
        'Authorization': `Token ${this.$store.state.token}`
      }
    })
    .then((res) => {
      console.log(res.data)
    })
    .catch((error) => {
      console.error(error)
    })
  }
}
</script>
