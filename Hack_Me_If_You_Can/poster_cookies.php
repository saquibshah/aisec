<?php

require_once dirname(__FILE__).'/config.php';

$cookie_name = constant("COOKIE_USER");
$cookie_value = constant("POSTER_COOKIE_VALUE");							// Setting the cookies
setcookie($cookie_name, $cookie_value, time() 
				+ (86400 * 30), "/"); 				// 86400 = 1 day

// Checking whether the cookie has been set or not
/*
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
}
*/

?>