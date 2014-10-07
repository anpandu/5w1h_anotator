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
                <h2>Information</h2>
                <h4><a>{{count($infos)}}</a> info(s) found</h4>
                
                @if (count($infos) > 0)
                <table class="table table-hover">
                    <tr>
                        <td>ID</td>
                        <td>owner</td>
                    </tr>
                    @foreach ($infos as $info)
                        <tr>
                            <td><a href="{{'/article/'.$article->id.'/user/'.$info->user()->id}}">{{ $info->user()->id }}</a></td>
                            <td><a href="{{'/article/'.$article->id.'/user/'.$info->user()->id}}">{{ $info->user()->username }}</a></td>
                        </tr>
                    @endforeach
                </table>
                @endif
                <h4><a href="{{url('article/'.$article->id.'/all')}}">see all</a></h4>
            </div>
    </div>
    </div>
    <div class="col-sm-1"></div>
@stop
