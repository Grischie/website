<?php
session_start(); 
include('password.inc.php');	

$con = mysqli_connect("localhost", "root", $ps, "online_banking");
$sql_max = "select max(id) from Kredite";
$res_max = mysqli_query($con, $sql_max);
$id = mysqli_fetch_assoc($res_max);	
$id = intval($id["max(id)"]);
$id = $id + 1;

if (isset($_POST["betrag"]) && $_POST["betrag"] != "" && $_POST["kondition"] != "") {

	$sql_konto = "select status from Konto";
    $sql_konto .= ' where kontonummer = "'. intval($_SESSION["kontonummer"]) .'"';
    $res_konto = mysqli_query($con, $sql_konto);
    $dsatz_konto = intval(mysqli_fetch_assoc($res_konto)["status"]);

	if ($dsatz_konto < intval($_POST["betrag"])) {
		header("Location: kredit_ausschreiben.php?f=1");
		exit;
	}

	$sql_new = "insert into Kredite (id, kreditanbieter, nachfragender, betrag, kondition, status, kommentar) values "
	. "('" 
	. $id . "', '"
	. $_SESSION["kontonummer"] . "', '"
    . "0" . "', '"
	. $_POST["betrag"] . "', '"
	. $_POST["kondition"] . "', '"
    . "ausgeschrieben" . "', '"
	. ""."'"
	.")";

	mysqli_query($con, $sql_new);
	mysqli_close($con);
	header("Location: kredit_ausschreiben.php?f=3"); 
	exit;
} else {
	header("Location: kredit_ausschreiben.php?f=2"); 
exit;
} 
?>