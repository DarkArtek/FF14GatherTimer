<template>
    <div id="place-detail" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form class="">
                <div uk-grid>
                    <div class="uk-width-1-3">
                        <span class="uk-margin-small-right">Lv.</span>
                        <input class="uk-input" type="text" placeholder="" style="width: 90px">
                    </div>
                    <div class="uk-width-1-3">
                        <select class="uk-select">
                            <option>-</option>
                            <option>伝説の</option>
                            <option>未知の</option>
                            <option>刻限の</option>
                            <option>隠れた</option>
                        </select>
                    </div>
                    <div class="uk-width-1-3">
                        <select class="uk-select">
                            <option>草刈場</option>
                            <option>良木</option>
                            <option>採掘場</option>
                            <option>岩場</option>
                        </select>
                    </div>
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">出現時間</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" placeholder="start" style="width: 100px">
                            <span class="uk-margin-small-left uk-margin-small-right">～</span>
                            <input class="uk-input" type="text" placeholder="end" style="width: 100px">
                        </div>
                    </div>

                    <div class="uk-width-1-2">
                        <label class="uk-form-label">座標</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" placeholder="X" style="width: 50px">
                            <input class="uk-input" type="text" placeholder="Y" style="width: 50px">
                        </div>
                    </div>

                    <div class="uk-width-1-2">
                        <label class="uk-form-label">必要獲得力</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" placeholder="">
                        </div>
                    </div>

                    <div class="uk-width-1-2">
                        <label class="uk-form-label">必要識質力</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" placeholder="">
                        </div>
                    </div>

                    <div class="uk-width-1-3">
                        <label class="uk-form-label">採取回数＋</label>
                        <div class="uk-form-controls">
                            <span class="uk-margin-small-right">GPMax</span>
                            <input class="uk-input" type="text" placeholder="" style="width: 90px">
                        </div>
                    </div>

                    <div class="uk-width-1-3">
                        <label class="uk-form-label">HQ獲得率＋</label>
                        <div class="uk-form-controls">
                            <span class="uk-margin-small-right">識質力</span>
                            <input class="uk-input" type="text" placeholder="" style="width: 90px">
                        </div>
                    </div>

                    <div class="uk-width-1-3">
                        <label class="uk-form-label">個数＋</label>
                        <div class="uk-form-controls">
                            <span class="uk-margin-small-right">獲得力</span>
                            <input class="uk-input" type="text" placeholder="" style="width: 90px">
                        </div>
                    </div>
                </div>
                <hr>

                <table class="uk-table">
                    <thead>
                    <tr>
                        <th class="uk-text-center"></th>
                        <th class="uk-text-center" style="width: 30px">Lv.</th>
                        <th class="uk-text-center" style="width: 30px">★</th>
                        <th class="uk-text-center">アイテム名</th>
                        <th class="uk-text-center" style="width: 30px">識質</th>
                        <th class="uk-text-center" style="width: 40px">精選</th>
                        <th class="uk-text-center uk-table-shrink uk-text-nowrap">画像</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="" style="padding:1px">１</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">２</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">3</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">4</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">5</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">6</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">7</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <hr>

                <table class="uk-table">
                    <caption class="uk-text-center">Hidden</caption>
                    <tr>
                        <th class="uk-text-center"></th>
                        <th class="uk-text-center" style="width: 30px">Lv.</th>
                        <th class="uk-text-center" style="width: 30px">★</th>
                        <th class="uk-text-center">アイテム名</th>
                        <th class="uk-text-center" style="width: 30px">識質</th>
                        <th class="uk-text-center" style="width: 40px">精選</th>
                        <th class="uk-text-center uk-table-shrink uk-text-nowrap">画像</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td class="" style="padding:1px">１</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="padding:1px">２</td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px"><input class="uk-input" type="text" placeholder=""></td>
                        <td class="" style="padding:1px">
                            <select class="uk-select">
                                <option>-</option>
                                <option>微光</option>
                                <option>暁光</option>
                                <option>夜光</option>
                            </select>
                        </td>
                        <td class="" style="padding:1px">
                            <div class="js-upload uk-placeholder uk-text-center" style="padding:8px">
                                <div uk-form-custom>
                                    <input type="file" multiple>
                                    <span uk-icon="icon: cloud-upload"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>

            <p class="uk-text-right">
                <a class="uk-button uk-button-primary" type="button">Save</a>
                <a class="uk-button uk-button-link modal-close uk-margin-left" type="button">Cancel</a>
            </p>
        </div>
    </div>
</template>

<script lang="ts">
    export default {
        data() {
            return {};
        },
    };
</script>