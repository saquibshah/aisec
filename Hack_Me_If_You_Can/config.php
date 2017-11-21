<?php
define('APP_CONFIG_DEBUG', TRUE);
define('COOKIE_LIFETIME', '1209600');
define('DISPARITYCORP_DB', 'sqlite:../Hack_Me_If_You_Can/database/disparitycorp.db');

//Fakhraddin hiring emails
define("ACCEPT_EMAIL",
"Hello <username>,<br/><br/>
We found out from our records that you have successfully integrated yourself with the Disparity corporation and are now an employee of the same. We congratulate you on your performance. We are also delighted to let you know that we have noted your desire to participate in the event on December 1, 2016. We are currently in the process of deciding the top 50 performers from our test and will contact you with more information once we have any. Below are the information you entered while signing up for the event:<br/>
UserName: <username><br/>
Email: <email><br/>
First Name: <first_name><br/>
Last Name: <last_name><br/>
Employed since: <employed since><br/>
Department: <department><br/>
Token1: <token1><br/>
Token2: <token2><br/>
Token3: <token3><br/>
Token4: <token4><br/>
Participation in the event: <willtakepart><br/>
We would like if you infiltrate the Disparity corp as our employee and carry out our instructions as a potential hacker. The event will be held on a day where the Disparity corp meet for an annual general meeting. You will be there as an employee of disparity corp along with other members of the corporation.<br/><br/>

Best regards,

");

define("REJECT_EMAIL",
"Hello <username>,<br/>We found out from our records that you have successfully integrated yourself with the Disparity corporation and are now an employee of the same. However, we see that you have indicated that you will not be taking part in the event on the December 1, 2016. So we thank you for taking part in this game of ours and we hope it was fun for you.<br/>Below are the information you entered while signing up for the event:<br/>UserName: <username><br/>Email: <email><br/>First Name: <first_name><br/>Last Name: <last_name><br/>Employed since: <employed since><br/>Department: <department><br/>Token1: <token1><br/>Token2: <token2><br/>Token3: <token3><br/>Token4: <token4><br/>Participation in the event: <willtakepart><br/><br/>Best regards,
");



define('POSTER_COOKIE_VALUE', 'Jag Mood');
define('COOKIE_USER', 'user');
define('NOISE_GIF', './assets/images/noise.gif');
define('FATIH_TOP', './assets/images/Fatih_Top.png');
define('FATIH_BOT','./assets/images/Fatih_Bot.png');
define('CRYPTO_SOLUTION','./assets/images/cryptosolution.png');
define('RABBIT','./assets/images/rabbit.jpg');
define('CRYPTO_LINK','D8c3xa2L1dX2');
define('SHELLCODE_LINK','xF7j2D0ap1Sli');
define('GIBSON_LINK','Xhj3Id8x9w3');
define('REGISTRATION_DATABASE', 'reg.db');

//******** START REGISTRATION PAGE CONSTANTS *********
define("COMPANY_NAME", "Disparity Corp");

define("PUBLIC_KEY", "file:////var/www/html/public.pem");
define("PRIVATE_KEY", "file:////var/www/html/priv.pem");
define("INSERT_REG", 
	"insert into registration "
	."(username, email, firstname, lastname, gender, employeesince, department, willparticipate, token1, token2, token3, token4) "
	."values(:username, :email, :firstname, :lastname, :gender, :employeesince, :department, :willparticipate, :token1, :token2, :token3, :token4)");

define("CHECK_USERNAME", "select username from registration where username = :param LIMIT 1");
define("CHECK_EMAIL", "select username from registration where email = :param LIMIT 1");

define("EMAIL_MSG1", "you participate in the event");
define("EMAIL_MSG2", "you do participate in the event");

//******** END REGISTRATION PAGE CONSTANTS *********//

/*
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
define('','');
*/
?>