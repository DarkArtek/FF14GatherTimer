import Vue from "vue";
import GatherItem from "./GatherItem";

export default interface InterfaceGatherPlace extends Vue {
    id: number;
    name: string;
    class_id: number;
    type_id: number;
    area_id: number;
    level: number;
    start_time1: string;
    start_time2: string;
    start_time3: string;
    elapsed_time: string;
    memo: string;
    place_point: number;
    map: string;
    gather_items: GatherItem[];
}
