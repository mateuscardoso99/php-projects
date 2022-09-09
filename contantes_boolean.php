<?php
	//constantes
	define('VALOR',10);
	define("FOO","alguma coisa");

	echo VALOR;

	//boolean
	$teste = TRUE;

	//cookies
	$cookie_name = "user";
	$cookie_value = "John Doe";

	setcookie(name, value, expire, path, domain, secure, httponly); //parametros
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

	<html>
	<body>

	<?php
	if(!isset($_COOKIE[$cookie_name])) {
	  echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
	  echo "Cookie '" . $cookie_name . "' is set!<br>";
	  echo "Value is: " . $_COOKIE[$cookie_name];
	}
	?>

	</body>
	</html>

	*Para excluir um cookie, use a setcookie()função com data de validade no passado
?>