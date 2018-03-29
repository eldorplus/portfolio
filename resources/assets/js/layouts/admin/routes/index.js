import Admin from '../components/Admin.vue'

export default {
    path: '/admin',
    name: 'admin',
    component: Admin,
    beforeEnter: (to, from, next) => {
        /**
        const auth = firebase.auth()
        auth.onAuthStateChanged(user => {
            if ( user ) {
                const id = user.uid
                firebase.database().ref('/admins/' + id)
                    .once('value').then(data => {
                        if ( data.val() )
                            next()
                        else next('/login')
                    })
            } else next('/login')
        })
        **/
    }
}