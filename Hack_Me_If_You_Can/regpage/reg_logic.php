<?php
if (!defined('MyConst')) {
	die("This is an include-file!");
}

require_once dirname(__FILE__).'/../appmanager.php';

class Department{
	var $Id;
	var $Name;

	function Department($id, $name) {
		$this->Id = $id;
		$this->Name = $name;
	}
}


function setSession($name, $value){
	//$_SESSION[$name] = $value;
	AppManager::setValue($name, $value); 
}

function getSession($name){
	//return $_SESSION[$name];
	return AppManager::getValue($name);
}


function encrypt($input, $nopadding = false) {
	if ( strlen($input) > 4096/8){
		throw new Exception("Encryption: data too long not supported!");
	}

	if ($nopadding){
		$data = str_pad($input, 4096/8, " ", STR_PAD_RIGHT);
		$padding = OPENSSL_NO_PADDING;
	} else {
		$data = $input;
		$padding = OPENSSL_PKCS1_PADDING;
	}

	if (openssl_public_encrypt($data, $crypted, constant("PUBLIC_KEY"), $padding)) {
		return $crypted;
	}
	throw new Exception("Failed to encrypt data.");
}

function decrypt($crypted, $nopadding = false){
	if (openssl_private_decrypt($crypted, $decrypted, constant("PRIVATE_KEY") , ($nopadding ? OPENSSL_NO_PADDING : OPENSSL_PKCS1_PADDING) )) {
		return $decrypted; 		
	}
	throw new Exception("Decryption failed. ");
}

function validate_len($data, $name, $min, $max){
	global $error;
	$len = strlen($data);

	if ($len > $max){
		$error .= $name." is too long.<br>";
		return false;
	} else if ($len < $min){
		$error .= $name." is too short.<br>";
		return false;
	}
	return true;
}

function validate_date($input){
	global $error;
	$date = date_create($input);
	if ($date && $date <= new DateTime() && $date >= new DateTime("2000-01-01") ) return;
	$error .= "Employed Since: not a valid date (has to be between '01-01-2000' and current date).<br>";
}

function exists($db, $query, $param){
	$stmt = $db->prepare($query);
	$stmt->bindValue(':param', $param);
	$r = $stmt->execute();
	$arr = $r->fetchArray(SQLITE3_ASSOC);
	return ($arr && count($arr) > 0);		
}

function checkToken($number){
	$tok = "token".$number;
	return (!empty($_POST[$tok]) && getSession($tok) == $_POST[$tok]);
}

function checkDepartment(){
	global $error;
	global $departments;
	if (empty($_POST['dprt'])) return true;

	foreach($departments as $d) {
		if ($_POST['dprt'] == $d->Id){
			return true;
		}
	}
	$error .= "Department: Unknown department '".$_POST['dprt']."'.<br>";
	return false;
}

function handleSubmit(){
	global $error;
	global $success;

	if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['tkprt']) ) {
		$error .= "Please, fill all mandatory fields.<br>";
		return;
	}

	# 1) validate & encrypt
	validate_len($_POST['username'], "Username", 6, 32);
	validate_date($_POST['empsince']);
	checkDepartment();

	if ($_POST['tkprt'] != "yes" && $_POST['tkprt'] != "no"){
		$error .= "Please, answer the question about participating in the event correctly.<br>";
	}
	if (!empty($_POST['gender']) && $_POST['gender'] != 'F' && $_POST['gender'] != 'M'){
		$error .= "Gender is not specified correctly.<br>";
	}
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error .= "Email is not valid.<br>";
	}

	if ($error != "") return;

	$username = base64_encode( encrypt($_POST['username'], true) );
	$email = base64_encode( encrypt($_POST['email'], true) );

	$dbreg = new SQLite3(constant("REGISTRATION_DATABASE"));

	if ( exists($dbreg, constant("CHECK_USERNAME"), $username))
		$error .= "Username: already in use.<br>";

	if (exists($dbreg, constant("CHECK_EMAIL"), $email))
		$error .= "Email: already in use.<br>";

	$fname = base64_encode( encrypt($_POST['fname']) );
	$lname = base64_encode( encrypt($_POST['lname']) );
	$department = $_POST['dprt'];
	$employeesince = $_POST['empsince'];
	$willparticipate = ($_POST['tkprt'] == "yes") ? '1' : '0';

	$token1 = checkToken(1); 
	$token2 = checkToken(2); 
	$token3 = checkToken(3); 
	$token4 = checkToken(4); 

	if ($error != "") return;

	// 2) send email
	$to = $_POST['email'];
	$subject = "Registration to ".constant("COMPANY_NAME")." hacking event.";
	$message = ($willparticipate) ? constant("ACCEPT_EMAIL") : constant("REJECT_EMAIL");
	$message = str_replace("<username>", $_POST['username'], $message);
	$message = str_replace("<email>", $_POST['email'], $message);
	$message = str_replace("<first_name>", $_POST['fname'], $message);
	$message = str_replace("<last_name>", $_POST['lname'], $message);
	$message = str_replace("<email>", $_POST['email'], $message);
	$message = str_replace("<employed since>", $_POST['empsince'], $message);
	$message = str_replace("<department>", $_POST['dprt'], $message);
	$message = str_replace("<token1>", $_POST['token1'], $message);
	$message = str_replace("<token2>", $_POST['token2'], $message);
	$message = str_replace("<token3>", $_POST['token3'], $message);
	$message = str_replace("<token4>", $_POST['token4'], $message);
	$message = str_replace("<willtakepart>", $_POST['tkprt'], $message);
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From:hr@disparity.com" . "\r\n";
	$headers .= "Sender:hr@disparity.com" . "\r\n";
	$headers .= "Reply-To:noreply@disparity.com" . "\r\n";
	$mailsent =	mail($to,$subject,$message,$headers);
	if (false == $mailsent) {
		$error .= "Failed to send an Email.<br>";
		return;
	}

	# 3) store to database	
	$stmt = $dbreg->prepare(constant("INSERT_REG"));
	$stmt->bindValue(':username', $username);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':firstname', $fname);
	$stmt->bindValue(':lastname', $lname);
	$stmt->bindValue(':gender', $_POST['gender']);
	$stmt->bindValue(':employeesince', $employeesince);
	$stmt->bindValue(':department', $department);
	$stmt->bindValue(':willparticipate', $willparticipate);
	$stmt->bindValue(':token1', $token1);
	$stmt->bindValue(':token2', $token2);
	$stmt->bindValue(':token3', $token3);
	$stmt->bindValue(':token4', $token4);
	$inserted = $stmt->execute();

	if ($inserted) {
		$success = "Congratulations! You have been registered successfully!";
		# TODO: remove tokens from session
	} else {
		$error .= "ERROR!";
	}
}

?>