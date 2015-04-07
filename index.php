<?
include 'app.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Snippets
    </title>
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="wrap">
        <header class="header">
            <select class="snippet-select">
                <? foreach(app::getSnippetsList() as $file=>$snippet): ?>
                    <option value="<?= $file ?>"><?= $snippet ?></option>
                <? endforeach; ?>
            </select>

            <h1 class="app-title">V Liceum Ogólnokształcące</h1>
        </header>

        <div class="app">
            <main class="main">
                <div class="code-title">Podgląd kodu</div>
                <iframe id="code-iframe" class="code-preview"></iframe>
            </main>

            <aside class="side">
                <section class="code-block">
                    <label class="code-title">HTML <em>index.html</em></label>
                    <textarea id="code-html"><?= app::getSnippetHtml() ?></textarea>
                </section>

                <? if(app::hasSnippetCss()): ?>
                    <section class="code-block">
                        <label class="code-title">CSS <em>style.css</em></label>
                        <textarea id="code-css"><?= app::getSnippetCss() ?></textarea>
                    </section>
                <? endif ?>
            </aside>
        </div>
    </div>
    <script type="text/javascript" src="js/codemirror/codemirror.js"></script>
    <script type="text/javascript" src="js/codemirror/mode/xml/xml.js"></script>
    <script type="text/javascript" src="js/codemirror/mode/css/css.js"></script>
    <script type="text/javascript" src="js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script type="text/javascript" src="js/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
</body>
</html>
