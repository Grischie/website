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
    <?php 
		include('password.inc.php');	

        $con = mysqli_connect("localhost", "root", $ps, "online_banking");
        
        $sql = "select kreditanbieter, betrag, kondition from Kredite";
        $sql .= ' where nachfragender = "0"';
        $sql .= ' and status = "ausgeschrieben"';
        $res = mysqli_query($con, $sql);
        echo "<table border='1'>";
        echo "<tr> <td>Kreditor</td><td>Betrag</td><td>Kondition</td>";
        while ($dsatz = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . str_pad((string)$dsatz["kreditanbieter"], 5, '0', STR_PAD_LEFT) . "</td>";
            echo "<td>" . $dsatz["betrag"] . "€</td>";
            echo "<td>" . $dsatz["konditon"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
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