var editorHtml = CodeMirror.fromTextArea(document.getElementById('code-html'), {
    lineNumbers: true,
    mode:  "htmlmixed",
    scrollbarStyle: "simple",
    lineWrapping: true
});

var editorCss = CodeMirror.fromTextArea(document.getElementById('code-css'), {
    lineNumbers: true,
    mode:  "css",
    scrollbarStyle: "simple",
    lineWrapping: true
});


$(function(){
    var iframeDoc = document.getElementById('code-iframe').contentWindow.document;
    var $body = $('body', iframeDoc);
    var $head = $('head', iframeDoc);

    var $style = $('style', $head);
    if($style.length == 0) {
        $style = $('<style>');
        $head.append($style);
    }

    console.info($body.length);
    console.info($head.length);
    console.info($style.length);

    var setHtml = function() {
        var html = editorHtml.getValue();
        var css = editorCss.getValue();

        $style.html(css);
        $body.html(html);
    };

    setHtml();
    setInterval(setHtml, 1000);
});

