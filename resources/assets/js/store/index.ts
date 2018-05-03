import Vue from "vue";
import Vuex from "vuex";
import Area from "../models/Area";
import MasterData from "../models/MasterData";

Vue.use(Vuex);

interface InterfaceData {
    data: MasterData;
    mainViewComponent: string;
    viewArea: Area;
}

export default new Vuex.Store<InterfaceData>({
    mutations: {
        setData(state, newData) {
            // const result = {} as MasterData;
            // for (const data of newData) {
            //     result[data.id] = data;
            // }
            // state.data = result;
            state.data = newData;
        },
        setViewArea(state, newArea: Area) {
            state.viewArea = newArea;
        },
        setMainViewComponent(state, mainView: string) {
            state.mainViewComponent = mainView;
        },
    },
    state: {
        data: {} as MasterData,
        mainViewComponent: "",
        viewArea: {} as Area,
    },
});
