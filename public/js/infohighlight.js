

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
