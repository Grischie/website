<?php
session_start(); 
include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");


//Prüfen ob die eingegebnen Daten korrekt sind
if (isset($_POST["name"]) && $_POST["name"] == $dsatz["name"] && $_POST["passwort"] == $dsatz["password"]) {
	$_SESSION["name"] = $_POST["name"]; 
	$_SESSION["login"] = "ok";
	$_SESSION["rechte"] = $dsatz["rechte"];
	$_SESSION["kontonummer"] = str_pad((string)$dsatz["kontonummer"], 5, '0', STR_PAD_LEFT);
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