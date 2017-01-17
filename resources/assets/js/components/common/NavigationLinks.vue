<template>
    <nav class="header--menu">
        <router-link to="/services">Services</router-link>
        <router-link to="/projects">Projets</router-link>
        <router-link to="/bio">Bio</router-link>
        <router-link to="/contacts">Contacts</router-link>

        <ul>
            <li class="header--menu-item projets">
                <router-link :to="{ name: 'home' }" exact>Projets</router-link>
            </li>
            <li class="header--menu-item">
                <router-link :to="{ name: 'about' }" exact>À propos</router-link>
            </li>
            <li class="header--menu-item">
                <a href="mailto:eldorplus@gmail.com">Contact</a>
            </li>
            <li class="header--menu-item twitter">
                <a href="https://twitter.com/p-luzolo" target="_blank"></a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
  name: 'navigation-links'
}
</script>