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
                        <div uk-grid>
                            <div class="uk-width-auto"><img :src="target.icon"></div>
                            <div class="uk-width-expand">
                                <label>
                                    <input v-model="form.name" class="uk-input" type="text" name="name">
                                </label>
                            </div>
                        </div>
                        <div uk-grid>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-star-text">★</label>
                                <input v-model="form.star" class="uk-input" id="form-star-text" type="text" name="star">
                            </div>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-level-text">レベル</label>
                                <input v-model="form.level" class="uk-input" id="form-level-text" type="text" name="level">
                            </div>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-patch-text">パッチ</label>
                                <input v-model="form.patch" class="uk-input" id="form-patch-text" type="text" name="patch">
                            </div>
                            <div class="uk-width-1-4">
                                <label class="uk-form-label" for="form-discernment-text">識質力</label>
                                <input v-model="form.discernment" class="uk-input" id="form-discernment-text" type="text" name="discrement">
                            </div>

                            <!--<div class="uk-width-1-4" v-for="purified in this.$store.state.purifieds">-->
                                <!--<label><input v-model="form.purified" class="uk-checkbox" name="purified[]" type="checkbox">{{purified.name}}</label>-->
                            <!--</div>-->
                        </div>
                    </form>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-primary uk-modal-close" type="button" @click="update(target.id)">
                        保存
                    </button>
                    <button class="uk-button uk-button-link uk-modal-close uk-margin-left" type="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import axios from 'axios';
    import Vue, {ComponentOptions} from 'vue';
    import UIkit from "uikit";

    interface DataInterface extends Vue {
        errorAnimation: boolean;
        target: {
            name: string;
            star: number;
            level: number;
            patch: string;
            discernment: number;
            purified: { [key: string]: string; };
        };
        form: {
            name: string;
            star: number;
            level: number;
            patch: string;
            discernment: number;
            purified: { [key: string]: string; };
            errors: { [key: string]: string; };
        };
    }

    export default {
        name: "edit-gather-item",
        props: ['target'],
        data() {
            return {
                errorAnimation: false,
                form: {
                    name: this.target.name,
                    star: this.target.star,
                    level: this.target.level,
                    patch: this.target.patch,
                    discernment: this.target.discernment,
                    purified: this.target.purified,
                    errors: []
                },
            };
        },
        methods: {
            update(gatherItemId) {
                this.errorAnimation = false;
                axios.put('/api/v1/gatherItem/' + gatherItemId, this.form)
                    .then(response => {
                        UIkit.notification('<span uk-icon=\'icon: check\'></span> 採取アイテム「' + this.form.name + '」を編集しました', 'success');
                        // 情報再取得
                        axios.get('/api/v1/gatherItem')
                            .then(response => {
                                this.$store.commit('setGatherItem', response.data.data);
                            });
                    })
                    .catch(error => {
                        console.log(error.response.request.response);
                        if (typeof error.response.data === 'object') {
                            if (error.response.data.errors) {
                                this.form.errors = error.response.data.errors;
                                this.form.errors.message = '処理に失敗しました。もう一度実行してください。';
                            } else if (error.response.data.message) {
                                this.form.errors.message = error.response.data.message;
                            } else {
                                this.form.errors.message = '処理に失敗しました。もう一度実行してください。';
                            }
                        }
                        else {
                            this.form.errors.message = '処理に失敗しました。もう一度実行してください。';
                        }
                        this.errorAnimation = true;
                    });
            },
        }
    } as ComponentOptions<DataInterface>;
</script>

<style scoped>

</style>