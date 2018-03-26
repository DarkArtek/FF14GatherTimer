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
                <div id="accordion">
                    @foreach($regions as $region)
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse"
                                        data-target="#collapse{{ $region->id }}"
                                        aria-expanded="true" aria-controls="collapse{{ $region->id }}">
                                    {{ $region->name }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{ $region->id }}" class="collapse"
                             aria-labelledby="heading{{ $region->id }}" data-parent="#accordion">
                            <table class="table table-striped">
                                <tbody>
                                @foreach($region->areas as $area)
                                    <tr>
                                        <td>
                                            {{ $area->name }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>


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
