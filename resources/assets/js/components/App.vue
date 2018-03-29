<template lang="html">
  <div id="app" class="fx" :class="{ready: status}">
    <app-header :title="title"></app-header>

    <main id="main">
      <transition name="skew" mode="out-in" appear>
        <router-view></router-view>
      </transition>
    </main>
    <app-footer :author="author"></app-footer>
  </div>
</template>

<script type="text/babel">
import AppHeader from './common/AppHeader.vue'
import AppFooter from './common/AppFooter.vue'

export default {
  name: 'App',
  data () {
    return { }
  },
  components: {
    AppHeader,
    AppFooter
  },
  computed: {
    title () { return 'PLUS'},
    author () { return this.$store.state.author },
    status () { return this.$store.state.status }
  },
  created () {
    this.$router.beforeEach((to, from, next) => {
      let currentScroll = document.documentElement.scrollTop || document.body.scrollTop

      if(currentScroll > 0) {
        jump('#header', {
          duration: 250,
          callback: () => { next() }
        })
      } else { next() }
    });
  },
  mounted () {
    console.log('%c Sources → https://github.com/eldorplus/portfolio ', 'background: #02AAB0; color: #fff; padding: 5px;');
  }
}
</script>
