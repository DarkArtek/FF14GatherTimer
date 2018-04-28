<template>
    <li @click="setArea">{{ data.name }}</li>
</template>

<script lang="ts">
    import Vue, {ComponentOptions} from 'vue'
    import Area from '../../models/Area'

    export interface Data extends Vue {
        data: Area;
    }

    export default {
        props: {
            data: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {}
        },
        methods: {
            setArea() {
                this.$store.commit('setArea', this.data);
            },
        }
    } as ComponentOptions<Data>;
</script>

<style scoped>

</style>