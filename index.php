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
            <h1 class="app-title">V Liceum Ogólnokształcące</h1>
        </header>

        <div class="app">
            <main class="main">
                <div class="code-title">Podgląd kodu</div>
                <iframe id="code-iframe" class="code-preview"></iframe>
            </main>

            <aside class="side">
                <section class="code-block">
                    <div class="code-title">HTML</div>
                    <textarea id="code-html"><?= htmlspecialchars(file_get_contents('snippets/1/1/index.html')) ?></textarea>
                </section>
                <section class="code-block">
                    <div class="code-title">CSS</div>
                <textarea id="code-css"><?= htmlspecialchars(file_get_contents('snippets/1/1/style.css')) ?></textarea>
                </section>
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
