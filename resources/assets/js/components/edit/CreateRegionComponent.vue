<template>
    <form role="form" @submit.prevent="store">
        <fieldset class="uk-fieldset">

            <span class="uk-text-danger" v-if="form.errors.name">
                <strong>{{ form.errors.name.join(',') }}</strong>
            </span>
                <input v-model="form.name" type="text" name="name" placeholder="リージョン名" class="uk-input uk-form-small"
                       v-bind:class="{ 'uk-form-danger': 'name' in form.errors }">

            <button type="button" class="uk-button uk-button-small uk-button-primary uk-margin-small-top"
                    v-bind:class="{ 'uk-animation-shake': errorAnimation }" @click="store">
                保存
            </button>
        </fieldset>
    </form>
</template>

<script lang="ts">
    import axios from 'axios';
    import Vue, {ComponentOptions} from 'vue';
    import UIkit from "uikit";

    interface Data extends Vue {
        errorAnimation: boolean;
        form: {
            name: string;
            errors: { [key: string]: string; };
        };
    }

    export default {
        name: "create-region",
        data() {
            return {
                errorAnimation: false,

                form: {
                    name: '',
                    errors: {}
                },
            };
        },
        methods: {
            store() {
                this.errorAnimation = false;
                this.form.errors = {};
                axios.post('/api/v1/region', this.form)
                    .then(response => {
                        UIkit.notification('<span uk-icon=\'icon: check\'></span> リージョンに「' + this.form.name + '」を登録しました', 'success');
                        this.form.name = '';
                        // マスタ情報再取得
                        axios.get('/api/v1/master')
                            .then(response => {
                                this.$store.commit('setData', response.data.data);
                            });
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
                        this.errorAnimation = true;
                    });
            },

        }
    } as ComponentOptions<Data>;
</script>

<style scoped>

</style>