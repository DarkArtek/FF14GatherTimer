<template>
    <div class="uk-animation-slide-left">
        <map-image/>
        <place-cards class="uk-margin-top"/>
    </div>
</template>

<script lang="ts">
    import mapImage from "./MapImageComponent.vue";
    import placeCards from "./PlaceCardsComponent.vue";

    export default {
        name: "place-by-area",
        components: {
            mapImage,
            placeCards,
        },
    };
</script>