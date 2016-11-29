<?php
    require_once dirname(dirname(__DIR__)) . '/includes/config.php';

    define('NAME', 'Landing Page Frameworks');
    define('SITE_ADDRESS', 'http://inboundsoon.dev/wp-content/frameworks/src/htdocs/');

    $framework_slug = ! empty($_REQUEST['framework']) ? $_REQUEST['framework'] : '';
    $framework_slug = preg_replace("/[^A-Za-z0-9\\_\\-]/", '', $framework_slug);

    if ( ! file_exists(dirname(__DIR__) . '/frameworks/' . $framework_slug . '.php'))
        $framework_slug = '';

    $title          = 'Top Frameworks for Building Landing Pages';
    $og_title       = '';
    $og_url         = SITE_ADDRESS;
    $og_description = 'LandingPageFrameworks.com, a leaderboard of the top landing page frameworks for website developers. Lists include WordPress Plugins, Joomla Plugins, and SAAS Services, and boilerplates.';
    if ( ! empty($framework_slug))
    {
        include dirname(__DIR__) . '/frameworks/compiled/' . $framework_slug . '.php';

        $framework_name = isset($framework['full_name']) ?
            $framework['full_name'] :
            $framework['name'];

        $title          = htmlentities($framework_name);
        $og_title       = $title . ' &ndash; IncludeWP';
        $og_url         = $og_url . '/' . $framework_slug . '/';
        $og_description = $framework['description'];
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="theme-color" content="#333333">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="shortcut icon" type="image/ico" href="/favicon.ico"/>

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <title><?php echo $title ?> </title>

    <meta name="description" content="<?php echo $og_description ?>"/>

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $og_title ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="<?php echo SITE_ADDRESS ?>/assets/img/og-landingpageframeworks.png"/>
    <meta property="og:url" content="<?php echo $og_url ?>"/>
    <meta property="og:description" content="<?php echo $og_description ?>"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="LandingPageFrameworks.com"/>
    <meta property="fb:admins" content=""/>
    <meta property="fb:app_id" content=""/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@inboundwp">
    <meta name="twitter:creator" content="@atwellpub">
    <meta name="twitter:title" content="<?php echo $og_title ?>">
    <meta name="twitter:description" content="<?php echo $og_description ?>">
    <meta name="twitter:image:src" content="<?php echo SITE_ADDRESS ?>/assets/img/og-landingpageframeworks.png">

    <!--    <link rel="canonical" href="--><?php //echo $canonical; ?><!--" />-->

    <?php require_once TEMPLATES_DIR . 'fb-pixel.php' ?>

    <?php require_once TEMPLATES_DIR . 'twitter-tag.php' ?>
</head>
<body>
<?php require_once TEMPLATES_DIR . 'ga.php' ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Font Awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      crossorigin="anonymous">

<!-- Lato Font -->
<link href='https://fonts.googleapis.com/css?family=Lato|Pacifico&subset=latin,latin-ext&subset=latin' rel='stylesheet'
      type='text/css'>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

<link rel="stylesheet" href="assets/css/style.css">

<?php
require_once TEMPLATES_DIR . 'header.php' ?>

<?php require_once TEMPLATES_DIR . 'cover.php' ?>

<?php if ( ! empty($framework_slug)) : ?>
    <?php require_once TEMPLATES_DIR . 'framework.php' ?>
<?php else : ?>
    <?php require_once TEMPLATES_DIR . 'frameworks.php' ?>
<?php endif ?>

<?php require_once TEMPLATES_DIR . 'footer.php' ?>

</body>
</html>