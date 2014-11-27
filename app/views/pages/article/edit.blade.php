@extends('layouts.default')
@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-6">
                <h2>{{ $article->title }}</h2>
                <p>{{ str_replace("\n", "<br>", $article->text) }}</p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h2>Edit</h2>
                <br>
                <div>
                    <form class="form-horizontal" role="form" method="post" action="/article/{{$article->id}}">
                        <input name="_method" value="PUT" type="hidden">
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-3 control-label">Swap with</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="inputTitle" placeholder="article id" name="target_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-7">
                                <button type="submit" class="btn btn-default">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
@stop
