import './bootstrap';

import { createApp } from 'vue';
import { createPinia } from 'pinia'
import App from '/resources/js/app.vue';
import router from '/resources/js/router/index.js'

const pinia = createPinia()

createApp(App)
  .use(router)
  .use(pinia)
  .mount('#app');
