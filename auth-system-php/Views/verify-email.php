<?php 
	require_once("../vendor/autoload.php");
	include "../App/Controllers/EmailVerification.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
		<title>Verificar email</title>
	</head>
	<body>
		<div>
			<?php if(!empty($email_already_verified)) { ?>
				<div class="success">
					<p><?php echo $email_already_verified; ?></p>
				</div>
			<?php } ?>
            
            <?php if(!empty($email_verified)){ ?>
           		<div class="success">
	           		<p><?php echo $email_verified; ?></p>
	           	</div>
           	<?php } ?>

           	<?php if(!empty($activation_error)){ ?>
            	<div class="errors">
            		<p><?php echo $activation_error; ?></p>
            	</div>
        	<?php } ?>
		</div>

		<p class="lead">If user account is verified then click on the following button to login.</p>
        <a class="btn btn-lg btn-success" href="./index.php">Click to Login</a>

        <script src="js/script.js"></script>
	</body>
</html>