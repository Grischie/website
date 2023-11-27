<?php
	session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
        if ($_SESSION["rechte"] != 1){
			header("Location: kredianbietender.php");
			exit;
		}
?>  
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Kreditangebote</title>
    <style>
		.fehler { color: red; }
        .ok { color: green; }
	</style>
</head>
<body>
    <h1>Kreditangebote</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Kreditliste</h2>
    <form action="anfrage_n.php" method="post" >
    <?php 
		include('password.inc.php');	

        $con = mysqli_connect("localhost", "root", $ps, "online_banking");
        
        $sql = "select id, kreditanbieter, betrag, kondition from Kredite";
        $sql .= ' where nachfragender = "0"';
        $sql .= ' and status = "ausgeschrieben"';
        $res = mysqli_query($con, $sql);
        echo "<table border='1'>";
        echo "<tr> <td>Kreditor</td><td>Betrag</td><td>Kondition</td><td>Auswahl</td>";
        while ($dsatz = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . str_pad((string)$dsatz["kreditanbieter"], 5, '0', STR_PAD_LEFT) . "</td>";
            echo "<td>" . $dsatz["betrag"] . "€</td>";
            echo "<td>" . $dsatz["kondition"] . "</td>";
            echo "<td><input type='radio' name='auswahl' value='". $dsatz["id"] . "'";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        echo "<input type='submit' value='Beantragen'/>";
        if (isset($_GET["f"]) && $_GET["f"] == 2) {
			echo "<p class='ok'>Erfolgreich beantragt</p>";
		} elseif (isset($_GET["f"]) && $_GET["f"] == 1) {
			echo "<p class='fehler'>Bitte ein Kredit auswählen</p>";
		} 
	?>
	<p><a href="nachfragender.php">Zurück</p>
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