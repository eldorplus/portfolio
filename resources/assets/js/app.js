/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
import App from './components/App.vue'
import store from './store'
import router from './router'

/**
 * register global utility filters.
 */
// Object.keys(filters).forEach(key => {
//   Vue.filter(key, filters[key])
// })

/**
 * @type {Vue}
 */
// eslint-disable-line no-new
const app = new Vue({
    name: 'main',
    el: '#app',
    template: '<app/>',
    router,
    store,
    render: h => h(App)
})


/**
 * expose the app, the router and the store.
 * note we are not mounting the app here, since bootstrapping will be
 * different depending on whether we are in a browser or on the server.
 **/
export { app, router, store }
