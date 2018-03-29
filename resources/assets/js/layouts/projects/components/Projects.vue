<template lang="html">
    <section id="projects-category" class="wrapper">
        <h1 class="titre-principal">Liste des projets web</h1>
        <div class="table">
            <article v-for="project in projects" class="item-project">
                <router-link v-if="project.CaseStudy" :to="{ name: 'project', params: { slug: project.slug }}">
                    <div class="cell date">
                        <time class="item-project--date">{{ project.year }}</time>
                    </div>

                    <div class="cell titre">
                        <h2 class="item-project--titre">{{ project.name }}</h2>
                    </div>

                    <div class="cell tags">
                        <ul class="item-project--dev">
                            <li class="front" :class="{on: project.frontend}" v-if="project.frontend"><span>Front</span></li>
                            <li class="back" :class="{on: project.backend}" v-if="project.backend"><span>Back</span></li>
                        </ul>
                        <ul class="item-project--tags">
                            <li v-for="tag in project.tags">
                                <span>{{ tag }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="cell bouton">
                        <router-link class="link suite" :to="{ name: 'project', params: { slug: project.slug }}"></router-link>
                    </div>
                </router-link>

                <a v-else :href="project.URL" target="_blank">
                    <div class="cell date">
                        <time class="item-project--date">{{ project.year }}</time>
                    </div>

                    <div class="cell titre">
                        <h2 class="item-project--titre">{{ project.name }}</h2>
                    </div>

                    <div class="cell tags">
                        <ul class="item-project--dev">
                            <li class="front" :class="{on: project.frontend}" v-if="project.frontend"><span>Front</span></li>
                            <li class="back" :class="{on: project.backend}" v-if="project.backend"><span>Back</span></li>
                        </ul>
                        <ul class="item-project--tags">
                            <li v-for="tag in project.tags">
                                <span>{{tag}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="cell bouton">
                        <a class="link external" :href="project.url"></a>
                    </div>
                </a>
            </article>
        </div>
    </section>
</template>

<script type="text/babel">
    export default {
        name: 'projects',
        data () {
            return {
                slug: this.$route.params.slug,
                status: false
            }
        },
        computed: {
            projects () {
                return this.$store.state.projects
            }
        },
        created () {
            /**
            setTimeout( () => {
                store.fetchProjets()
            }, 100)
            **/
        }
    }
</script>
