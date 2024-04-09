<template>
  <div class="selector">
    <div class="selector-content">
      <div class="selector-title">Заезд:</div>
      <input type="date" v-model="checkInDate" @change="updateCheckInDate">
    </div>
    <div class="selector-content">
      <div class="selector-title">Выезд:</div>
      <input type="date" v-model="checkOutDate" @change="updateCheckOutDate">
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      checkInDate: '',
      checkOutDate: ''
    }
  },
  methods: {
    updateCheckInDate() {
      this.$emit('updateCheckInDate', this.checkInDate);
    },
    updateCheckOutDate() {
      this.$emit('updateCheckOutDate', this.checkOutDate);
    }
  }
}
</script>
