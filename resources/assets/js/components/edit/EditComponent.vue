<template>
    <div uk-grid class="uk-margin-bottom">
        <!--メイン-->
        <div class="uk-width-3-4">
            <place-by-area v-if="'placeByArea'===this.$store.state.mainViewComponent"></place-by-area>
            <edit-region-area v-if="'editRegionArea'===this.$store.state.mainViewComponent"></edit-region-area>
        </div>

        <!--サイドバー-->
        <div class="uk-width-1-4">
            <div class="uk-flex uk-flex-right uk-margin-bottom">
                <button class="uk-icon-button" uk-icon="pencil" @click="clickEditRegionArea"></button>
            </div>
            <side-menu/>
        </div>
    </div>
</template>

<script lang="ts">
    import axios from 'axios';
    import Vue, {ComponentOptions} from 'vue';
    import EditRegionArea from './EditRegionAreaComponent.vue';
    import placeByArea from './PlaceByAreaComponent.vue';
    import sideMenu from './SideMenuComponent.vue';

    interface DataInterface extends Vue {
        getMaster(): void;
    }

    export default {
        name: "edit",
        components: {
            EditRegionArea,
            sideMenu,
            placeByArea,
        },
        data() {
            return {
            };
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
            },
            clickEditRegionArea(){
                this.$store.commit('setMainViewComponent', 'editRegionArea');
            },
        }
    } as ComponentOptions<DataInterface>;
</script>