import Vue from 'vue'

//request.defaults.baseURL = 'http://portfolio.app/api/' // TODO: extract configuration to ENV

export const fetchProjects = ({ commit, state }) => {
    return Vue.http.get('/projets').then((response) => {
        if (response.statusText === 'OK') {
            commit('SET_PROJECTS', response.data)
        }
    }).catch((error) => {
        console.log(error)
    })
}

export const fetchSnapshot = ({ commit, state }) => {
    return Vue.http.get('/snapshot').then((response) => {
        if (response.statusText === 'OK') {
            commit('SET_SNAPSHOT', response.data)
        }
    }).catch((error) => {
        console.log(error)
    })
}

export const fetchAboutMe = ({ commit, state }) => {
    return Vue.http.get('/about-me').then((response) => {
        if (response.statusText === 'OK') {
            commit('SET_ABOUT_ME', response.data)
        }
    }).catch((error) => {
        console.log(error)
    })
}