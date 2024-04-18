<template>
  <Layout/>
  <div class="container">
    <router-view></router-view>
  </div>
</template>

<script>
import Layout from '/resources/js/layouts/Layout.vue'

export default {
  components: {
    Layout
  }
}
</script>
