<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Maven+Pro" rel="stylesheet">

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/main.css">
</head>
<body>
<header class="header clearfix">
      <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <h1 class="navbar-brand mr-5">Gestion de compte bancaire</h1>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>"><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>/blog"></a>
            </li>
        </ul>

        <ul class="my-2 my-lg-0 navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>users/login.php">Virements<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>/user">Créer un nouveau compte</a>
                </li>
        </ul>
    </div>
</nav>
</header>

<div class="container">
        <!-- /.header -->
<?php echo App\Session::flash();?>


            <main>
                <?php echo $content; ?>
            </main>

</div>
            <footer>
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <p class="navbar-brand mr-5">@Cash bank</p>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>"><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>/blog"></a>
            </li>
        </ul>

        
    </div>
</nav>
                <!-- /.container -->
            </footer>
<script src="<?php echo BASE_URL; ?>/public/js/jquery-3.2.1.min.js"></script>

<script src="<?php echo BASE_URL; ?>/public/js/bootstrap.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/main.js"></script>

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