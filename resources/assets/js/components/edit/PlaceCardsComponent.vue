<template>
    <div class="uk-grid-match uk-child-width-1-3@l uk-child-width-1-2@m" uk-grid>
        <div v-for="gatherPlace in this.$store.state.area.gather_places">
            <div class="uk-card uk-card-default uk-card-hover place-card">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        <div class="uk-clearfix">
                            <div class="uk-float-left">...</div>
                            <div class="uk-float-right">Lv.{{gatherPlace.level}}</div>
                        </div>
                    </h3>
                </div>
                <ul class="uk-list uk-list-striped">
                    <li v-for="n in 8">
                        <template v-for="gatherItem in gatherPlace.gather_items">
                            <template v-if="gatherItem.pivot.shelf_id === n">
                                <img :src="gatherItem.icon">
                                <span>{{gatherItem.name}}</span>
                            </template>
                        </template>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    export default {
        data() {
            return {
            }
        },
    };
</script>

<style scoped>

</style>