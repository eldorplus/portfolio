<template lang="html">
    <header class="header">
        <div class="header--titre-site">
            <router-link :to="{ name: 'home' }"><h1>{{ title }}</h1></router-link>
        </div>
        <navigation></navigation>
    </header>
</template>

<script type="text/babel">
import Navigation from './Navigation.vue'
export default {
  name: 'app-header',
  props: ['title'],
  components: { Navigation }
}
</script>
