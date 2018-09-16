@extends('layouts.app')

@section('content')
    <div class="uk-flex uk-flex-center">
        <div class="uk-card uk-card-default uk-width-xlarge">
            <div class="uk-card-header">Login</div>

            <div class="uk-card-body">
                <form method="POST" action="{{ route('login') }}" class="uk-form-horizontal">
                    @csrf

                    <div class="uk-margin">
                    <label for="email" class="uk-form-label">E-Mail Address</label>
                    <div class="uk-form-controls">
                        <input id="email" type="email"
                               class="uk-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </div>

                    <div class="uk-margin">
                        <label for="password" class="uk-form-label">Password</label>
                        <div class="uk-form-controls">
                            <input id="password" type="password"
                                   class="uk-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <div class="checkbox">
                                <label>
                                    <input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="uk-button uk-button-primary">
                                Login
                            </button>

                            <a class="uk-button uk-button-link uk-margin-left" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
