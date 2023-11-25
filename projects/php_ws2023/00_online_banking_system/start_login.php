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
</body>
</html>
