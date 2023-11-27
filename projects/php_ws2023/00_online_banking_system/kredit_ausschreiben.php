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
	<title>Kredit Ausschreibung</title>
    <style>
		.fehler { color: red; }
        .ok { color: green; }
	</style>
</head>
<body>
    
    <h1>Kredit ausschreiben</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Ausschreibung</h2>
    <?php 
		if (isset($_GET["f"]) && $_GET["f"] == 1) {
			echo "<p class='fehler'>Nicht genügent Geld</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 2) {
			echo "<p class='fehler'>Nicht alles ausgefüllt</p>";
		} 
	?>
    <p>
    <form action="auschreiben.php" method="post" >
		Betrag: <br />
		<input type="number" name="betrag"size="20" /><br /><br />
        Kondition: <br />
		<input type="text" name="kondition"size="60" /><br /><br />
		<input type="submit" value="Auschreiben" />
	</form>
    </p>
    <?php
        if (isset($_GET["f"]) && $_GET["f"] == 3) {
			echo "<p class='ok'>Kredit Ausschreibung erfolgreich</p>";
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