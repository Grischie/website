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
	<title>Kredit anfragen</title>
    <style>
		.fehler { color: red; }
        .ok { color: green; }
	</style>
</head>
<body>
    <h1>Kredit anfragen</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Kreditanbieter Liste</h2>
    <?php 
		include('password.inc.php');	

        $con = mysqli_connect("localhost", "root", $ps, "online_banking");
        
        $sql = "select name, vorname, kontonummer from User";
        $sql .= ' where rechte = "0"';

        $res = mysqli_query($con, $sql);
        echo "<table border='1'>";
        echo "<tr> <td>Name</td><td>Vorname</td><td>Kontonummer</td>";
        while ($dsatz = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . $dsatz["name"] . "</td>";
            echo "<td>" . $dsatz["vorname"] . "</td>";
            echo "<td>" . $dsatz["kontonummer"] . "</td>";
            echo "</tr>";
            }
        echo "</table>";
	?>
    <h2>Anfragen</h2>
    <?php 
		if (isset($_GET["f"]) && $_GET["f"] == 1) {
			echo "<p class='fehler'>Anfrage nicht erfolgreich</p>";
		}
	?>
    <p>
    <form action="anfrage.php" method="post" >
        Kontonummer: <br />
        <?php
            $res = mysqli_query($con, $sql);
            echo '<select name="kontonummer">';
            while ($dsatz = mysqli_fetch_assoc($res)){
                echo '<option value="'.$dsatz["kontonummer"] .'">'.$dsatz["kontonummer"] . '</option>';
            }
            echo "</select>";
            mysqli_close($con);
        ?>
		<br /><br />
		Betrag: <br />
		<input type="number" name="betrag"size="20" /><br /><br />
        Kondition: <br />
		<input type="text" name="kondition"size="60" /><br /><br />
		<input type="submit" value="Anfragen" />
	</form>
    </p>
    <?php
        if (isset($_GET["f"]) && $_GET["f"] == 2) {
			echo "<p class='ok'>Anfrage erfolgreich</p>";
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