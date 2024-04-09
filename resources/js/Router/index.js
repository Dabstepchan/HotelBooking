import {createRouter, createWebHistory} from 'vue-router'
import Start from '/resources/js/Pages/Start.vue'

const routes = [
  {path: '/', name: 'Start', component: Start},
  {path:'/find', name: 'Find', component: ()=>import('/resources/js/Pages/Find.vue')},
]

const router = createRouter({
  history: createWebHistory(),
  routes
})
export default router