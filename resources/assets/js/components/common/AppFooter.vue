<template lang="html">
    <footer id="footer">
        <p>Site développé avec <a href="http://laravel.com" target="_blank">Laravel</a> <small>(5.4)</small> ansi que
            <a href="https://vuejs.org/" target="_blank">Vue JS</a> <small>(Javascript Framework)</small> /
            <a :href="author.hyperlink" target="_blank">Github</a>
            <br>Copyright &copy;&nbsp;{{ year }} - {{ author.name }} - <a :href="'mailto:' + author.mail">{{ author.mail }}</a>
        </p>
    </footer>
</template>

<script type="text/babel">
export default {
  name: 'app-footer',
  props: ['author'],
  computed: {
      year() {
          const date = new Date()
          return date.getFullYear()
      }
  }
}
</script>
