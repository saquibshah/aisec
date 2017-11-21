<?php

if (!defined('MyConst')) {
	die("This is an include-file!");
}

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


?>
