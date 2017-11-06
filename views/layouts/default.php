<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Maven+Pro" rel="stylesheet">

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?= BASE_URL; ?>/public/img/favicon.ico"/>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/bootstrap.css">
</head>
<body>
<div class="site-container">
    <div class="site-pusher">

        <!-- /.header -->
<?php echo App\Session::flash();?>


        <div class="site-content">
            <main class="container">
                <?= $content; ?>
            </main>
            <div class="site-cache" id="site-cache"></div>
            <!-- /.site-cache -->
            <footer>
                <div class="container">

                </div>
                <!-- /.container -->
            </footer>
        </div>
        <!-- /.site-content -->
    </div>
    <!-- /.site-pusher -->
</div>
<!-- /.site-container -->

<script src="<?= BASE_URL; ?>/public/js/jquery-3.2.1.min.js"></script>
<script src="<?= BASE_URL; ?>/public/js/main.js"></script>
<script src="<?= BASE_URL; ?>/public/js/bootstrap.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
