import Vue from "vue";
import Area from "./Area";

export default interface InterfaceRegion extends Vue {
    id: number;
    name: string;
    is_show: boolean;
    deleted_at: string;
    areas: Area[];
}
