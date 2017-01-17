/**
import HomePage from '../components/pages/Home.vue'
import ServicesPage from '../components/pages/Services.vue'
import PortfolioPage from '../components/pages/Portfolio.vue'
import BioPage from '../components/pages/Bio.vue'
import ContactsPage from '../components/pages/Contacts.vue'
import OrderPage from '../components/pages/Order.vue'
import SinglePage from '../components/pages/Single.vue'

export default {
    mode: 'history',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
        { path: '/',            name: 'home',       component: HomePage },
        { path: '/services',    name: 'services',   component: ServicesPage },
        { path: '/portfolio',   name: 'portfolio',  component: PortfolioPage },
        { path: '/bio',         name: 'bio',        component: BioPage },
        { path: '/contacts',    name: 'contacts',   component: ContactsPage },
        { path: '/order',       name: 'order',      component: OrderPage },
        { path: '/about',       name: 'about',      component: AboutPage },
        { path: '/projects/:slug', name: 'project', component: SinglePage },
    ]
}
**/
import Vue from 'vue'
import VueRouter from 'vue-router'
import HomePage from '../components/pages/Home.vue'
import AboutPage from '../components/pages/About.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
        { path: '/',            name: 'home',       component: HomePage },
        { path: '/about',       name: 'about',      component: AboutPage },
    ]
})

export default router