@extends('layouts.default')
@section('content')

    {{ HTML::style('css/autocomplete.css') }}

    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{ $article->title }}</h1>
                <input id="newsContent" type="hidden" value='{{ $article->text }}'>
                <p id="newsContentFix">{{ str_replace("\n", "<br>", $article->text) }}</p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h1>5W1H</h1>
                <form class="form-horizontal" role="form" method="post" action="/info">
                    <input type="hidden" class="form-control" id="inputArticleId" placeholder="What" name="article_id" value="{{$article->id}}">
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">What</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWhat" placeholder="What" name="what">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Who</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWho" placeholder="Who" name="who">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">When</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWhen" placeholder="When" name="when">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Where</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputWhere" placeholder="Where" name="where">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">Why</label>
                        <div class="col-sm-10">
                                <textarea id="inputWhy" class="form-control" rows="5" placeholder="Why" name="why"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">How</label>
                        <div class="col-sm-10">
                                <textarea id="inputHow" class="form-control" rows="5" placeholder="How" name="how"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="submit">
                        </div>
                    </div>
                </form>
            </div>
    </div>
    </div>
    <div class="col-sm-1"></div>

    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/jquery-ui/jquery-ui.js') }}
    {{ HTML::script('js/infohighlight.js') }}
    
    <script type="text/javascript">
        $(function() {
            var option = function (input) {
                return {
                    source: '{{url("autocomplete/".$article->id)}}',
                    delay: 300,
                    select: function(event, ui){
                        $("#"+input).autocomplete( "search", $("#"+input).val()); 
                        highlightSentence(ui['item']['value'], input);
                    }
                }
            }
            $( "#inputWhat" ).autocomplete(option("inputWhat"));
            $( "#inputWho" ).autocomplete(option("inputWho"));
            $( "#inputWhere" ).autocomplete(option("inputWhere"));
            $( "#inputWhen" ).autocomplete(option("inputWhen"));
            $( "#inputWhy" ).autocomplete(option("inputWhy"));
            $( "#inputHow" ).autocomplete(option("inputHow"));
        });
    </script>
@stop
