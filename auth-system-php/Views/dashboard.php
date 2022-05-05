<?php 
	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
		header("Location: index.php");
		exit;
	}

	if(isset($_SESSION['loggedin']) && is_null($_SESSION['email_verified_at'])){
		header("Location: redirect-email-verification.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
		<title>Dashboard</title>
	</head>
	<body>
		<?php include_once("header.php") ?>

		<h1>Bem vindo <?php echo htmlspecialchars($_SESSION['name'])?></h1>
	</body>
</html>