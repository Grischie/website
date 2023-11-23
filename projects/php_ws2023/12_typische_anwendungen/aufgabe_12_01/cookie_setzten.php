<?php
	if (!empty($_GET["name"])) {
	setcookie("name", $_GET["name"], time()+7200);
	}
?>
<!DOCTYPE html>
<html>
<body>
<form action="cookie_auslesen.php" method="get">
 	Ihr Name: <br />
	<input type="text" name="name" />
	<input type="submit" value="Abschicken" />
</form>
</body>
</html>
