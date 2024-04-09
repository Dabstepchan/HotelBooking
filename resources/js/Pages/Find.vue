<template>
  <div class="find-page">
    <div class="search-container">
      <h2 class="search-header">Найти отель</h2>
      <div class="selectors-container">
        <LocationSelector></LocationSelector>
        <DateSelector></DateSelector>
        <GuestSelector @updateGuests="updateGuests"></GuestSelector>
      </div>
      <button @click="search" class="search-btn">Найти</button>
    </div>
  </div>
</template>

<script>
import LocationSelector from '/resources/js/Components/LocationSelector.vue'; 
import DateSelector from '/resources/js/Components/DateSelector.vue'; 
import GuestSelector from '/resources/js/Components/GuestSelector.vue';
import { useSearchStore } from '/resources/js/Stores/SearchStore.js';
import axios from 'axios';

export default {
  components: {
    LocationSelector,
    DateSelector,
    GuestSelector
  },
  data() {
    return {
      location: '',
      checkInDate: '',
      checkOutDate: '',
      guests: 0
    }
  },
  methods: {
    async search() {
      const searchStore = useSearchStore();
      const searchQuery = this.buildSearchQuery();

      try {
        const response = await axios.get('/api/hotels', {
          params: { search: searchQuery.location }
        });
        searchStore.hotels = response.data;
        console.log('Ответ от сервера:', searchStore.hotels);
      } catch (error) {
        console.error('Ошибка при поиске отелей:', error);
      }
    },
    buildSearchQuery() {
      this.location = this.location;
      let query = `location=${this.location}`;
      return query;
    },
    updateLocation(location) {
      this.location = location;
    },
    updateCheckInDate(checkInDate) {
      this.checkInDate = checkInDate;
    },
    updateCheckOutDate(checkOutDate) {
      this.checkOutDate = checkOutDate;
    },
    updateGuests(guests) {
      this.guests = guests;
    }
  }
}
</script>