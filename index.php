<?
include 'app.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>
        Snippets
    </title>
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <div class="wrap">
        <header class="header">
            <select class="snippet-select" onchange="window.location.href = this.value;">
                <? foreach(app::getSnippetsList() as $file=>$snippet): ?>
                    <option value="<?= app::urlBase().$snippet ?>" <?= (app::getCurrentSnippet() == $snippet) ? 'selected' : '' ?>><?= $snippet ?></option>
                <? endforeach; ?>
            </select>

            <a class="app-logo" href="<?= app::urlBase() ?>"><i class="fa fa-send"></i></a>
            <h1 class="app-title"><a href="<?= app::urlBase() ?>">LOVe Code <em>- Przykład <?= app::getCurrentSnippet() ?></em></a></h1>
        </header>

        <div class="app">
            <aside class="side">
                <section class="code-block">
                    <label class="code-title">HTML <span class="edit-info jQ_changedHtml"></span> <em>index.html</em></label>
                    <textarea id="code-html"><?= app::getSnippetHtml() ?></textarea>
                </section>

                <section class="code-block">
                    <label class="code-title">CSS <span class="edit-info jQ_changedCss"></span> <em>style.css</em></label>
                    <textarea id="code-css"><?= app::getSnippetCss() ?></textarea>
                </section>
            </aside>

            <main class="main">
                <div class="code-title">
                    Podgląd kodu
                    <div class="btn-group">
                        <button class="btn jQ_saveBtn" disabled><i class="fa fa-save"></i></button>
                        <button class="btn jQ_changedBtn" disabled>Wykonaj kod</button>
                    </div>
                </div>
                <iframe id="code-iframe" class="code-preview"></iframe>
            </main>
        </div>
        <footer class="footer">
            <div class="footer-copyright">
                &copy; Copyright <?= date('Y') ?> V Liceum Ogólnokształcące.
            </div>

            <div class="footer-right">
                <a href="<?= app::getCurrentSnippetSourceUrl() ?>" target="_blank">Zobacz źródło przykładu w serwisie <i class="fa fa-github"></i> GitHub</a>
            </div>
        </footer>
    </div>


    <script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/mode/xml/xml.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/mode/css/css.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/addon/edit/closetag.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/addon/edit/closebrackets.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/addon/selection/active-line.js"></script>

    <script type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="assets/js/screenfull.js"></script>
    <script type="text/javascript" src="assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="assets/js/fileSaver.min.js"></script>
    <script type="text/javascript" src="assets/js/date.js"></script>
    <script type="text/javascript" src="assets/js/site.js"></script>
</body>
</html>
