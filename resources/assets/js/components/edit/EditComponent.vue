<template>
    <div uk-grid class="uk-margin-bottom">
        <!--メイン-->
        <div class="uk-width-3-4">
            <place-by-area v-if="'placeByArea'===this.$store.state.mainViewComponent"></place-by-area>
            <edit-region-area v-if="'editRegionArea'===this.$store.state.mainViewComponent"></edit-region-area>
            <list-gather-item v-if="'listGatherItem'===this.$store.state.mainViewComponent"></list-gather-item>
        </div>

        <!--サイドバー-->
        <div class="uk-width-1-4">
            <side-menu/>
                <a class="uk-width-1-1 uk-button uk-button-primary" type="button" @click="clickEditRegionArea">
                    リージョン編集
                </a>
                <a class="uk-width-1-1 uk-button uk-button-primary uk-margin-small-top" type="button" @click="clickListGatherItem">
                    アイテム編集
                </a>
        </div>
    </div>
</template>

<script lang="ts">
    import axios from 'axios';
    import Vue, {ComponentOptions} from 'vue';
    import EditRegionArea from './EditRegionAreaComponent.vue';
    import ListGatherItem from './ListGatherItemComponent.vue';
    import placeByArea from './PlaceByAreaComponent.vue';
    import sideMenu from './SideMenuComponent.vue';

    interface DataInterface extends Vue {
        getMaster(): void;
    }

    export default {
        name: "edit",
        components: {
            EditRegionArea,
            ListGatherItem,
            sideMenu,
            placeByArea,
        },
        data() {
            return {};
        },
        mounted(this: DataInterface) {
            this.getMaster();
        },
        methods: {
            getMaster() {
                axios.get('/api/v1/master')
                    .then(response => {
                        this.$store.commit('setData', response.data.data);
                    });
                axios.get('/api/v1/gatherItem')
                    .then(response => {
                        this.$store.commit('setGatherItem', response.data.data);
                    });
                axios.get('/api/v1/purified')
                    .then(response => {
                        this.$store.commit('setPurified', response.data.data);
                    });
            },
            clickEditRegionArea() {
                this.$store.commit('setMainViewComponent', 'editRegionArea');
            },

            clickListGatherItem() {
                this.$store.commit('setMainViewComponent', 'listGatherItem');
            },
        }
    } as ComponentOptions<DataInterface>;
</script>