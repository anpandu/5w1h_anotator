@extends('layouts.default')
@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form class="form-horizontal" role="form" method="post" action="/article">
            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-8">
					<input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="inputText" class="col-sm-2 control-label">Text</label>
                <div class="col-sm-8">
					<textarea id="inputText" class="form-control" rows="20" placeholder="Text" name="text"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-default">INPUT</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-1"></div>
@stop
