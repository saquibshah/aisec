<?php 
    include dirname(__FILE__).'/appmanager.php';
    
    //Isn't login, of course we let themm go back to login page
    if (!AppManager::isLoggedIn()) {
        header("Location: disparityloginpage.php");
        exit;
    }
    
    //If already solved the game.
    if (AppManager::isSolvedQr()){
        header("Location: home.php");
        exit;
    }
    
    //you have to access the page and then try to solve it
    if (AppManager::tryToSolveQr() && AppManager::didAccessQrPage()) {
        header("Location: home.php");
        exit;
    }
    
    if (!AppManager::didAccessQrPage()) {
        AppManager::doAccessQrPage();
    } else {
        AppManager::forceLogout();
        AppManager::createLoginMessage();
        header("Location: disparityloginpage.php");
        exit;
    }
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Evil Coporation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!-- Le styles -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <!-- Google Fonts call. Font Used Open Sans & Raleway -->
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
       <?php
            $userName = AppManager::getValue('username');
            $passString = 'refresh:';
            $time = strlen($userName)*12;
            $lastSTring = ';url=disparityloginpage.php';
            $finalString = $passString . $time . $lastSTring;
            header($finalString);
        ?>
        <div class="container" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="form-group" id="banner" style="text-align: center;">
                <img style="display: inline-block;" src="assets/img/logo.png" alt="">
            </div>
            <form method="POST" action="">
            <table class="table" cellspacing="0" cellpadding="0" style="border: none;" cellpadding="0" cellspacing="0">
                <colgroup>
                    <col class="col-md-7">
                    <col class="col-md-1">
                </colgroup>
                <tr><td style="border-top: none;">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1">Why am I seeing this page? <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Hello <?= AppManager::getValue('username')?>!</br>We here at Evil Corp believe that our employees are the best. So this is a small test to check your intelligence. You will need to pass this test to prove that you are worthy of being an elite member of our organization. Below we have described the rules of the test. </br>All the best!</p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="float: right;border-top: none;"><span class="label label-success">Welcome <?= AppManager::getValue('username')?>!</span></td></tr>
                <tr><td style="border-top: none;">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse2">Rules <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>The rules for this puzzle are really simple! Each QR Code below evaluates to an equation. Each equation gives a single numerical result.</br>Your mission, if you choose to accept it, is to get the values for the individual QR codes, evaluate the equations and sort the results in ascending order. Below you will find the QR codes. Below the QR codes, is the input field where you must submit the values separated by a <b>,</b>. </br>For example, a possible correct sequence of numbers would look like this:</br>1,3,5,7,9,11,13</br>Please note that there are no punctuation marks after the last number! Also there is a timer on the screen which counts down. The solution must be submitted before the timer runs out, else you will be disqualified!</p>
                                </div>
                            </div>
                        </div>       
                    </td>
                    <td style="float:right;border-top: none;"><h1 style="margin:0px;"><span class="label label-danger"><span id="counter" style="font-size:50;"><?= strlen(AppManager::getValue('username'))*12; ?></span></span></h1></td></tr>
                <tr><td colspan="2" style="border-top: none;">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h4 class="panel-title">Solve the QR Code puzzle</h4></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" style="text-align:center;" cellpadding="0" cellspacing="0">
                                        <?php
                                        for ($i = 0; $i < count(AppManager::$qrImages); $i++) {
                                            echo '</tr>';
                                            for ($j = 0; $j < 4; $j++) {
												//echo '<td style="border-top: none;"><img src="data:image/png;base64,' . AppManager::$qrImages[$i][$j] . '"/></td>';
												echo '<td style="border-top: none;"><img src= "' .AppManager::$qrImages[$i][$j]. '"/></td>';
                                            }
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php if (APP_CONFIG_DEBUG) { ?>
                        <h4 style="color: #FFF !important;">Debug result: <?= AppManager::$nakedResult ?></h4>       
                        <?php }  ?>
                    </td></tr>
                <tr>
                <td style="border-top: none;"><div class="form-group"><input name="qrcode_result" type="text" class="form-control" placeholder="Input result"></div></td>
                <td style="border-top: none;"><button type="submit" class="btn btn-info btn-block">Submit <span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td></tr>
            </table>
            </form>
        </div>
    </body>
    <script type="text/javascript">
            function countdown() {
                    var i = document.getElementById('counter');
                    i.innerHTML = parseInt(i.innerHTML)-1;
                    if (parseInt(i.innerHTML)<=0) {
                            location.href = 'disparityloginpage.php';
                            i.innerHTML = 0;
                    }
            }
            $(function(){
                setInterval(function(){ countdown(); },1000);
            });
    </script>
</html>