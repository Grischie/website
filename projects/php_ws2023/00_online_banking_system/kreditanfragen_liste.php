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
	<title>Kreditanfragen</title>
    <style>
		.fehler { color: red; }
        .ok { color: green; }
	</style>
</head>
<body>
    <h1>Kreditanfragen</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Kreditanfragen Liste</h2>
    <form action="liste_bearbeiten.php" method="post" >
    <?php 
		include('password.inc.php');	

        $con = mysqli_connect("localhost", "root", $ps, "online_banking");
        
        $sql = "select id, nachfragender, betrag, kondition from Kredite";
        $sql .= ' where kreditanbieter = "'. $_SESSION["kontonummer"] .'"';
        $sql .= ' and status = "angefragt"';
        $res = mysqli_query($con, $sql);
        echo "<table border='1'>";
        echo "<tr> <td>Nachfrager</td><td>Betrag</td><td>Kondition</td><td>Auswahl</td>";
        while ($dsatz = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . str_pad((string)$dsatz["nachfragender"], 5, '0', STR_PAD_LEFT) . "</td>";
            echo "<td>" . $dsatz["betrag"] . "€</td>";
            echo "<td>" . $dsatz["kondition"] . "</td>";
            echo "<td><input type='radio' name='auswahl' value='". $dsatz["id"] . "'";
            echo "</tr>";
        }
        echo "</table><br />";
        echo "Grund:";
        echo "<input type='test' name='grund' size='20' /><br />";
        echo "<input type='submit' name='action' value='Annhemen'/>";
        echo "<input type='submit' name='action' value='Ablehnen' /><br />";
        mysqli_close($con);
	?>
    </form>
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