@extends('layouts.default')
@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    @foreach ($articles as $article)
        <div class="row row-limit">
            <div class="col-sm-6">
                <h1>{{$article->title}}</h1>
                <p>{{ str_replace("\n", "<br>", $article->text) }}</p>
                <p><a style="text-decoration:none"  href="{{url('/article/'.$article->id);}}">see more</a></p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <!-- <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">What</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWhat" placeholder="What" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Who</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWho" placeholder="Who" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">When</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWhen" placeholder="When" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Where</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWhere" placeholder="Where" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">Why</label>
                        <div class="col-sm-10">
                                <textarea id="inputText" class="form-control" rows="5" placeholder="Why"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">How</label>
                        <div class="col-sm-10">
                                <textarea id="inputText" class="form-control" rows="5" placeholder="How"></textarea>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    @endforeach
    </div>
    <div class="col-sm-1"></div>
@stop
