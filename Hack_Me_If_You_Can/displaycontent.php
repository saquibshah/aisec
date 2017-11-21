<?php
include dirname(__FILE__).'/appmanager.php';
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

function respondwithgibson($fileName) {
    //save file in session 
    //include gibson file
   AppManager::setValue('initfile', $fileName);
    include_once dirname(__FILE__).'/Gibson_pwGod/index.html';
    exit;
}

if (!isset($_GET['file']) || empty($_GET['file'])) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

$fileName = $_GET['file'];
//recursive for double dots with empty
$fileName = str_replace('..', '', $fileName);

if (is_dir($fileName)) {
    respondwithgibson($fileName);
}

//file_exists return true for files and folders
if (file_exists($fileName)) {
    if (startsWith($fileName, '/'))  {
        respondwithgibson($fileName);
    } else {
        AppManager::showPage($fileName);
    }
} else {
    header("HTTP/1.0 404 Not Found");
    exit;
}
