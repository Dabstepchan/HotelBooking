<template>
  <div>
    <h2>Список отелей</h2>

    <input type="text" v-model="searchCity" placeholder="Введите город">

    <ul v-if="hotelsFiltered.length > 0">
      <li v-for="hotel in hotelsFiltered" :key="hotel.id" @click="goToHotelPage(hotel.id)" style="cursor: pointer;">
        {{ hotel.name }} - {{ hotel.location }} - {{ hotel.price }}
      </li>
    </ul>
    <p v-else-if="!hotelsFiltered.length && !hotelStore.loading && searchCity.trim() !== ''">Нет отелей в данном городе</p>
    <p v-else>Введите название города...</p>

    <!-- Включение компонента чата в нижнем правом углу -->
    <ChatSupport />
  </div>
</template>

<script>
import { defineComponent, ref, onMounted, watch } from 'vue';
import ChatSupport from '/resources/js/Components/ChatSupport.vue';
import { useHotelStore } from '/resources/js/Stores/hotelStore.js';
import { useRouter } from 'vue-router';

export default defineComponent({
  components: {
    ChatSupport // Регистрируем компонент чата
  },
  setup() {
    const hotelStore = useHotelStore();
    const searchCity = ref('');
    const router = useRouter();

    onMounted(() => {
      hotelStore.fetchHotels();
    });

    const hotelsFiltered = ref([]);
    const filterHotels = () => {
      if (searchCity.value.trim() === '') {
        hotelsFiltered.value = [];
      } else {
        hotelsFiltered.value = hotelStore.hotels.filter(hotel =>
          hotel.location.toLowerCase() === searchCity.value.toLowerCase()
        );
      }
    };

    watch(searchCity, filterHotels);

    const goToHotelPage = (hotelId) => {
      router.push({ name: 'HotelPage', params: { id: hotelId } });
    };

    return {
      searchCity,
      hotelsFiltered,
      hotelStore,
      goToHotelPage
    };
  },
});
</script>
