<!doctype html>
<html><head>
        <meta charset="utf-8">
        <title>Disparity Corp.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!-- Le styles -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <link href="assets/css/font-style.css" rel="stylesheet">
        <link href="assets/css/flexslider.css" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <style type="text/css">
            body {
                padding-top: 100px;
            }
        </style>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="assets/img/logo30.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <!-- Google Fonts call. Font Used Open Sans & Raleway -->
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    </head>
    <body>

        <!-- NAVIGATION MENU -->

        <div class="navbar-nav navbar-inverse navbar-fixed-top" style="margin-top: 0px;">
            <div class="container">
                <div style="position: relative;">
                    <a style="position: absolute; left: 0px; top: 0px;" class="navbar-brand" href=""><img src="assets/img/logo.png" alt=""></a>
                    <h1  style="text-align: center;color: #b2c831;line-height: 95px;margin-top: 0px;margin-bottom: 0px;font-family: 'Passion One', cursive;">Disparity Corp.</h1>
                    <?php if (@AppManager::isLoggedIn() && @AppManager::isSolvedQr()) { ?>
                    <span id="user_information">Hello <?= @AppManager::getValue('username') ?></span>
                    <?php } ?>
                </div> 
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                

