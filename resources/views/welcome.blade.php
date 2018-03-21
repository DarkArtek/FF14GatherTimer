@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <passport-clients></passport-clients>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <passport-authorized-clients></passport-authorized-clients>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
@endsection