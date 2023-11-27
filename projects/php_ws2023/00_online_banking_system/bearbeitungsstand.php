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
	<title>Bearbeitungsstand</title>
    <style>
		.fehler { color: red; }
        .ok { color: green; }
	</style>
</head>
<body>
    <h1>Bearbeitungsstand</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Kredit Liste</h2>
    <?php 
		include('password.inc.php');	

        $con = mysqli_connect("localhost", "root", $ps, "online_banking");
        
        $sql = "select kreditanbieter, betrag, kondition, status from Kredite";
        $sql .= ' where nachfragender = "'. $_SESSION["kontonummer"] .'"';

        $res = mysqli_query($con, $sql);
        echo "<table border='1'>";
        echo "<tr> <td>Kreditor</td><td>Betrag</td><td>Kondition</td><td>Status</td>";
        while ($dsatz = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . str_pad((string)$dsatz["kreditanbieter"], 5, '0', STR_PAD_LEFT) . "</td>";
            echo "<td>" . $dsatz["betrag"] . "€</td>";
            echo "<td>" . $dsatz["konditon"] . "</td>";
            echo "<td>" . $dsatz["status"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
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