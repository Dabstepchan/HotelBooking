<template>
    <TheNavigation/>
    <div class="container">
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  import TheNavigation from '/resources/js/Components/TheNavigation.vue'
  export default{
    components: {TheNavigation}
  }
  </script>
  