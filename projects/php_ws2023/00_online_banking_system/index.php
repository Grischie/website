<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
	if ($_SESSION["rechte"] == 1){
		header("Location: willkommen_nachfragende.php");
		exit;
	} elseif ($_SESSION["rechte"] == 0){
		header("Location: willkommen_kreditanbietende.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Onlinebanking</title>
</head>
<body>
    <h1>Onlinebanking</h1><br /><br /><br />
    <a href="http://www.grischek-net.de/projects/php_ws2023/00_online_banking_system/start_login.php">Login</a><br /><br />
    <a href="http://www.grischek-net.de/projects/php_ws2023/00_online_banking_system/start_registration.php">Registration</a>
</body>