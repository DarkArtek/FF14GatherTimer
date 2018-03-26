@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    ここに地図
                </div>
            </div>
        </div>


        <div class="col-md-3 col-md-offset-1">
            <div class="card">
                <table class="table table-striped">
                    <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>
                                {{ $region->name }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="card-body">
                    <form method="POST" action="/region">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="region-name" placeholder="リージョン名">
                        </div>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
