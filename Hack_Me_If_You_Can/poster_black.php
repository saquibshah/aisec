<?php

include 'token_generator.php';                  
include 'poster_cookies.php';
include 'poster_session.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Hack me if you can</title>
        <link rel="icon" href="./assets/images/anonymous.ico"/>
        <link rel="stylesheet" type="text/css" href="./assets/css/poster.css">
        <script type="text/javascript" src="./assets/js/poster.js"></script>
    </head>
    <body onload="loadBG()" background="./assets/images/demo_bg.jpg">
        <noscript>Please Enable JavaScript</noscript>
        <input type="hidden" name="token" value=<?=$_SESSION["token1"]?>></br>
        <div class="container">
            <img id="noise" src=<?=$noise?>  style="position: absolute;right: 5%;margin-right: 200px;top: 50%;margin-top: -305px;width: 256px;height: 150px;">
            <!--a onclick="verify()" style="display: inline-block;position: absolute;top: 50%;margin-top: -10px;">π</a>-->
            <canvas id="mybackground" width="800" height="700"></canvas>
            <img id="tv" src="./assets/images/tv.png" style="width: 300px;position: absolute;right: 5%;margin-right: 180px;top: 50%;margin-top: -320px;">
            <img id="people" src="./assets/images/people_talking_inv.png" style="top: 50%; margin-top: -90px; right: 5%; position: absolute;">
            <div class="bottomright" onclick="verify()"><img src="./assets/images/pi_black.png" width = "7"></div>
            <div class="bottomleft"><img src="./assets/images/qrcode_inv.png" width="65"></div>
        </div>
    </body>
</html>
