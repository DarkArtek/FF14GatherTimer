import Vue from "vue";
import Vuex from "vuex";
import Area from "../models/Area";
import GatherItem from "../models/GatherItem";
import MasterData from "../models/MasterData";
import Purified from "../models/Purified";

Vue.use(Vuex);

interface InterfaceData {
    data: MasterData;
    gatherItem: GatherItem;
    mainViewComponent: string;
    purifieds: Purified;
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
        setGatherItem(state, newGatherItem: GatherItem) {
            state.gatherItem = newGatherItem;
        },
        setViewArea(state, newArea: Area) {
            state.viewArea = newArea;
        },
        setPurified(state, newPurified: Purified) {
            state.purifieds = newPurified;
        },
        setMainViewComponent(state, mainView: string) {
            state.mainViewComponent = mainView;
        },
    },
    state: {
        data: {} as MasterData,
        gatherItem: {} as GatherItem,
        mainViewComponent: "",
        purifieds: {} as Purified,
        viewArea: {} as Area,
    },
});
