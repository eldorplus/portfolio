<template lang="html">
    <div id="contenu-single" class="single">
        <div class="wrapper" v-for="project in projects">
            <h1 class="titre-principal">{{ project.name }}</h1>

            <p v-if="project.url">
                <a :href="project.url" class="bouton external lien-project" target="_blank">Visiter le site</a>
            </p>

            <div class="contenu" v-html="content"></div>

            <ul class="project-galery">
                <li v-for="image in project.galerie">
                    <img :src="'/' + image.path" :alt="image.meta.title">
                </li>
            </ul>

            <p class="lien-retour">
                <router-link :to="{ name: 'projects' }">Retour à la liste des projets</router-link>
            </p>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        name: 'project',
        data () {
            return {
                slug: this.$route.params.slug
            }
        },
        computed: {
            projects () { return this.$store.state.projects },
            content () { return this.projects[0].content }
        },
        created () {
            /**
            store.specificProjet( this.slug )
            **/
        }
    }
</script>
