<?php 
	require_once("../vendor/autoload.php");

	use App\Controllers\ResetPasswordController;

	if(!isset($_SESSION)){
		session_start();
	}

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
		header("Location: dashboard.php");
		exit;
	}

	if(isset($_GET['key']) && isset($_GET['action']) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
		$date = date("Y-m-d H:i:s");
		$error = "";

		$resetPasswordController = new ResetPasswordController();
		$user_reset_password = $resetPasswordController->getTokenResetPasswordFromUser($_GET['key']);

		if (!isset($user_reset_password['email'])) {
			$error .= '<h2>Invalid Link</h2>
						<p>The link is invalid/expired. Either you did not copy the correct link
						from the email, or you have already used the key in which case it is 
						deactivated.</p>
						<p><a href="forgot-password.php">
						Click here</a> to reset password.</p>';
		}
		else{

			?>

			<!DOCTYPE html>
				<html>
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel="stylesheet" type="text/css" href="/css/styles.css">
					<title></title>
				</head>
				<body>
				
			<?php
			if($user_reset_password['expiration_date'] >= $date){
			?>

				<br />
				<div class="form-container">
					<form method="post" action="" name="update">
						<input type="hidden" name="action" value="update" />

						<div class="field">
							<label><strong>Enter New Password:</strong></label><br />
							<input type="password" name="pass1" maxlength="15" required />
						</div>
						
						<div class="field">
							<label><strong>Re-Enter New Password:</strong></label><br />
							<input type="password" name="pass2" maxlength="15" required/>	
						</div>

						<input type="hidden" name="email" value="<?php echo $user_reset_password['email'];?>"/>
						<input type="hidden" name="token" value="<?php echo $user_reset_password['token'];?>"/>
						
						<div class="field">
							<button type="submit" class="btn-submit" name="reset_password">Atualizar</button>
						</div>
					</form>	
				</div>
				

			<?php 
			} else {
				$error .= "<h2>Link Expired</h2>
				<p>The link is expired. You are trying to use the expired link which 
				as valid only 24 hours (1 days after request).<br /><br /></p>";
			} ?>

				</body>
			</html>
		<?php } 
				
		if($error!=""){
		    echo "<div class='errors'>".$error."</div><br />";
		}
	}
	

	if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
		$error="";
		$email = $_POST["email"];
		$date = date("Y-m-d H:i:s");

		if ($_POST['pass1']!=$_POST['pass2']){
			$error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
		}
			
		if($error!=""){
			echo "<div class='errors'>".$error."</div><br />";
		}
		else{
			$resetPasswordController = new ResetPasswordController();
			$message = $resetPasswordController->updateUserPassword($email,$_POST['token'],$_POST['pass1']);
			
			echo $message;			
		}		
	}
?>
