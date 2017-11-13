<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?php echo isset($title) ? $title : 'Comptes'; ?>
    </title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/main.css">
</head>

<body>


<div class="container">
    <?php echo App\Session::flash(); ?>

    <?php echo $content; ?>

</div>

</body>

</html>