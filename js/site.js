var editor1 = CodeMirror.fromTextArea(document.getElementById('code-html'), {
    lineNumbers: true,
    mode:  "htmlmixed",
    scrollbarStyle: "simple"
});

var editor2 = CodeMirror.fromTextArea(document.getElementById('code-css'), {
    lineNumbers: true,
    mode:  "css",
    scrollbarStyle: "simple"
});