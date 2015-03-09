var editor1 = CodeMirror.fromTextArea(document.getElementById('code-html'), {
    lineNumbers: true,
    mode:  "htmlmixed"
});

var editor2 = CodeMirror.fromTextArea(document.getElementById('code-css'), {
    lineNumbers: true,
    mode:  "css"
});