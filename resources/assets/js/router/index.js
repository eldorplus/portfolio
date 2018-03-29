import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '../layouts'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    scrollBehavior: () => ({ y: 0 }),
    routes
})

export default router

/**
 import ServicesPage from '../components/pages/Services.vue'
 import PortfolioPage from '../components/pages/Portfolio.vue'
 import BioPage from '../components/pages/Bio.vue'
 import OrderPage from '../components/pages/Order.vue'

 export default {
    mode: 'history',
    routes: [
        { path: '/services',    name: 'services',   component: ServicesPage },
        { path: '/portfolio',   name: 'portfolio',  component: PortfolioPage },
        { path: '/bio',         name: 'bio',        component: BioPage },
        { path: '/order',       name: 'order',      component: OrderPage },
        { path: '*',            name: '404',        component: NotFound }
    ]
}
 **/