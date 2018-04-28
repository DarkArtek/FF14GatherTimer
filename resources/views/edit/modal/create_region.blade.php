<div id="create-region" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <form method="POST" action="/region">
            <fieldset class="uk-fieldset">
                {{ csrf_field() }}
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">リージョン登録</h2>
                </div>
                <div class="uk-modal-body">
                    @if ($errors->has('name'))
                        <span class="uk-text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <input type="text" id="region-name" placeholder="リージョン名"
                           class="uk-input form-control{{ $errors->has('name') ? ' uk-form-danger' : '' }}"
                           name="name"
                           value="{{ old('name') }}">
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary" type="submit">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>