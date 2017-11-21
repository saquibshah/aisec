<?php

define('MyConst', TRUE);

require_once dirname(__FILE__).'/appmanager.php';
$parent = dirname(dirname($_SERVER['REQUEST_URI']));
if (!AppManager::isLoggedIn()) {
    header("Location: {$parent}/disparityloginpage.php");
    exit;
}
if (!AppManager::isSolvedQr()) {
    header("Location: {$parent}/qrcodeauth.php");
    exit;
}

AppManager::generateTokenResult();

#globals
$error = "";
$success = "";
$departments = array();
// TODO: fill departments from database

require_once './regpage/reg_logic.php';
?>
<link href="regpage/reg.css" rel="stylesheet">
<link href="regpage/datepicker.css" rel="stylesheet">
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="regpage/datepicker.js"></script>
<script type="text/javascript">
        $(document).ready( function() {
                $('#empsince').datepicker({format: "dd-mm-yyyy"});
        });
</script>

<?php
$result = null;
	#test encrcyption
	#try{
	#	$crypted = encrypt("plain text data", true);
	#	echo "<br>Encrypted:  ".$crypted."<br>";
	#	$decrypted = decrypt($crypted);
	#	echo "<br>Decryped:  ".$decrypted."s<br>";
	#} catch(Exception $exc){ echo $exc->getMessage(); }

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$result = handleSubmit();
	}
?>


<!-- <h3 style="font-size: 30px; margin-bottom: 25px;">Registration</h3> -->

            <div class="main-login main-center" style="background-color: #FFF; margin-bottom: 20px;">
                <?php if (!empty($result) && $result['result'] === TRUE) { ?>
                <div style="margin-left: -15px; margin-right: -15px; margin-bottom: 15px;" class="alert alert-success" role="alert"><?= $result['message'] ?></div>
                <?php } if (!empty($result) && $result['result'] === FALSE) { ?>
                <div style="margin-left: -15px; margin-right: -15px; margin-bottom: 15px;" class="alert alert-danger" role="alert"><?= $result['message'] ?></div>
                <?php } ?>
			<form class="form-horizontal" method="post">

				<div class="form-group">
					<label for="username" class="cols-sm-2 control-label">Username</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="username"
								id="username"
								value="<?= isset($_POST['username'])?$_POST['username']:"" ?>"
								title="Enter your username (must be unique)"
								placeholder="Enter your Username"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="email"
								id="email"
								value="<?= isset($_POST['email'])?$_POST['email']:"" ?>"
								title="Enter your Email-address"
								placeholder="Enter your Email"/>
						</div>
					</div>
				</div>
	
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">First Name</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="fname"
								id="fname"
								value="<?= isset($_POST['fname'])?$_POST['fname']:"" ?>"
								title="Enter your First Name"
								placeholder="Enter your First Name"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Last Name</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="lname"
								id="lname"
								value="<?= isset($_POST['lname'])?$_POST['lname']:"" ?>"
								title="Enter your Last Name"
								placeholder="Enter your Last Name"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Employed Since</label>
					<div class="cols-sm-10">
						<div class="input-group date" data-provide="datepicker">
						    <div class="input-group-addon">
        						<span class="glyphicon glyphicon-th"></span>
    						</div>
						    <input type="text" class="form-control"
								name="empsince"
								id="empsince"
								value="<?= isset($_POST['empsince'])?$_POST['empsince']:"" ?>"
								title="The date you are employed since"
								placeholder="The date you are employed since">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="dprt" class="cols-sm-2 control-label">Department</label>
					<div class="cols-sm-10">
						<div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i></span>
							<select class="form-control" name="dprt" id="dprt" 
									value="<?= isset($_POST['dprt'])?$_POST['dprt']:"" ?>">
								<option value="" 
									<?php echo (isset($_POST['dprt']) && empty($_POST['dprt']) ? "selected" : ""); ?>
									disabled>Select the department where you work</option>

								<?php foreach($departments as $dprt) { ?>
								<option value="<?php echo $dprt->Mnemonics; ?>" 
									<?php echo ((isset($_POST['dprt']) && $_POST['dprt']==$dprt->Mnemonics)?"selected":"");
									?> 
									><?php echo $dprt->Name; ?></option>
								<?php } ?>
							</select>
						</div>
 					</div>
				</div>

				<div class="form-group">
					<label for="token1" class="cols-sm-2 control-label">Token 1</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="token1"
								id="token1"
								value="<?= isset($_POST['token1'])?$_POST['token1']:"" ?>"
								title="Enter token1"
								placeholder="Enter token1"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="token2" class="cols-sm-2 control-label">Token 2</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="token2"
								id="token2"
								value="<?= isset($_POST['token2'])?$_POST['token2']:"" ?>"
								title="Enter token2"
								placeholder="Enter token2"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="token3" class="cols-sm-2 control-label">Token 3</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="token3"
								id="token3"
								value="<?= isset($_POST['token3'])?$_POST['token3']:"" ?>"
								title="Enter token3"
								placeholder="Enter token 3"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="token4" class="cols-sm-2 control-label">Token 4</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i></span>
							<input type="text"
								class="form-control"
								name="token4"
								id="token2"
								value="<?= isset($_POST['token4'])?$_POST['token4']:"" ?>"
								title="Enter token4"
								placeholder="Enter token 4"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="cols-sm-10">
						<div class="checkbox">
							<label for="willparticipate" class="cols-sm-2 control-label">
							<input type="checkbox"
								name="willparticipate"
								<?php echo ((isset($_POST['willparticipate']) && $_POST['willparticipate'] == "on") ? "checked" : ""); ?>
								id="willparticipate" /> I want to take part in the event.</label>
						</div>
					</div>
				</div>

				<div class="form-group ">
					<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
				</div>
			</form>
		</div>
   
