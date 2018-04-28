<template>
    <div class=" uk-flex uk-flex-center" v-if="this.$store.state.area.map">
        <div class="uk-inline uk-light">
            <img :src='this.$store.state.area.map' class="uk-width-large uk-height-large"/>
            <!--TODO 採取場所の表示-->
            <!--<a class="uk-position-absolute uk-transform-center" style="left: 20%; top: 30%" href="#" uk-marker></a>-->
            <!--<a class="uk-position-absolute uk-transform-center" style="left: 60%; top: 40%" href="#" uk-marker></a>-->
            <!--<a class="uk-position-absolute uk-transform-center" style="left: 80%; top: 70%" href="#" uk-marker></a>-->
        </div>
    </div>
</template>

<script lang="ts">
    export default {
        data() {
            return {};
        },
    };
</script>

<style scoped>

</style>