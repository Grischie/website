<?php
	session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
		if ($_SESSION["rechte"] != 0){
			header("Location: nachfragender.php");
			exit;
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Kreditanbietender</title>
</head>
<body>
	<?php
		echo "<h1>Hallo {$_SESSION['name']}</h1>";
	?>
	<p><a href="kontostand.php">Kontostand</p>
	<p><a href="geld_senden.php">Geld überweisen</p>
	<p><a href="kredit_ausschreiben.php">Kredite ausschreiben</p>
	<p><a href="kreditanfragen.php">Kreditanfragen</p>
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