<?php
	session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
        include('password.inc.php');	

        //Connection zur Dantenbank herstellen
        $con = mysqli_connect("localhost", "root", $ps, "online_banking");

        //Konto Daten
        $sql_konto = "select status from Konto";
        $sql_konto .= ' where kontonummer = "'. $_SESSION["kontonummer"] .'"';
        $res_konto = mysqli_query($con, $sql_konto);
        $dsatz_konto = mysqli_fetch_assoc($res_konto);
        $_SESSION['status'] = $dsatz_konto['status'];

        
        //Überweisung
        $sql_hist = "select kontonummer_s, betrag, kontonummer_b, kommentar from Transaktionen";
        $sql_hist .= ' where kontonummer_s = "'. $_SESSION["kontonummer"] .'"';
        $res_hist = mysqli_query($con, $sql_hist);

        $num = mysqli_num_rows($res_hist);
        
?>  
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Kontostand</title>
</head>
<body>
    <h1>Kontostand</h1>
	<?php
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€s";
	?>
    <h2>Verlauf</h2>
    <p>
    <?php 
        /*
        if ($num == 0){
            echo "Keinen Verlauf gefunden"; 
        } else {
            while ($dsatz_hist = mysqli_fetch_assoc($res_hist)){
                if (intval($dsatz_hist["betrag"]) > 0){
                    echo "Von" .$dsatz_hist["kontonummer_b"] . " -- " . $dsatz_hist["betrag"] . "€<br />";
                } else {
                    echo "Zu" .$dsatz_hist["kontonummer_b"] . " -- " . $dsatz_hist["betrag"] . "€<br />";
                }
            }
        }
       mysqli_close($con);
       */
	?>
    </p>
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