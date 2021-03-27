<template>
  <div id="app">
    <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </div>
    <router-view/>
  </div>
</template>

<style>
/* 15848f-e5d580-2d2d2a-7c6a0a-eb6424 */
#app {
  font-family: 'Quicksand', sans-serif;
  text-align: center;
  color: #2d2d2a;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #7c6a0a;
}

#nav a.router-link-exact-active {
  color: #eb6424;
}
</style>
