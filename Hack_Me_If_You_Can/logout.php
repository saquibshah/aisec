<?php
include dirname(__FILE__).'/appmanager.php';
AppManager::forceLogout();
header("Location: disparityloginpage.php");
exit;