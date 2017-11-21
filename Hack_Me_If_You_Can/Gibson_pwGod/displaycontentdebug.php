<?php 
    include dirname(__FILE__).'/../appmanager.php';
?>

<?php
$command = null;
$returnMsg = null;
$returnStr = null;
$lineCounter = 0;
$returnStrTemp = null;
$text = null;
$start = 0;
$blacklist = array(".db", ".php", "hello", "world");
$whitelist = array("foo", "bar", "hello", "world");


function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i+=2){
        $ord = ord($string[$i+1]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}


if(isset($_REQUEST['command']) && $_REQUEST['command']!= null){
	$command = $_REQUEST['command'];
	if($command==null){
		$returnMsg = 'command is null';
		$returnStr = 'A path must be entered!';
	} else if ($command=="getInitialPath") {
	        $returnMsg = 'path response';
		//$returnStr = getSavedSessionPath();
		$returnStr = AppManager::getValue2('initfile');
        } else{
		if(file_exists($command)){
			if(in_array($command, $blacklist)){
				$returnMsg = 'no access';
				$returnStr = 'You do not have access on this path!';
			}else{
				if (is_dir($command)) {
					$arr = scandir($command);
					if(empty($arr)){
						$returnMsg = 'no access';
						$returnStr = "You do not have access on this path!";
					}else{
						$returnMsg = 'success';
						$returnStr = implode("\n",$arr);
					}
				}
				if(is_file($command)) {
					if(in_array($command, $whitelist)){
						$returnMsg = 'success';
						$returnStr = file_get_contents($command);
					}else{
						while($lineCounter < 116) {
								$text = wordwrap(strToHex(file_get_contents($command, NULL, NULL, $start, 16)) , 4 , ' ' , true );
								if($text != null){
									$returnStrTemp = sprintf("[%08x]",$start) . "\t\t" . $text . "\n";
									$returnStr = $returnStr . $returnStrTemp;
								}
								$lineCounter++;
								$start = $start + 16;
							}
						$returnMsg = 'success';
					}
				}
			}
		}else{
			$returnMsg = 'no directory';
			$returnStr = 'No such path on the server!';
		}
	}
}else{
	$returnMsg = 'command is null';
	$returnStr = 'A command must be entered!';
}

$return = new stdClass;
$return->success = $returnMsg;
$return->data = $returnStr;
$json = json_encode($return);
echo $json;
?>
