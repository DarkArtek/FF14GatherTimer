<template>
    <div class="uk-card uk-card-default uk-animation-slide-left">
        <!--Header-->
        <div class="uk-card-header">
            <h2 class="uk-card-title">アイテム編集</h2>
        </div>

        <!--Body-->
        <div class="uk-card-body">
            <table class="uk-table uk-table-divider table-small">
                <thead>
                <tr>
                    <th class="uk-text-center uk-table-shrink uk-text-nowrap">画像</th>
                    <th class="uk-text-center" style="width: 30px">Lv.</th>
                    <th class="uk-text-center" style="width: 30px">★</th>
                    <th class="uk-text-center">アイテム名</th>
                    <th class="uk-text-center" style="width: 30px">識質</th>
                    <th class="uk-text-center" style="width: 40px">精選</th>
                    <th class="uk-table-shrink uk-text-nowrap">編集</th>
                    <th class="uk-table-shrink uk-text-nowrap">削除</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="gatherItem in this.$store.state.gatherItem">
                    <td class="uk-text-middle">
                        <img :src="gatherItem.icon">
                    </td>
                    <td class="uk-text-middle">
                        {{ gatherItem.level }}
                    </td>
                    <td class="uk-text-middle">
                        {{ gatherItem.star }}
                    </td>
                    <td class="uk-text-middle">
                        {{ gatherItem.name }}
                    </td>
                    <td class="uk-text-middle">
                        {{ gatherItem.discernment }}
                    </td>
                    <td class="uk-text-middle">
                        <span class="uk-label" v-for="purified_item in gatherItem.purified_items">
                            {{ purified_item.name }}
                        </span>
                    </td>
                    <td class="uk-text-middle">
                        <edit-gather-item :target="gatherItem"/>
                    </td>
                    <td class="uk-text-middle">
                        <delete-gather-item :target="gatherItem"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script lang="ts">
    import createItem from './CreateRegionComponent.vue';
    import editGatherItem from './EditGatherItemComponent.vue';
    import deleteGatherItem from './DeleteGatherItemComponent.vue';
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
            createItem,
            editGatherItem,
            deleteGatherItem,
        },
    } as ComponentOptions<InterfaceData>;
</script>

<style scoped>

</style>