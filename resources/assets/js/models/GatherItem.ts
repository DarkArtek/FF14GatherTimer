import Vue from "vue";

export default interface InterfaceGatherItem extends Vue {
    name: string;
    level: number;
    star: number;
    limit: boolean;
    patch: string;
    memo: string;
    icon: string;
    icon_path: string;
}
