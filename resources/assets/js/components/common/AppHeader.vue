<template>
    <header id="header">
        <div class="header--titre-site">
            <router-link :to="{ name: 'home' }"><h1>{{ title }}</h1></router-link>
        </div>
        <navigation-links></navigation-links>
    </header>
</template>

<script>
import NavigationLinks from './NavigationLinks.vue'
export default {
  name: 'app-header',
  props: ['title'],
  components: { NavigationLinks }
}
</script>