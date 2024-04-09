import { defineStore } from "pinia";

export const useHotelStore = defineStore("hotelStore", {
  state: () => ({
    hotels: [],
    activeTab: 2,
  }),
  getters: {
    bookedHotels() {
      return this.hotels.filter((el) => el.isBooked);
    },
    totalCountHotels() {
      return this.hotels.length;
    },
  },
  actions: {
    setActiveTab(id) {
      this.activeTab = id;
    },
    toggleBooked(id) {
      const idx = this.hotels.findIndex((el) => el.id === id);
      this.hotels[idx].isBooked = !this.hotels[idx].isBooked;
    },
    deleteHotel(id) {
      this.hotels = this.hotels.filter((el) => el.id !== id);
    },
  },
});