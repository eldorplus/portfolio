<template>
    <nav class="header--menu">
        <ul>
            <li class="header--menu-item projets">
                <router-link :to="{ name: 'projects' }" exact>Projets</router-link>
            </li>
            <li class="header--menu-item">
                <router-link to="/services">Services</router-link>
            </li>
            <li class="header--menu-item">
                <router-link to="/bio">Bio</router-link>
            </li>
            <li class="header--menu-item">
                <router-link :to="{ name: 'about' }" exact>À propos</router-link>
            </li>
            <li class="header--menu-item">
                <router-link :to="{ name: 'contact' }" exact>Contact</router-link>
            </li>
            <li class="header--menu-item twitter">
                <a href="https://twitter.com/p-luzolo" target="_blank"></a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
  name: 'navigation'
}
</script>
