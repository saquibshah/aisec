<?php

require_once dirname(__FILE__).'/config.php';

session_start();  


if (isset($_GET['page'])){
$noise = constant("NOISE_GIF");
    //$noise = "./assets/images/404.jpg";

    // Arrays of pages for token1
    $token1pages = array("42postcard", "53poster53", "1nt3rn3t");
    
    // Checking elements in array
    if(in_array($_GET['page'],$token1pages)){
        $noise = constant("FATIH_TOP");
        if(!isset($_SESSION['token1']))
            $_SESSION["token1"] = getToken(20);  
    }

    // Checking the Shellcode
    if($_GET['page'] == constant("SHELLCODE_LINK")){
        $noise = constant("FATIH_BOT");
        if(!isset($_SESSION['token2'])){
            $_SESSION["token2"] = getToken(20);  
        }
    }
    
    // Checking th Crypto code
    if($_GET['page'] == constant("CRYPTO_LINK")){
        $noise = constant("CRYPTO_SOLUTION");
        if(!isset($_SESSION['token3'])){
            $_SESSION["token3"] = getToken(20);  
        }
    }

    // Checking the Gibson code
    if($_GET['page'] == constant("GIBSON_LINK")){
        $noise = constant("RABBIT");
        if(!isset($_SESSION['token4'])){
            $_SESSION["token4"] = getToken(20);  
        }
    }

} else {
  // no page variable
	echo '<html><head><title>What are you looking for?</title></head><body><img align="center" src="./assets/images/butthead.jpg" />';
        exit;
}

?>
