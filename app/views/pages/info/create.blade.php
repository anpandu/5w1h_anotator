@extends('layouts.default')
@section('content')

    {{ HTML::style('css/autocomplete.css') }}

    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-6">
                <h2>{{ $article->title }}</h2>
                <input id="newsContent" type="hidden" value='{{ $article->text }}'>
                <p id="newsContentFix">
                    {{ str_replace("\n", "<br>", $article->text) }}
                </p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h2>Article #{{ $article->id }}</h2>
                <hr>
                <form id="info_form" class="form-horizontal" role="form" method="post" action="/info">
                    <input type="hidden" class="form-control" id="inputArticleId" placeholder="What" name="article_id" value="{{$article->id}}">
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">What</label>
                        <div class="col-sm-10">
                            <textarea id="inputWhat" class="form-control" rows="4" placeholder="What" name="what"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Who</label>
                        <div class="col-sm-10">
                            <textarea id="inputWho" class="form-control" rows="2" placeholder="What" name="who"></textarea>
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
                            <textarea id="inputWhy" class="form-control" rows="4" placeholder="Why" name="why"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-2 control-label">How</label>
                        <div class="col-sm-10">
                            <textarea id="inputHow" class="form-control" rows="4" placeholder="How" name="how"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="submit">
                        </div>
                    </div>
                </form>

                <div id="dialog" title="Selected">
                    <p id="input_sentence">default</p>
                    <hr>
                    <input type="button" onclick="fsubmit('inputWhat')" id="ws_submit_what" value="what">
                    <input type="button" onclick="fsubmit('inputWho')" id="ws_submit_who" value="who">
                    <input type="button" onclick="fsubmit('inputWhen')" id="ws_submit_when" value="when">
                    <input type="button" onclick="fsubmit('inputWhere')" id="ws_submit_where" value="where">
                    <input type="button" onclick="fsubmit('inputWhy')" id="ws_submit_why" value="why">
                    <input type="button" onclick="fsubmit('inputHow')" id="ws_submit_how" value="how">
                </div>
            </div>
    </div>
    </div>
    <div class="col-sm-1"></div>

    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/jquery-ui/jquery-ui.js') }}

    <script>

        var cnc_state = 'idle';
        var cnc_begin = '';
        var cnc_end = '';

        newsContentTransform = function (str) {
            var res = str.split('');
            for (var i = 0; i < res.length; i++) {
                res[i] = "<span class='cnc_char' id='"+i+"'>" + res[i] + "</span>";
            };
            return res.join('');
        }


        updateInputSentence = function (_begin, _end) {
            var begin = (_begin<=_end) ? _begin : _end;
            var end = (_begin<=_end) ? _end : _begin;

            $( '.cnc_char' ).css('background-color', '');
            var is = "";
            for (var i = begin; i <= end; i++) {
                $( '#'+i ).css('background-color', '#aaaaff');
                is += $( '#'+i).html();
            };
            $('#input_sentence').html(is);
            console.log(begin+" "+end);
        }

        fsubmit = function (target) {
            $( "#"+target).val($("#input_sentence").html());
            $( "#dialog" ).dialog('close');
        }

        $(function() {
            $( "#dialog" ).dialog({
                position: { my: "left top", at: "left top", of: "#info_form" },
                width:  416
            });
            $( "#dialog" ).dialog({
                close: function( event, ui ) {
                    cnc_state = 'idle';
                    $( '.cnc_char' ).css('background-color', '');
                }
            });
            $( "#dialog" ).dialog('close');

            $("#newsContentFix").html(newsContentTransform('{{$article->text}}'));

            // $(".cnc_char").hover(function(){$(this).css("background-color", "#aaaaff");},function(){$(this).css("background-color", "");});
            $(".cnc_char").click(function(){
                // $(this).css('background-color', '#aaaaff');                
                if (cnc_state=='idle') {
                    cnc_begin = $(this).prop('id');
                    cnc_end = $(this).prop('id');
                    cnc_state = 'middle';
                    $( "#dialog" ).dialog('open');
                } else 
                if (cnc_state=='middle') {
                    cnc_end = $(this).prop('id');
                    cnc_state = 'middle'
                }
                updateInputSentence(parseInt(cnc_begin, 10), parseInt(cnc_end, 10));
            });
        });

    </script>
@stop
