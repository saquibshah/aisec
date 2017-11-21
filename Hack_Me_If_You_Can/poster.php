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
    <body onload="loadBG()">
        <noscript>Please Enable JavaScript</noscript>
<?php
	for ($i=1; $i<=4; $i++) {
		if (isset($_SESSION["token".$i]))
        	    echo '<input type="hidden" name="token'.$i.'" value='.$_SESSION["token".$i].'>';
	}
?>
        <div class="container">
            <img id="noise" src=<?=$noise?> style="position: absolute;right: 5%;margin-right: 200px;top: 50%;margin-top: -305px;width: 256px;height: 150px;">
            <!-- <a onclick="verify()" style="display: inline-block;position: absolute;top: 50%;margin-top: -10px;">π</a>-->
            <canvas id="mybackground" width="800" height="700"></canvas>
            <img id="tv" src="./assets/images/tv.png" style="position: absolute;right: 5%;margin-right: 180px;top: 50%;margin-top: -320px;width: 300px;">
            <img id="people" src="./assets/images/people_talking.png" style="top: 50%; margin-top: -90px; right: 5%; position: absolute;">
            <div class="bottomright" onclick="verify()"><img src="./assets/images/logo.gif" width = "7"></div>
            <div class="bottomleft"><img src="./assets/images/qrcode.png" width="65"></div>
        </div>
    </body>
</html>
