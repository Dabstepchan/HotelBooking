import { createRouter, createWebHistory } from 'vue-router';
import Start from '/resources/js/pages/Start.vue';
import Find from '/resources/js/pages/Find.vue';
import HotelPage from '/resources/js/pages/HotelPage.vue';

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
