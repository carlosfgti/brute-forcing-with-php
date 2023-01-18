import { createWebHistory, createRouter } from 'vue-router'
import SimpleFormLogin from '../views/SimpleFormLogin.vue'
import Dash from '../views/Dash.vue'

const routes = [
    {
        path: '/',
        name: 'auth',
        component: SimpleFormLogin
    }, {
        path: '/dash',
        name: 'dash',
        component: Dash
    },
]

const router = createRouter({
	history: createWebHistory(),
	routes,
})
  
export default router
