<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/project/webroot/styles.css">
</head>
<body>
<header>
    хедер сайта
</header>
<div class="container">
    <aside class="sidebar left">
        левый сайдбар
    </aside>
    <main>
        <?= $content ?>
        <img src="/project/webroot/tmp.jpg">
    </main>
    <aside class="sidebar right">
        правый сайдбар
    </aside>
</div>
<footer>
    футер сайта
</footer>
</body>
</html>