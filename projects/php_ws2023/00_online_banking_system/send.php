<?php
session_start(); 
include('password.inc.php');	


$con = mysqli_connect("localhost", "root", $ps, "online_banking");

if (isset($_POST["kontonummer"]) && $_POST["kontonummer"] != "" && $_POST["betrag"] != "") {

	$sql_konto = "select status from Konto";
    $sql_konto .= ' where kontonummer = "'. intval($_SESSION["kontonummer"]) .'"';
    $res_konto = mysqli_query($con, $sql_konto);
    $dsatz_konto = intval(mysqli_fetch_assoc($res_konto)["status"]);
	if ($dsatz_konto < intval($_POST["betrag"])){
		header("Location: geld_send.php?f=1");
		exit;
	}

	$sql_konto = "select status from Konto";
    $sql_konto .= ' where kontonummer = "'. intval($_POST["kontonummer"]) .'"';
    $res_konto = mysqli_query($con, $sql_konto);
	$num_konto = mysqli_num_rows($res_konto);
	if ($num_konto == 0) {
		header("Location: geld_send.php?f=2");
		exit;
	}

	$sql_new_1 = "insert into Transaktionen (kontonummer_s, betrag, kontonummer_b, kommentar) values "
	. "('" 
	. $_SESSION["kontonummer"] . "', '-"
	. $_POST["betrag"] . "', '"
	. $_POST["kontonummer"] . "', '"
	. $_POST["kommentar"] ."'"
	.")";

	$sql_new_2 = "insert into Transaktionen (kontonummer_s, betrag, kontonummer_b, kommentar) values "
	. "('" 
	. $_POST["kontonummer"] . "', '"
	. $_POST["betrag"] . "', '"
	. $_SESSION["kontonummer"] . "', '"
	. $_POST["kommentar"] ."'"
	.")";
	$_SESSION["status"] = intval($_SESSION["status"]) - intval($_POST["betrag"]);

	$sql_update = "update Konto set"
	. "status = " . "'"
	. $_SESSION["status"] . "'"
	. "where kontonummer = '". intval($_SESSION["kontonummer"]) .'"';

	mysqli_query($con, $sql_new_1);
	mysqli_query($con, $sql_new_2);
	mysqli_query($con, $sql_update);

} else {
	header("Location: geld_send.php?f=4"); 
exit;
} 
?>