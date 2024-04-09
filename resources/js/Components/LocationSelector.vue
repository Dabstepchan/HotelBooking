<template>
  <div class="selector">
      <div class="selector-content">
        <div class="selector-title">Направление:</div>
        <input type="text" v-model="location" @input="updateLocation">
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      location: ''
    }
  },
  methods: {
    updateLocation() {
      this.$emit('updateLocation', this.location);
    }
  }
}
</script>
