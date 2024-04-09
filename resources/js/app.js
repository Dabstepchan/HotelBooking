import { createApp } from 'vue';
import { createPinia } from 'pinia'
import App from '/resources/js/App.vue';
import router from '/resources/js/Router/index.js'

const pinia = createPinia()

createApp(App)
  .use(router)
  .use(pinia)
  .mount('#app');
