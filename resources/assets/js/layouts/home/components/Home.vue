<template lang="html">
    <div class="single wrapper">
        <h1 class="titre-principal">Home</h1>
        <div class="contenu" v-html="msg"></div>
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{
                msg:'hello vue'
            }
        }
    }
</script>
