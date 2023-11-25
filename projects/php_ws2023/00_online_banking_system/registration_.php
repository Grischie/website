<?php
session_start(); 
//Prüfen ob die eingegebnen Daten korrekt sind
if (isset($_POST["vorname"]) && isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["geburtstag"]) && isset($_POST["kapital"]) && isset($_POST["passwort_1"]) && isset($_POST["passwort_2"])) {

    //Password für die Datenbank importierens
    include('password.inc.php');	

    //Connection zur Dantenbank herstellen
    $con = mysqli_connect("localhost", "root", $ps, "online_banking");

    //SQL Statement herstellen
    $sql_user = "select name, from User";
    $sql_user .= ' where name = "'. $_POST["name"] .'"';

    //SQL Query senden
    $res_user = mysqli_query($con, $sql_user);

    //Anzahl der SQL ergebnisse 
    $num = mysqli_num_rows($res_user);

    //Prüfe ob name schonmal verwendet wurde
    if ($num > 0){
        header("Location: start_registration.php?f=1"); 
        exit;
    }
	if (isset($_POST["rechte_0"]) == isset($_POST["rechte_1"])){
        header("Location: start_registration.php?f=2"); 
        exit;
    }
    if ($_POST["passwort_1"] != $_POST["passwort_2"]){
        header("Location: start_registration.php?f=3"); 
        exit;
    }
    //Datenbankanbindung ...
    $_SESSION["name"] = $_POST["name"]; 
	$_SESSION["login"] = "ok";
	if($dsatz["rechte"] == 0){
		header("Location: willkommen_kreditanbietende.php");
	} else {
		header("Location: willkommen_nachfragende.php");
	}
	exit;
} else {
	header("Location: start_registration.php?f=4"); 
    exit;
} 
?> 
