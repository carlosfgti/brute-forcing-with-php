import { createWebHistory, createRouter } from 'vue-router'
import SimpleFormLogin from '../views/SimpleFormLogin.vue'

const routes = [
    {
        path: '/',
        name: 'auth',
        component: SimpleFormLogin
    }
]

const router = createRouter({
	history: createWebHistory(),
	routes,
})
  
export default router
