<template>
    <div>
        <a uk-icon="icon: pencil" class="uk-text-danger uk-animation-fade"
           :href="'#modal-edit-gather-item-' + target.id" uk-toggle></a>

        <div :id="'modal-edit-gather-item-' + target.id" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">採取アイテムの編集</h2>
                </div>
                <div class="uk-modal-body">
                    <form class="uk-form" role="form" @submit.prevent="update">
                        <div v-if="undefined !== this.form.errors.message" class="uk-alert-danger" uk-alert>
                            <p>{{this.form.errors.message}}</p>
                        </div>
                        <div uk-grid>
                            <div class="uk-width-auto">
                                <img :src="showIcon">
                            </div>
                            <div class="uk-width-expand">
                                <label>
                                    <input v-model="form.name"
                                           v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('name') }"
                                           class="uk-input" type="text" name="name">
                                </label>
                            </div>
                        </div>
                        <div class="uk-margin-top uk-margin-bottom">
                            <div class="js-upload" uk-form-custom>
                                <input type="file" multiple name="icon" @change="onDrop">
                                <button class="uk-button uk-button-link" type="button" tabindex="-1">アイコンの追加・編集</button>
                            </div>
                        </div>
                        <div uk-grid>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-star-text">★</label>
                                <input v-model="form.star"
                                       v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('star') }"
                                       class="uk-input" id="form-star-text" type="text" name="star">
                            </div>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-level-text">レベル</label>
                                <input v-model="form.level"
                                       v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('level') }"
                                       class="uk-input" id="form-level-text" type="text" name="level">
                            </div>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-patch-text">パッチ</label>
                                <input v-model="form.patch"
                                       v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('patch') }"
                                       class="uk-input" id="form-patch-text" type="text" name="patch">
                            </div>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-discernment-text">識質力</label>
                                <input v-model="form.discernment"
                                       v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('discernment') }"
                                       class="uk-input" id="form-discernment-text" type="text" name="discrement">
                            </div>
                            <div class="uk-width-1-4" v-for="purified in this.$store.state.purifieds">
                                <label><input v-model="form.purified_item_ids" :id="purified.id" :value="purified.id"
                                              class="uk-checkbox" name="purified[]"
                                              type="checkbox">{{purified.name}}</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-primary" type="button" @click="update(target.id)"
                            v-bind:class="{ 'uk-animation-shake': errorAnimation }">
                        保存
                    </button>
                    <button class="uk-button uk-button-link uk-margin-left" type="button" @click="cancel">Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import axios from 'axios';
    import Vue, {ComponentOptions} from 'vue';
    import UIkit from "uikit";
    import Purified from "../../models/Purified";

    interface DataInterface extends Vue {
        errorAnimation: boolean;
        errors: string[];
        showIcon: string;
        target: {
            id: number;
            name: string;
            star: number;
            level: number;
            patch: string;
            discernment: number;
            purified_items: Purified[];
            icon: string;
        };
        form: {
            name: string;
            star: number;
            level: number;
            patch: string;
            discernment: number;
            purified_item_ids: number[];
            errors: { [key: string]: string; };
            icon: Blob;
        };
        bar: string;
    }

    export default {
        name: "edit-gather-item",
        props: ['target'],
        data() {
            return {
                errorAnimation: false,
                errors: [],
                showIcon: this.target.icon,
                form: {
                    name: this.target.name,
                    star: this.target.star,
                    level: this.target.level,
                    patch: this.target.patch,
                    discernment: this.target.discernment,
                    purified_item_ids: this.target.purified_items.map(v => v.id),
                    icon: null,
                    errors: {}
                },
            };
        },
        methods: {
            update(gatherItemId) {
                this.errorAnimation = false;
                let formData = new FormData();
                formData.append('name', `${this.form.name}`);
                formData.append('star', `${this.form.star}`);
                formData.append('level', `${this.form.level}`);
                formData.append('patch', this.form.patch);
                if (null !== this.form.discernment) {
                    formData.append('discernment', `${this.form.discernment}`);
                }
                this.form.purified_item_ids.forEach(function(purified_item) {
                    formData.append('purified_items[]', `${purified_item}`);
                });
                if (null !== this.form.icon) {
                    formData.append('icon', this.form.icon);
                }

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                };

                axios.post('/api/v1/gatherItem/' + gatherItemId, formData, config)
                    .then(response => {
                        UIkit.modal(document.getElementById('modal-edit-gather-item-' + `${this.target.id}`)).hide();
                        UIkit.notification('<span uk-icon=\'icon: check\'></span> 採取アイテム「' + `${this.form.name}` + '」を編集しました', 'success');
                        // 情報再取得
                        axios.get('/api/v1/gatherItem')
                            .then(response => {
                                this.$store.commit('setGatherItem', response.data.data);
                            });
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            this.form.errors.message = error.response.data.message;
                        }
                        else {
                            this.form.errors.message = '処理に失敗しました。もう一度実行してください。';
                        }
                        this.errors = error.response.data.errors;
                        this.errorAnimation = true;
                    });
            },
            cancel() {
                this.showIcon = this.target.icon;
                this.form.name = this.target.name;
                this.form.star = this.target.star;
                this.form.level = this.target.level;
                this.form.patch = this.target.patch;
                this.form.discernment = this.target.discernment;
                this.form.purified_item_ids = this.target.purified_items.map(v => v.id);
                this.form.icon = new Blob();
                this.form.errors = {};
                UIkit.modal(document.getElementById('modal-edit-gather-item-' + this.target.id)).hide();
            },
            //ファイル選択で選んだファイルを取得する
            onDrop: function(event) {
                let file = event.target.files[0];
                let reader = new FileReader();
                const t = this;

                // 画像ファイル以外の場合は何もしない
                if (file.type.indexOf("image") < 0) {
                    return false;
                }

                this.form.icon = file;
                // ファイル読み込みが完了した際のイベント登録
                reader.onload = function(e) {
                    t.showIcon = reader.result;
                };
                reader.readAsDataURL(file);
            }
        }
    } as ComponentOptions<DataInterface>;
</script>

<style scoped>

</style>