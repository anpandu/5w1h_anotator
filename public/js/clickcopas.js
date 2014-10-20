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

cnc_init = function () {
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

    $(".cnc_char").click(function(){          
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
};