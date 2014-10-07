@extends('layouts.default')
@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{ $article->title }}</h1>
                <p>{{ str_replace("\n", "<br>", $article->text) }}</p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h1>5W1H</h1>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">What</label>
                        <div class="col-sm-10">
                            <textarea readonly id="inputWhat" class="form-control" rows="5" placeholder="Why">{{$info->what}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Who</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="inputWho" placeholder="Who" value="{{$info->who}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">When</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="inputWhen" placeholder="When" value="{{$info->when}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Where</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="inputWhere" placeholder="Where" value="{{$info->where}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">Why</label>
                        <div class="col-sm-10">
                            <textarea readonly id="inputText" class="form-control" rows="5" placeholder="Why">{{$info->why}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">How</label>
                        <div class="col-sm-10">
                            <textarea readonly id="inputText" class="form-control" rows="5" placeholder="How">{{$info->how}}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
@stop
