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
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/screen.css">
</head>
<body>
<div class="site-container">
    <div class="site-pusher">
        <header class="header">
            <div class="container-top">
                <a href="" class="header_icon" id="header_icon"></a>
                <a href="<?= BASE_URL; ?>" class="header_logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 943.9 1000" version="1.1" id="svg1499">
                        <g>
                            <path class="inside"
                                  d="M876.5 636.7h-392l254.8-254.8-12.6-12.6-260.9 260.8V60.3H448v272.9L189.6 74.8 177 87.4l252.2 252.2H67.4v17.8h367.7L177.3 615.2l12.6 12.6L448 369.7v570h17.8V664.1l257.9 257.8 12.6-12.6-254.8-254.8h395"/>
                            <path class="init"
                                  d="M591.8 295.7H472.4c-2.4 0-5.7.5-9.1 1.2-2 .3-3.9.8-5.9 1.4-2.1.6-4.1 1.1-5.6 1.6-20.5 6.4-31.2 23.4-32.2 45.4-.1 1.2-.1 2.4-.1 3.7v250.9h-66.8c-136.2 0-247.1-110.8-247.1-247.1s110.9-247.1 247.1-247.1h119.6c29.2 0 52.9-23.7 52.9-52.8 0-29.2-23.7-52.9-52.8-52.9H352.8C158.3 0 0 158.3 0 352.8s158.3 352.8 352.8 352.8h119.6c29.1 0 52.8-23.7 52.8-52.9V401.3h66.5c131.7 0 239.7 103.8 246.3 233.9.2 4.2.3 8.4.3 12.7 0 8.5-.4 16.9-1.3 25.2-12.7 124.2-117.9 221.4-245.3 221.4H472.4c-29.1 0-52.8 23.7-52.8 52.7 0 23.6 15.6 43.7 37.1 50.4 5 1.5 10.2 2.4 15.7 2.4h119.4c194.2 0 352.1-158 352.1-352.1 0-194.2-157.9-352.2-352.1-352.2z"/>
                        </g>
                    </svg>
                </a>
                <?php if($_REQUEST['url']):?>
                    <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <?php endif;?>

                    <nav class="menu">

                        <a href="<?= BASE_URL; ?>/pages/competences">mes compétences</a>
                        <a href="<?= BASE_URL; ?>/pages/portfolio">mon portfolio</a>
                        <a href="<?= BASE_URL; ?>/posts">me contacter</a>
                    </nav>
                    <!-- /.menu -->
                    <nav class="menu-desktop">

                        <a href="<?= BASE_URL; ?>/pages/competences">mes compétences</a>
                        <a href="<?= BASE_URL; ?>/pages/portfolio">mon portfolio</a>
                        <a href="<?= BASE_URL; ?>/posts">me contacter</a>
                    </nav>
                <!-- /.menu-desktop -->
            </div>
            <!-- /.container -->
        </header>
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
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4 dashed pt-3">
                            <article class="article-footer">
                                <h4>à propos</h4>
                                <p class="text-justify">Je m'appelle Guillaume Dussart, j'ai commencé le développement
                                    web pour développer des petits sites perso et c'est très vite devenu une vraie
                                    vocation. J'aime expérimenter, découvrir et apprendre au fur et à mesure de mes
                                    projets perso pour le moment.</p>
                            </article>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4 dashed pt-3">
                            <h4>Mes coordonées</h4>
                        </div>
                        <!-- /.col-12 col-sm-6 col-xl-4 dashed pt-3 -->
                        <div class="col-12 col-sm-6 col-xl-4 dashed pb-3 pt-3">
                            <h4>Où me trouver ?</h4>
                            <a href="https://github.com/"><img src="<?= BASE_URL; ?>/public/img/social/github.svg"
                                                               alt="github" class="d-inline"></a>
                            <!-- /.d-inline -->
                            <a href="https://twitter.com/?lang=fr"><img
                                        src="<?= BASE_URL; ?>/public/img/social/twitter.svg" alt="twitter"
                                        class="d-inline"></a>
                            <!-- /.d-inline -->
                            <a href="https://www.facebook.com/"><img
                                        src="<?= BASE_URL; ?>/public/img/social/facebook.svg" alt="facebook"
                                        class="d-inline"></a>
                            <!-- /.d-inline -->
                            <a href="https://www.linkedin.com/"><img
                                        src="<?= BASE_URL; ?>/public/img/social/linkedin.svg" alt="linkedin"
                                        class="d-inline"></a>
                            <!-- /.d-inline -->
                        </div>
                        <!-- /.col-xl-4 -->
                    </div>
                    <!-- /.row -->
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
