<template>
    <div>
        <div v-if="null === target.deleted_at" v-bind:class="{ 'uk-animation-shake': errorAnimation }">
            <a uk-icon="icon: trash" class="uk-text-danger uk-animation-fade" :href="'#modal-delete-region-' + target.id" uk-toggle></a>
        </div>
        <div v-else v-bind:class="{ 'uk-animation-shake': errorAnimation }">
            <a uk-icon="icon: reply" class="uk-text-primary uk-animation-fade" @click=""></a>
        </div>

        <div :id="'modal-delete-region-' + target.id" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">リージョンの削除</h2>
                </div>
                <div class="uk-modal-body">
                    <p>リージョン「<span class="uk-text-danger">{{target.name}}</span>」を本当に削除しますか？</p>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-danger uk-modal-close" type="button" @click="destroy(target.id)">削除</button>
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
        form: {
            name: string;
            errors: { [key: string]: string; };
        };
    }

    export default {
        name: "delete-region",
        props: ['target'],
        data() {
            return {
                errorAnimation: false,

                form: {
                    name: '',
                    errors: []
                },
            };
        },
        methods: {
            destroy(regionId) {
                this.errorAnimation = false;
                axios.delete('/api/v1/region/' + regionId)
                    .then(response => {
                        // マスタ情報再取得
                        axios.get('/api/v1/master')
                            .then(response => {
                                this.$store.commit('setData', response.data.data);
                            });
                        UIkit.notification('<span uk-icon=\'icon: check\'></span> リージョンを削除しました', 'success');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            if (error.response.data.errors) {
                                this.form.errors = error.response.data.errors;
                            } else if (error.response.data.message) {
                                this.form.errors.message = error.response.data.message;
                            } else {
                                this.form.errors.message = '処理に失敗しました。もう一度実行してください。';
                            }
                        }
                        else {
                            this.form.errors.message = '処理に失敗しました。もう一度実行してください。';
                        }
                        UIkit.notification('<span uk-icon=\'icon: check\'></span> 削除に失敗しました', 'danger');
                        this.errorAnimation = true;
                    });
            },
        }
    } as ComponentOptions<DataInterface>;
</script>

<style scoped>

</style>