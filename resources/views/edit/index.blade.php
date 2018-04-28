@extends('layouts.app')

@section('content')
    <div uk-grid>
        <div class="uk-width-2-3">
            <div class=" uk-flex uk-flex-center">
                <div class="uk-card uk-card-default uk-width-large">
                    <map-image></map-image>
                </div>
            </div>

            <div class="uk-section">
                <div class="uk-container">
                    <place-cards></place-cards>
                </div>
            </div>
        </div>

        {{--サイドバー--}}
        <div class="uk-width-1-3">
            <div class="uk-card uk-card-default">
                <ul uk-accordion="multiple: true">
                    @foreach($regions as $region)
                        <li>
                            <a class="uk-accordion-title" href="#">{{ $region->name }}</a>
                            <div class="uk-accordion-content">
                                <ul class="uk-list uk-list-striped">
                                    @foreach($region->areas as $area)
                                        <area-item :data="{{ $area->toJson() }}">
                                        </area-item>
                                    @endforeach
                                    <li><a href=""><span uk-icon="icon: plus"></span></a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">リージョン登録</h3>
                </div>
                <div class="uk-card-body">
                    <form method="POST" action="/region">
                        <fieldset class="uk-fieldset">
                            {{ csrf_field() }}
                            <input type="text" id="region-name" placeholder="リージョン名"
                                   class="uk-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="uk-button uk-button-primary">登録</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection