import UIkit from "uikit";
import Icons from "uikit/dist/js/uikit-icons";
import Vue from "vue";
import Vuex from "vuex";
import bootstrap from "./bootstrap";
import areaItem from "./components/edit/AreaComponent.vue";
import mapImage from "./components/edit/MapImageComponent.vue";
import placeCards from "./components/edit/PlaceCardsComponent.vue";
import passportAuthorizedClients from "./components/passport/AuthorizedClients.vue";
import passportClients from "./components/passport/Clients.vue";
import passportPersonalAccessTokens from "./components/passport/PersonalAccessTokens.vue";
import store from "./store";

bootstrap();
UIkit.use(Icons);
Vue.use(Vuex);

new Vue({
    components: {
        "area-item": areaItem,
        "map-image": mapImage,
        "passport-authorized-clients": passportAuthorizedClients,
        "passport-client": passportClients,
        "passport-personal-access-tokens": passportPersonalAccessTokens,
        "place-cards": placeCards,
    },
    el: "#app",
    store,
});
