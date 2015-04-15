$(function(){

    var iframeDoc = document.getElementById('code-iframe').contentWindow.document;
    var $body = $('body', iframeDoc);
    var $head = $('head', iframeDoc);

    var $style = $('style', $head);
    if($style.length == 0) {
        $style = $('<style>');
        $head.append($style);
        $head.append('<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,latin-ext" rel="stylesheet" type="text/css">');

    }


    var setExitMessage = function() {
        window.onbeforeunload = function() {
            return "Zamknięcie przeglądarki spowoduje utratę wszsytkich dotychczas wprowadzonych zmian.";
        };
    };

    var setHtml = function(allowSave) {
        allowSave = allowSave || false;

        $('.jQ_changedHtml').removeClass('changed');
        $('.jQ_changedCss').removeClass('changed');
        $('.jQ_changedBtn').prop('disabled', true);

        if(allowSave) {
            $('.jQ_saveBtn').removeClass('hidden');
        }


        var html = editorHtml.getValue();
        var css = editorCss ? editorCss.getValue() : '';

        $style.html('*,*:before,*:after{box-sizing:border-box}body{margin:20px;font-family:"Open Sans", sans-serif}'+css);
        $body.html(html);
    };

    //-----

    var onSaveClick = function() {
        setHtml(true);
        return false;
    };

    var editorHtml = CodeMirror.fromTextArea(document.getElementById('code-html'), {
        lineNumbers: true,
        mode:  "htmlmixed",
        scrollbarStyle: "simple",
        lineWrapping: true,
        extraKeys: {
            "Ctrl-S": onSaveClick,
            "Cmd-S": onSaveClick
        },
        tabMode: 'shift'
    });

    editorHtml.on('change', function(e){
        $('.jQ_changedHtml').addClass('changed');
        $('.jQ_changedBtn').prop('disabled', false);
        setExitMessage();
    });


    var editorCss = CodeMirror.fromTextArea(document.getElementById('code-css'), {
        lineNumbers: true,
        mode: "css",
        scrollbarStyle: "simple",
        lineWrapping: true,
        extraKeys: {
            "Ctrl-S": onSaveClick,
            "Cmd-S": onSaveClick
        }
    });

    editorCss.on('change', function(e){
        $('.jQ_changedCss').addClass('changed');
        $('.jQ_changedBtn').prop('disabled', false);
        setExitMessage();
    });


    //-----

    $('.jQ_changedBtn').on('click', function(e){
        setHtml(true);

        e.preventDefault();
        return false;
    });

    //-----

    setHtml(false);
});

