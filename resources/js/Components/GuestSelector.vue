<template>
  <div class="selector">
    <div class="selector-content">
      <div class="selector-title">1 номер для ({{ selectedGuests }} {{ guestLabel }})</div>
      <span @click="showPopover = !showPopover" style="text-decoration: underline; cursor: pointer;">Изменить количество гостей</span>
      <transition name="fade">
        <div v-if="showPopover" class="popover">
          <div class="form-group">
            <label for="adults">Взрослые:</label>
            <input type="number" id="adults" v-model="selectedAdults" @change="updateGuests">
          </div>
          <div class="form-group">
            <label for="children">Дети:</label>
            <input type="number" id="children" v-model="selectedChildren" @change="updateGuests">
          </div>
          <button @click="applyChanges">Применить</button>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedAdults: 2,
      selectedChildren: 0,
      showPopover: false,
    };
  },
  computed: {
    selectedGuests() {
      return this.selectedAdults + this.selectedChildren;
    },
    guestLabel() {
      return this.selectedGuests === 1 ? 'гость' : 'гостей';
    }
  },
  methods: {
    applyChanges() {
      this.$emit('updateGuests', this.selectedGuests);
      this.showPopover = false;
    },
    updateGuests() {
      this.$emit('updateGuests', this.selectedGuests);
    },
  },
};
</script>
