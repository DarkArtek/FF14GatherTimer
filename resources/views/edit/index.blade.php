@extends('layouts.app')

@section('content')
    <div uk-grid>
        <div class="uk-width-3-4">
            <map-image></map-image>
            <div class="uk-section">
                <div class="uk-container">
                    <place-cards></place-cards>
                </div>
            </div>
        </div>

        {{--サイドバー--}}
        <div class="uk-width-1-4">
            <div class="uk-card uk-card-default">
                <ul uk-accordion="multiple: true">
                    @foreach($regions as $region)
                        <li>
                            <a class="uk-accordion-title" href="#">{{ $region->name }}</a>
                            <div class="uk-accordion-content">
                                <ul class="uk-list uk-list-striped area-list">
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
                <a href="#create-region" class="uk-button uk-button-primary uk-width-1-1" uk-toggle>
                    リージョン登録
                </a>
            </div>
        </div>
    </div>

    @include('edit.modal.create_region')
@endsection