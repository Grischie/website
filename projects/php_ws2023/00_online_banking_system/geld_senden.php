<?php
	session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
?>  
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Kontostand</title>
    <style>
		.fehler { color: red; }
        .ok { color: green; }
	</style>
</head>
<body>
    
    <h1>Geld überweisen</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Überweisung</h2>
    <?php 
		if (isset($_GET["f"]) && $_GET["f"] == 1) {
			echo "<p class='fehler'>Nicht genügent Geld</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 2) {
			echo "<p class='fehler'>Kontonummer nicht korrekt</p>";
		} 
	?>
    <p>
    <form action="send.php" method="post" >
		Konto: <br />
		<input type="text" name="kontonummer" size="20" /><br /><br />
		Betrag: <br />
		<input type="number" name="betrag"size="20" /><br /><br />
        Kommentar: <br />
		<input type="text" name="kommentar"size="60" /><br /><br />
		<input type="submit" value="überweisen" />
	</form>
    </p>
    <?php
        if (isset($_GET["f"]) && $_GET["f"] == 3) {
			echo "<p class='ok'>Überweisung erfolgreich</p>";
		}
    ?>
	<p><a href="kreditanbietender.php">Zurück</p>
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