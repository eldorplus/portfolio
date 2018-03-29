import Vue from 'vue'

class Store {
    constructor () {
        this.state = {
            status: false,
            breadcrumbs: false,
            projects: {
                projects: []
            },
            apropos: {
                articles: []
            },
            author: 'Patrick LUZOLO SIASIA'
        }
    }

    /* PROJETS */
    fetchProjets () {
        Vue.http.get('/project').then((response) => {
            this.state.projects.projects = response.data.entries
            this.state.state = true
            this.state.breadcrumbs = false
        });
    }

    specificProjet ( slug ) {
        Vue.http.get('/projects').then((response) => {

            this.state.projects.projects = response.data.entries.filter( function($el){
                return $el.Slug === slug
            });

            this.state.state = true

            this.state.breadcrumbs = {
                0: {
                    titre: 'Projets',
                    link: 'projects'
                },
                1: {
                    titre: this.state.projects.projects[0].Nom,
                    link: false
                }
            }
        });
    }

    /* PROJETS */
    fetchApropos () {
        Vue.http.get('/about-me').then((response) => {
            this.state.state = true
            this.state.apropos.articles = response.data.entries
            this.state.breadcrumbs = {
                0: {
                    titre: 'A propos'
                }
            }
        });
    }
}

let store = new Store ();
export default store;
