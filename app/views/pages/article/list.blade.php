@extends('layouts.default')
@section('content')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <table class="table table-hover">
        <tr>
            <td>ID</td>
            <td>Article</td>
            <td>5W1H Status</td>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td><p>{{ $article->id }}</p></td>
                <td><a href="{{url('/article/'.$article->id);}}">{{ $article->title }}</a></td>
                @if (in_array($article->id, $owned_article_ids))
                    <td><a href="{{url('/info/edit/'.$article->id);}}">Edit</a></td>
                @else
                    <td><a href="{{url('/info/create/'.$article->id);}}">Add</a></td>
                @endif
            </tr>
        @endforeach
    </table>
    </div>
    <div class="col-sm-2"></div>
@stop



