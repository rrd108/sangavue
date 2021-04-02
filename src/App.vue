<template>
  <div id="app">
    <Login v-if="!$store.state.token" />
    <div v-if="$store.state.token">
      <nav>
        <router-link to="/">Home</router-link>
      </nav>
      <main>
        <router-view/>
      </main>
    </div>
  </div>
</template>

<script>
import Login from '@/components/Login'

export default {
  name: 'App',
  components: {Login},
  data() {
    return {
    }
  }
}
</script>

<style>
/* 15848f-e5d580-eb6424 */
body {
  margin: 0;
}

#app, input {
  font-family: 'Quicksand', sans-serif;
  color: #2d2d2a;
}

#app {
  padding: 1rem;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #7c6a0a;
}

nav a.router-link-exact-active {
  color: #eb6424;
}

button {
  background: #15848f;
  color: #fff;
  padding: .3rem 1.3rem;
  border: none;
  transition: background 350ms ease-in-out;
  cursor: pointer;
}

button:hover {
  background: #eb6424;
}
</style>
