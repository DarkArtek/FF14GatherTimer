import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    mutations: {
        setArea(state, newArea) {
            state.area = newArea;
        },
    },
    state: {
        area: "",
    },
});
