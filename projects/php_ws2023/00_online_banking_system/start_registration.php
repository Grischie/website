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
			echo "<p class='fehler'>Der Name ist schon vorhanden. Bitte aendern!</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 2) {
			echo "<p class='fehler'>Bitte ein Konto auswaehlen!</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 3) {
			echo "<p class='fehler'>Passwort stimmt nicht ueberein!</p>"; 
		} elseif (isset($_GET["f"]) && $_GET["f"] == 4) {
			echo "<p class='fehler'>Nicht alle Felder ausgefuellt!</p>";
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
</body>
</html>
