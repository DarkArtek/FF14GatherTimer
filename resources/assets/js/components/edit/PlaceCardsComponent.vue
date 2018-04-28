<template>
    <div class="uk-grid-match uk-child-width-1-3@l uk-child-width-1-2@m" uk-grid>
        <div v-for="gatherPlace in this.$store.state.area.gather_places">
            <div class="uk-card uk-card-default uk-card-hover" @mouseenter="setPointerIcon"
                 @mouseleave="resetMouseIcon">
                <div class="uk-card-header" style="padding:5px;">
                    <h3 class="uk-card-title">
                        <nav class="uk-navbar-container" uk-navbar>
                            <div class="uk-navbar-left">...</div>
                            <div class="uk-navbar-right">Lv.{{gatherPlace.level}}</div>
                        </nav>
                    </h3>
                </div>
                <ul class="uk-list uk-list-striped" style="margin:0;">
                    <li v-for="n in 8" style="padding:0; height:1.5rem">
                        <template v-for="gatherItem in gatherPlace.gather_items">
                            <template v-if="gatherItem.pivot.shelf_id === n">
                                <img :src="gatherItem.icon" style="width:1.5rem;">
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
        methods: {
            setPointerIcon() {
                document.body.style.cursor = 'pointer';
            },
            resetMouseIcon() {
                document.body.style.cursor = 'auto';
            }
        }
    };
</script>

<style scoped>

</style>