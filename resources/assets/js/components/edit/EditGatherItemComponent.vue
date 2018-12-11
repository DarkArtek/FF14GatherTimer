<template>
    <div :id="this.modalId" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title" v-if="isCreate">採取アイテムの作成</h2>
                <h2 class="uk-modal-title" v-else>採取アイテムの編集</h2>
            </div>
            <div class="uk-modal-body">
                <form class="uk-form" role="form" @submit.prevent="update">
                    <div v-if="'' !== errorMessage" class="uk-alert-danger" uk-alert>
                        <p>{{errorMessage}}</p>
                    </div>
                    <div uk-grid>
                        <div class="uk-width-auto">
                            <img :src="showIcon">
                        </div>
                        <div class="uk-width-expand">
                            <label>
                                <input v-model="target.name"
                                       v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('name') }"
                                       class="uk-input" type="text" name="name">
                            </label>
                        </div>
                    </div>
                    <div class="uk-margin-top uk-margin-bottom">
                        <div uk-form-custom>
                            <input type="file" @change="onDrop" v-if="switchFile">
                            <button class="uk-button uk-button-link" type="button" tabindex="-1">アイコンの追加・編集</button>
                        </div>
                    </div>
                    <div uk-grid>
                        <div class="uk-width-1-4">
                            <label class="uk-form-label" for="form-star-text">★</label>
                            <input v-model="target.star"
                                   v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('star') }"
                                   class="uk-input" id="form-star-text" type="text" name="star">
                        </div>
                        <div class="uk-width-1-4">
                            <label class="uk-form-label" for="form-level-text">レベル</label>
                            <input v-model="target.level"
                                   v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('level') }"
                                   class="uk-input" id="form-level-text" type="text" name="level">
                        </div>
                        <div class="uk-width-1-4">
                            <label class="uk-form-label" for="form-p
                            atch-text">パッチ</label>
                            <input v-model="target.patch"
                                   v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('patch') }"
                                   class="uk-input" id="form-patch-text" type="text" name="patch">
                        </div>
                        <div class="uk-width-1-4">
                            <label class="uk-form-label" for="form-discernment-text">識質力</label>
                            <input v-model="target.discernment"
                                   v-bind:class="{ 'uk-form-danger' : errors.hasOwnProperty('discernment') }"
                                   class="uk-input" id="form-discernment-text" type="text" name="discrement">
                        </div>
                        <div class="uk-width-1-4" v-for="purified in this.$store.state.purifieds">
                            <label><input v-model="checked_purified_ids" :id="purified.id"
                                          :value="purified.id"
                                          class="uk-checkbox" name="purified[]"
                                          type="checkbox">{{purified.name}}</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary " type="button" @click="update()"
                        :class="{ 'uk-animation-shake': errorAnimation }">
                    保存
                </button>
                <button class="uk-button uk-button-link uk-margin-left uk-modal-close" type="button">Cancel
                </button>
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
        errorMessage: string;
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
        checked_purified_ids: number[];
        showIcon: string;
        newIcon: Blob;
        switchFile: boolean;
        isCreate: number;
        modalId: string;
    }

    export default {
        name: "edit-gather-item",
        props: ['isCreate', 'modalId'],
        data() {
            return {
                errorAnimation: false,
                errors: [],
                errorMessage: '',
                checked_purified_ids: [],
                showIcon: '',
                newIcon: new Blob(),
                switchFile: true,
                target: {
                    id: null,
                    name: '',
                    star: 0,
                    level: null,
                    patch: null,
                    discernment: null,
                    purified_items: [],
                    icon: null,
                }
            };
        },
        methods: {
            update() {
                this.errorAnimation = false;
                let formData = new FormData();
                formData.append('name', `${this.target.name}`);
                formData.append('star', `${this.target.star}`);
                formData.append('level', `${this.target.level}`);
                formData.append('patch', this.target.patch);
                if (null !== this.target.discernment) {
                    formData.append('discernment', `${this.target.discernment}`);
                }
                this.checked_purified_ids.forEach(function(purified_id) {
                    formData.append('purified_items[]', `${purified_id}`);
                });
                if (0 < this.newIcon.size) {
                    formData.append('icon', this.newIcon);
                }


                let url = '/api/v1/gatherItem';
                let $method;
                if (this.isCreate) {
                    $method = 'POST';
                } else {
                    url += '/' + this.target.id;
                    $method = 'PUT';
                }

                let config = {
                    headers: {
                        'content-type': 'multipart/form-target',
                        'X-HTTP-Method-Override': $method,
                    }
                };

                axios.post(url, formData, config)
                    .then(response => {
                        let message = '';
                        UIkit.modal(document.getElementById(this.modalId)).hide();
                        if (this.isCreate) {
                            message = '採取アイテム「' + `${this.target.name}` + '」を作成しました';
                        } else {
                            message = '採取アイテム「' + `${this.target.name}` + '」を編集しました';
                        }

                        UIkit.notification('<span uk-icon=\'icon: check\'></span> ' + message, 'success');
                        // 情報再取得
                        axios.get('/api/v1/gatherItem')
                            .then(response => {
                                this.$store.commit('setData', response.data.data);
                            });
                    })
                    .catch(error => {
                        this.errorAnimation = true;
                        if (typeof error.response.data === 'object') {
                            this.errorMessage = error.response.data.message;
                        }
                        else {
                            this.errorMessage = '処理に失敗しました。もう一度実行してください。';
                        }
                        this.errors = error.response.data.errors;
                    });
            },
            //ファイル選択で選んだファイルを取得する
            onDrop: function(event) {
                let file = event.target.files[0];
                let reader = new FileReader();
                let t = this;

                // 画像ファイル以外の場合は何もしない
                if (file.type.indexOf("image") < 0) {
                    return false;
                }

                this.newIcon = file;
                // ファイル読み込みが完了した際のイベント登録
                reader.onload = function(e) {
                    t.showIcon = reader.result;
                };
                reader.readAsDataURL(file);
            },
            resetData: function(newTarget) {
                this.errors = [];
                this.errorMessage = '';
                this.target = newTarget;
                this.showIcon = this.target.icon;
                this.newIcon = new Blob();
                this.checked_purified_ids = this.target.purified_items.map(v => v.id);

                // input fileの再生性
                this.switchFile = false;
                this.$nextTick(function() {
                    this.switchFile = true;
                });
            },
        }
    } as ComponentOptions<DataInterface>;
</script>

<style scoped>

</style>