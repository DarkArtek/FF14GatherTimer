<template>
    <div class="uk-card uk-card-default uk-animation-slide-left">
        <!--Header-->
        <div class="uk-card-header">
            <h2 class="uk-card-title">リージョン編集</h2>
        </div>

        <!--Body-->
        <div class="uk-card-body">
            <table class="uk-table uk-table-divider table-small">
                <thead>
                <tr>
                    <th class="uk-table-shrink"></th>
                    <th>リージョン / エリア</th>
                    <th class="uk-table-shrink uk-text-nowrap">表示</th>
                    <th class="uk-table-shrink uk-text-nowrap">削除</th>
                </tr>
                </thead>
                <tbody>
                <template v-for="region in this.$store.state.data">
                    <tr class="uk-background-muted">
                        <td class="{ 'text-delete': null !== region.deleted_at }">
                            <button :uk-toggle="'target: .region-' + region.id" type="button" class="uk-button uk-button-link">
                                <span uk-icon="icon: chevron-down" :class="'region-' + region.id" hidden></span>
                                <span uk-icon="icon: chevron-right" :class="'region-' + region.id"></span>
                            </button>
                        </td>
                        <td>
                            {{ region.name }}
                        </td>
                        <td>
                            <label><input class="uk-checkbox" type="checkbox" v-if="null === region.deleted_at"
                                          v-model="region.is_show"></label>
                        </td>
                        <td>
                            <delete-region :target="region"/>
                        </td>
                    </tr>
                    <tr v-for="area in region.areas" :class="'region-' + region.id" hidden>
                        <td></td>
                        <td :class="{ 'text-delete': null !== area.deleted_at }">
                            {{ area.name }}
                        </td>
                        <td>
                            <label><input class="uk-checkbox" type="checkbox" v-if="null === area.deleted_at"
                                          v-model="area.is_show"></label>
                        </td>
                        <td>
                            <delete-area :target="area"/>
                        </td>
                    </tr>
                </template>
                <tr>
                    <td></td>
                    <td class="uk-padding-remove-left">
                        <create-region/>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script lang="ts">
    import createRegion from './CreateRegionComponent.vue';
    import deleteRegion from './DeleteRegionComponent.vue';
    import deleteArea from './DeleteAreaComponent.vue';
    import Vue, {ComponentOptions} from 'vue';


    interface InterfaceData extends Vue {
        errorAnimation: number;
        form: {
            name: string;
            errors: { [key: string]: string; };
        };
    }

    export default {
        data() {
            return {
                errorAnimation: -1,
                form: {
                    name: '',
                    errors: []
                },
            };
        },
        components: {
            createRegion,
            deleteRegion,
            deleteArea,
        },
    } as ComponentOptions<InterfaceData>;
</script>

<style scoped>

</style>