<?php
session_start(); 
include('password.inc.php');	

$con = mysqli_connect("localhost", "root", $ps, "online_banking");

if (isset($_POST["kontonummer"]) && $_POST["kontonummer"] != "" && $_POST["betrag"] != "" && $_POST["kondition"] != "") {

	$sql_new = "insert into Kredite (kreditanbieter, nachfragender, betrag, kondition, status) values "
	. "('" 
	. $_POST["kontonummer"] . "', '"
    . $_SESSION["kontonummer"] . "', '"
	. $_POST["betrag"] . "', '"
	. $_POST["kondition"] . "', '"
	. "angefragt"."'"
	.")";

	mysqli_query($con, $sql_new);
	mysqli_close($con);
	header("Location: kreditanbietender.php?f=2"); 
	exit;
} else {
	header("Location: kreditanbietender.php?f=1"); 
exit;
} 
?>