<?php
	if (!empty($_GET["name"])) {
	setcookie("name", $_GET["name"], time()+7200);
	setcookie("nachname", $_GET["nachname"], time()+7200);
	}
	$cookieName = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';
	$cookieNachname = isset($_COOKIE['nachname']) ? $_COOKIE['nachname'] : '';
	
?>
<!DOCTYPE html>
<html>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
 	Ihr Name: <br />
	<input type="text" name="name" value="<?php echo htmlspecialchars($cookieName); ?>"/> <br />
	Ihr Nachname: <br />
	<input type="text" name="nachname" value="<?php echo htmlspecialchars($cookieNachname); ?>"/> <br />
	<input type="submit" value="Abschicken" />
</form>
	<a href= "sc_adresse_b.php">Weiter</a>
</body>
</html>
