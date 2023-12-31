<?php
	session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
        include('password.inc.php');	

        //Connection zur Dantenbank herstellen
        $con = mysqli_connect("localhost", "root", $ps, "online_banking");

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
		echo "<h2>Kontonummer: {$_SESSION['kontonummer']}<br />Kontostand: {$_SESSION['status']}€";
	?>
    <h2>Verlauf</h2>
    <p>
    <?php 
        if ($num == 0){
            echo "Keinen Verlauf gefunden"; 
        } else {
            while ($dsatz_hist = mysqli_fetch_assoc($res_hist)){
                $konto = str_pad((string)$dsatz_hist['kontonummer_b'], 5, '0', STR_PAD_LEFT);
                echo  $konto . "     ||     " . $dsatz_hist["betrag"] . "€     ||     ".$dsatz_hist["kommentar"]." <br />";
            }
        }
       mysqli_close($con);
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