@extends('layouts.app')

@section('content')


    <div uk-grid>

        <div class="uk-width-2-3">
            <div class="uk-card uk-card-default uk-card-body">
                    ここに地図
            </div>
        </div>


        <div class="uk-width-1-3">
            <div class="uk-card uk-card-default">
                <ul uk-accordion="multiple: true">
                    @foreach($regions as $region)
                        <li>
                            <a class="uk-accordion-title" href="#">{{ $region->name }}</a>
                            <div class="uk-accordion-content">
                                <ul class="uk-list uk-list-striped">
                                    @foreach($region->areas as $area)
                                    <li>
                                        {{ $area->name }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>


                <div class="card-body">
                    <form method="POST" action="/region">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" id="region-name" placeholder="リージョン名" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
