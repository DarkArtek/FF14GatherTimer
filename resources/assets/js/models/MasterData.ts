import Vue from "vue";
import Region from "./Region";

export default interface InterfaceMasterData extends Vue {
    [index: number]: Region;
}
