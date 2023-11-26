<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
	if ($_SESSION["rechte"] == 1){
		header("Location: nachfragender.php");
		exit;
	} elseif ($_SESSION["rechte"] == 0){
		header("Location: kreditanbietender.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Login</title>
	<style>
		.fehler { color: red; }
	</style>
</head>
<body>
	<?php 
		if (isset($_GET["f"]) && $_GET["f"] == 1) {
			echo "<p class='fehler'>Login-Daten nicht korrekt</p>";
		}
	?>
	<form action="login.php" method="post" >
		Ihr Name: <br />
		<input type="text" name="name" size="20" /><br /><br />
		Passwort: <br />
		<input type="password" name="passwort"size="20" /><br /><br/ >
		<input type="submit" value="Login" />
	</form>
	<br /><br /><br /><br />
	<a href="http://www.grischek-net.de/projects/php_ws2023/00_online_banking_system">Zurück</a>
</body>
</html>
