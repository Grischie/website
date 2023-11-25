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
	<title>Registration</title>
	<style>
		.fehler { color: red; }
	</style>
</head>
<body>
	<?php 
		if (isset($_GET["f"]) && $_GET["f"] == 1) {
			echo "<p class='fehler'>Der Name ist schon vorhanden. Bitte ändern!</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 2) {
			echo "<p class='fehler'>Bitte ein Konto auswählen!</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 3) {
			echo "<p class='fehler'>Passwort stimmt nicht überein!</p>"; 
		} elseif (isset($_GET["f"]) && $_GET["f"] == 4) {
			echo "<p class='fehler'>Nicht alle Felder ausgefüllt!</p>";
		}
	?>
	<form action="registration.php" method="post" >
		Vorname: 
		<input type="text" name="vorname" size="20" />
		Name: 
		<input type="text" name="name" size="20" /><br /><br />
		E-mail: 
		<input type="email" name="mail" size="40" /><br /><br />
		Geburtstag: 
		<input type="date" name="geburtstag" max="<?php echo date('Y-m-d'); ?>"/><br /><br /><br />
		Ein Konto auswählen:<br />
		Nachfragende:
		<input type="checkbox" name="rechte_1" />
		Kreditanbietende:
		<input type="checkbox" name="rechte_0" /><br /><br /><br />
		Start Kapital: 
		<input type="number" name="kapital" size="20" min="0" max="1000000" />€<br /><br /><br />
		Passwort: <br />
		<input type="password" name="passwort_1"size="20" /><br /><br />
		Passwort erneut eingeben: <br />
		<input type="password" name="passwort_2"size="20" /><br /><br /><br />
		<input type="submit" value="Registrieren" />
	</form>
	<br /><br /><br /><br />
	<a href="http://www.grischek-net.de/projects/php_ws2023/00_online_banking_system">Zurück</a>
</body>
</html>
