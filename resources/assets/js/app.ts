import UIkit from "uikit";
import Icons from "uikit/dist/js/uikit-icons";
import Vue from "vue";
import Vuex from "vuex";
import bootstrap from "./bootstrap";
import edit from "./components/edit/EditComponent.vue";
import passportAuthorizedClients from "./components/passport/AuthorizedClients.vue";
import passportClients from "./components/passport/PassportClients.vue";
import passportPersonalAccessTokens from "./components/passport/PersonalAccessTokens.vue";
import store from "./store";

bootstrap();
UIkit.use(Icons);
Vue.use(Vuex);

new Vue({
    components: {
        "edit": edit,
        "passport-authorized-clients": passportAuthorizedClients,
        "passport-clients": passportClients,
        "passport-personal-access-tokens": passportPersonalAccessTokens,
    },
    el: "#app",
    store,
});
