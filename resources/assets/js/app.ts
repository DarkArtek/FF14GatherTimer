// require("./bootstrap");

import UIkit from "uikit";
import Icons from "uikit/dist/js/uikit-icons";
import Vue from "vue";
import Vuex from "vuex";
import areaItem from "./components/edit/AreaComponent.vue";
import mapImage from "./components/edit/MapImageComponent.vue";
import passportAuthorizedClients from "./components/passport/AuthorizedClients.vue";
import passportClients from "./components/passport/Clients.vue";
import passportPersonalAccessTokens from "./components/passport/PersonalAccessTokens.vue";
import store from "./store";

UIkit.use(Icons);
Vue.use(Vuex);

new Vue({
    components: {
        "area-item": areaItem,
        "map-image": mapImage,
        "passport-authorized-clients": passportAuthorizedClients,
        "passport-client": passportClients,
        "passport-personal-access-tokens": passportPersonalAccessTokens,
    },
    el: "#app",
    store,
});
