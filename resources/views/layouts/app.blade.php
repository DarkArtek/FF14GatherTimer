<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('layouts.navbar')

    <main>
        <div class="uk-container uk-margin-top">
            {{-- エラーの表示 --}}
            @if (session('status'))
                <div class="uk-alert-{{session('status')}}" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
