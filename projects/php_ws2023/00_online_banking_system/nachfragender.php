<?php
	session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
		if ($_SESSION["rechte"] != 1){
			header("Location: kreditanbietender.php");
			exit;
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Nachfragender</title>
</head>
<body>
	<?php
		echo "<h1>Hallo {$_SESSION['name']}</h1>";
	?>
	<p><a href="kontostand.php">Kontostand</p>
	<p><a href="geld_senden.php">Geld überweisen</p>
	<p><a href="kreditanfragen.php">Kredit anfragen</p>
	<p><a href="kreditangebote.php">Kreditangebote</p>
	<p><a href="bearbeitungsstand.php">Bearbeitungsstand</p>
	<p><a href="logout.php">Ausloggen</p>
</body>
</html>
<?php
	} else {
		$host = htmlspecialchars
		($_SERVER["HTTP_HOST"]);
		$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])),"/\\");
		$extra = "start_login.php";
		header("Location:http://$host$uri/$extra");
	}
?>