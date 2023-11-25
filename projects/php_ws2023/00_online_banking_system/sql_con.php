<?php
//Password für die Datenbank importierens
include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");

$username = "test_user1";
//SQL Statement herstellen
$sql = "select name, password form User";
$sql .= " where name = " . $username;

//SQL Query senden
$res = mysqli_query($con, $sql);

//Anzahl der SQL ergebnisse 
$num = mysqli_num_rows($res);

//Datensatz holen
$dsatz = mysqli_fetch_assoc($res);	
echo $dsatz;
?>
