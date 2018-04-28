import Vue from "vue";
import GatherPlace from "./GatherPlace";

export default interface InterfaceArea extends Vue {
    name: string;
    region_id: number;
    patch: string;
    map: string;
    gather_places: GatherPlace[];
}
