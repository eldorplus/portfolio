<template>
  <div id="app" class="fx" :class="{ready: state}">
    <app-header :title="title"></app-header>

    <main id="main">
      <transition name="skew" mode="out-in" appear>
        <router-view></router-view>
      </transition>
    </main>
    <app-footer :author="author"></app-footer>
  </div>
</template>

<script>
import AppHeader from './components/common/AppHeader.vue'
import AppFooter from './components/common/AppFooter.vue'

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
    title: function () { return 'PLUS'},
    //author: function () { return this.$store.state.author }
  },
  created () {
    this.$router.beforeEach((to, from, next) => {
      var currentScroll = document.documentElement.scrollTop || document.body.scrollTop

      if(currentScroll > 0) {
        jump('#header', {
          duration: 250,
          callback: function() { next() }
        })
      } else { next() }
    });
  },
  mounted () {
    console.log('%c Sources → https://github.com/eldorplus/portfolio ', 'background: #02AAB0; color: #fff; padding: 5px;');
  }
}
</script>
