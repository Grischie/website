<?php
session_start(); 

//Password für die Datenbank importierens
include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");

//SQL Statement herstellen
$sql = "select name, password, rechte from User";
$sql .= ' where name = "'. $_POST["name"] .'"';

//SQL Query senden
$res = mysqli_query($con, $sql);

//Anzahl der SQL ergebnisse 
$num = mysqli_num_rows($res);
if ($num == 0){
	header("Location: start_login.php?f=1"); 
	exit;
}
//Datensatz holen
$dsatz = mysqli_fetch_assoc($res);	

//Prüfen ob die eingegebnen Daten korrekt sind
if (isset($_POST["name"]) && $_POST["name"] == $dsatz["name"] && $_POST["passwort"] == $dsatz["password"]) {
	$_SESSION["name"] = $_POST["name"]; 
	$_SESSION["login"] = "ok";
	$_SESSION["rechte"] = $dsatz["rechte"];
	if($dsatz["rechte"] == 0){
		header("Location: willkommen_kreditanbietende.php");
	} else {
		header("Location: willkommen_nachfragende.php");
	}
	exit;
} else {
	header("Location: start_login.php?f=1"); 
exit;
} 
?>