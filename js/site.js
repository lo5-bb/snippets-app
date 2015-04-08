$(function(){


    var iframeDoc = document.getElementById('code-iframe').contentWindow.document;
    var $body = $('body', iframeDoc);
    var $head = $('head', iframeDoc);

    var $style = $('style', $head);
    if($style.length == 0) {
        $style = $('<style>');
        $head.append($style);
        $head.append('<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">');

    }


    var setHtml = function() {
        $('.jQ_changedHtml').removeClass('changed');
        $('.jQ_changedCss').removeClass('changed');


        var html = editorHtml.getValue();
        var css = editorCss ? editorCss.getValue() : '';

        $style.html('*,*:before,*:after{box-sizing:border-box}body{margin:20px;font-family:"Open Sans", sans-serif}'+css);
        $body.html(html);
    };

    //-----

    var editorHtml = CodeMirror.fromTextArea(document.getElementById('code-html'), {
        lineNumbers: true,
        mode:  "htmlmixed",
        scrollbarStyle: "simple",
        lineWrapping: true
    });

    editorHtml.on('change', function(e){
        $('.jQ_changedHtml').addClass('changed');
        $('.jQ_changedBtn').addClass('changed');
    });


    var editorCss = CodeMirror.fromTextArea(document.getElementById('code-css'), {
        lineNumbers: true,
        mode: "css",
        scrollbarStyle: "simple",
        lineWrapping: true
    });

    editorCss.on('change', function(e){
        $('.jQ_changedCss').addClass('changed');
        $('.jQ_changedBtn').addClass('changed');
    });


    //-----

    $('.jQ_changedBtn').on('click', function(e){
        setHtml();

        e.preventDefault();
        return false;
    });

    //-----


});

