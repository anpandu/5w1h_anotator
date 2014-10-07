@extends('layouts.default')
@section('content')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <table class="table table-hover">
            <tr>
                <td>ID</td>
                <td>Article</td>
                <td>Action</td>
                <td>5W1H</td>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td><p>{{ $article->id }}</p></td>
                    <td><a href="{{url('/article/'.$article->id);}}">{{ $article->title }}</a></td>
                    <td>
                        @if (in_array($article->id, $owned_article_ids))
                            <a href="{{url('/info/edit/'.$article->id);}}">Edit</a>
                        @else
                            <a href="{{url('/info/create/'.$article->id);}}">Add</a>
                        @endif
                    </td>
                    <td><a href="{{url('/article/'.$article->id).'/all';}}">See All</a></td>
                </tr>
            @endforeach
        </table>
        <?php echo $articles->links(); ?>
    </div>
    <div class="col-sm-2"></div>
@stop



