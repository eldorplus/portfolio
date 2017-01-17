<template>
    <footer id="footer">
        <p>Site développé avec <a href="http://laravel.com" target="_blank">Laravel</a> <small>(5.3)</small> ansi que
            <a href="https://vuejs.org/" target="_blank">Vue JS</a> <small>(Javascript Framework)</small> /
            <a href="https://github.com/eldorplus/portfolio" target="_blank">Github</a>
            <br>&copy;&nbsp;2017 - Patrick LUZOLO SIASIA - <a href="mailto:eldorplus@gmail.com">eldorplus@gmail.com</a>
        </p>
    </footer>
</template>

<script>
export default {
  name: 'app-footer',
  props: ['author']
}
</script>
