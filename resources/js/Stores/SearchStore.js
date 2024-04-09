import { defineStore } from "pinia";
import { useHotelStore } from "./HotelStore";
import axios from 'axios';

export const useSearchStore = defineStore("searchStore", {
  state: () => ({
    loader: false,
    hotels: [],
  }),
  actions: {
    async getHotels(search) {
        this.loader = true;
        try {
          const response = await axios.get(`/api/hotels`, { params: { search } });
          this.hotels = response.data;
        } catch (error) {
          console.error('Ошибка получения отелей:', error);
        }
        this.loader = false;
      },
      
    addToUserHotels(object) {
      const hotelStore = useHotelStore();
      hotelStore.hotels.push({ ...object, isBooked: false });
      hotelStore.activeTab = 1;
    },
  },
});
