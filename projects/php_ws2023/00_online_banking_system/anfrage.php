<?php
session_start(); 
include('password.inc.php');	

$con = mysqli_connect("localhost", "root", $ps, "online_banking");
$sql_max = "select max(id) from Kredite";
$res_max = mysqli_query($con, $sql_max);
$id = mysqli_fetch_assoc($res_max);	
$id = intval($id["max(id)"]);
$id = $id + 1;

if (isset($_POST["kontonummer"]) && $_POST["kontonummer"] != "" && $_POST["betrag"] != "" && $_POST["kondition"] != "") {

	$sql_new = "insert into Kredite (id, kreditanbieter, nachfragender, betrag, kondition, status) values "
	. "('" 
	. $id. "', '"
	. $_POST["kontonummer"] . "', '"
    . $_SESSION["kontonummer"] . "', '"
	. $_POST["betrag"] . "', '"
	. $_POST["kondition"] . "', '"
    . "angefragt" . "', '"
	. ""."'"
	.")";

	mysqli_query($con, $sql_new);
	mysqli_close($con);
	header("Location: kreditanfragen.php?f=2"); 
	exit;
} else {
	header("Location: kreditanfragen.php?f=1"); 
exit;
} 
?>