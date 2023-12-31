<?php
session_start(); 

//Password für die Datenbank importierens
include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");

//SQL Statement herstellen
$sql = "select * from User";
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
	$_SESSION["kontonummer"] = str_pad((string)$dsatz["kontonummer"], 5, '0', STR_PAD_LEFT);

	$sql_konto = "select status from Konto";
    $sql_konto .= ' where kontonummer = "'. intval($_SESSION["kontonummer"]) .'"';
    $res_konto = mysqli_query($con, $sql_konto);
    $dsatz_konto = mysqli_fetch_assoc($res_konto);
	mysqli_close($con);
	
    $_SESSION['status'] = $dsatz_konto['status'];

	if($dsatz["rechte"] == 0){
		header("Location: kreditanbietender.php");
	} else {
		header("Location: nachfragender.php");
	}
	exit;
} else {
	header("Location: start_login.php?f=1"); 
exit;
} 
?>