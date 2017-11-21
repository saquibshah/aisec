<?php 
    include dirname(__FILE__).'/appmanager.php';
    
    if (AppManager::isLoggedIn() && AppManager::isSolvedQr()) {
        header("Location: home.php");
        exit;
    }
    
    if (AppManager::isLoggedIn()) {
        header("Location: qrcodeauth.php");
        exit;
    }
    
    if (AppManager::tryToLogin()) {
        header("Location: qrcodeauth.php");
        exit;
    }
    $loginMessage = AppManager::getLoginMessage();
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
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
        <style>
            body
            {
                background-color: #1f1f1f;
            }
            .form-signin{
                padding-top: 50px;
                width: 300px;
                height: 360px;
                position: absolute;
                left: 50%;
                margin-left: -150px;
                top: 50%;
                margin-top: -280px;
            }
            .form-signin input
            {
                height: 50px;
                font-size: 16px;
                width: 300px;
                border-radius: 0px !important;
            }
            #banner img
            {
                height: 80px;
                margin-bottom: 15px;
            }
            /* enable absolute positioning */
            .inner-addon {
                position: relative;
            }

            /* style glyph */
            .inner-addon .glyphicons {
                position: absolute;
                padding: 16px;
                pointer-events: none;
            }

            /* align glyph */
            .left-addon .glyphicons  { left:  0px;}
            .right-addon .glyphicons { right: 0px;}

            /* add padding  */
            .left-addon input  { padding-left:  70px; }
            .right-addon input { padding-right: 30px; }

            .form-control{
                border-radius: 0px;
                border: 1px solid #ddd;
                box-shadow :none;
            }
            .btn-group-lg > .btn, .btn-lg {
                border-radius: 0px;
            }
            .mybutton
            {
                height: 50px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form class="form-signin" action="" method="POST">
                <div class="form-group" id="banner" style="text-align: center;">
                    <img style="display: inline-block;" src="assets/img/logo.png" alt="">
                </div>
                <div class="form-group" style="padding-bottom:15px;">
                    <input  type="text" style="text-align: center;padding-left: 0px;padding-right: 0px;" class="form-control" name="username" placeholder="USER" required autofocus>
                </div>
                <div class="form-group" style="padding-bottom:15px;">
                    <input type="password" style="text-align: center;padding-left: 0px;padding-right: 0px;" class="form-control" name="password" placeholder="PASSWORD" required>
                </div>
                <button type="submit" class="btn bttn-default" style="display: inline-block;line-height: 50px;font-size: 20px;width: 300px;padding-top: 0px;padding-bottom: 0px;">LOGIN</button>
                <?php if (!empty($loginMessage)) { ?>
                    <div class="error-message" style="display: block; font-size: 16px;text-align: center;padding-top: 10px;"><?= $loginMessage ?></div>
                <?php }
                ?>
            </form>
        </div>
    </body>
</html>