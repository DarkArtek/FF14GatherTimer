<template>
    <div>
        <ul uk-accordion="multiple: true">
            <li v-for="region in this.$store.state.data" v-if="null === region.deleted_at && region.is_show" class="uk-animation-slide-right">
                <a class="uk-accordion-title" href="#">{{ region.name }}</a>
                <div class="uk-accordion-content">
                    <ul class="uk-list uk-list-striped area-list">
                        <li v-for="area in region.areas" v-if="null === area.deleted_at && area.is_show" @click="setViewArea(area)">{{ area.name }}</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</template>

<script lang="ts">
    import Vue, {ComponentOptions} from 'vue';

    interface DataInterface extends Vue {
        setViewArea(): void;
    }

    export default {
        data() {
            return {};
        },
        methods: {
            setViewArea(area) {
                this.$store.commit('setViewArea', area);
                this.$store.commit('setMainViewComponent', 'placeByArea');
            },
        }
    } as ComponentOptions<DataInterface>;
</script>
