<template lang="html">
    <div class="single wrapper">
        <h1 class="titre-principal">À propos</h1>
        <div v-if="apropos" class="contenu" v-html="content"></div>
    </div>
</template>

<script type="text/babel">
    export default {
        name: 'about',
        data () {
            return {
                slug: this.$route.params.slug
            }
        },
        computed: {
            apropos () { return this.$store.state.apropos },
            content () { return this.apropos.content }
        },
        created () {
            /**
            this.state.fetchAboutMe( this.slug )
            **/
        }
    }
</script>
