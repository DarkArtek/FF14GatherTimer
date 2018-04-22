<template>
    <li @click="setArea" @mouseenter="setPointerIcon" @mouseleave="resetMouseIcon">{{ areaName }}</li>
</template>

<script lang="ts">
    import Vue, {ComponentOptions} from 'vue'

    interface AreaInterface extends Vue {
        mapSrc: string,
        areaName: string,
        setArea(): void,
    }

    export {
        AreaInterface as interface
    }
    export default {
        props: ['mapSrc', 'areaName'],
        data() {
            return {
            }
        },
        methods: {
            setArea() {
                this.$store.commit('setMapSrc', this.mapSrc);
            },
            setPointerIcon(){
                document.body.style.cursor = 'pointer';
            },
            resetMouseIcon(){
                document.body.style.cursor = 'auto';
            }
        }
    } as ComponentOptions<AreaInterface>;
</script>

<style scoped>

</style>