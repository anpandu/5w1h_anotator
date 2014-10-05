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

    <script type="text/javascript">

        var hl = {};

        var getIdxSentenceInWordArr = function (word_arr, sentence) {
            var sentence_arr = sentence.split(" ");
            var j = 0;
            var res = [];
            for (var i = 0; i < word_arr.length; i++) {
                var word = word_arr[i];
                if (word==sentence_arr[j]) {
                    j += 1;
                    res.push(i);
                }
            };
            return res.slice(0);
        }

        var highlightSentence = function (sentence, info_id) {
            var content = $('#newsContent').val();
            var content_arr = content.replace(/\n/g, " \n ").split(" ");

            hl[info_id] = getIdxSentenceInWordArr(content_arr, sentence);

            var info = [];
            info.push(["inputWhat", "hl_what"]);
            info.push(["inputWho", "hl_who"]);
            info.push(["inputWhere", "hl_where"]);
            info.push(["inputWhen", "hl_when"]);
            info.push(["inputWhy", "hl_why"]);
            info.push(["inputHow", "hl_how"]);

            for (var j = 0; j < info.length; j++) {
                var inp = info[j][0];
                var cls = info[j][1];
                if(inp in hl) {
                    for (var i = 0; i < hl[inp].length; i++) {
                        content_arr[hl[inp][i]] = "<span class='"+cls+"'>"+content_arr[hl[inp][i]]+"</span>";
                    }
                }
            }
            var contentfix = content_arr.join(" ").replace(/\n/g, "<br>");
            contentfix = contentfix.replace(/<\/span/g," <\/span");
            contentfix = contentfix.replace(/span> <span/g,"span><span");
            $("#newsContentFix").html(contentfix);
        }



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
