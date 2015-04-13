<?
include 'app.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>
        Snippets
    </title>
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
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

            <a class="app-logo" href="<?= app::urlBase() ?>">V</a>
            <h1 class="app-title"><a href="<?= app::urlBase() ?>">V Liceum Ogólnokształcące <em>- Przykład <?= app::getCurrentSnippet() ?></em></a></h1>
        </header>

        <div class="app">
            <main class="main">
                <div class="code-title">
                    Podgląd kodu
                    <button class="btn jQ_changedBtn" disabled>Wykonaj kod</button>
                </div>
                <iframe id="code-iframe" class="code-preview"></iframe>
            </main>

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
        </div>
    </div>
    <script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/mode/xml/xml.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/mode/css/css.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script type="text/javascript" src="assets/js/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="assets/js/site.js"></script>
</body>
</html>
