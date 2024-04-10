import { createRouter, createWebHistory } from 'vue-router';
import Start from '/resources/js/Pages/Start.vue';
import Find from '/resources/js/Pages/Find.vue';
import HotelPage from '/resources/js/Pages/HotelPage.vue';

const routes = [
  { path: '/', name: 'Start', component: Start },
  { path: '/find', name: 'Find', component: Find },
  { path: '/hotels/:id', name: 'HotelPage', component: HotelPage }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
