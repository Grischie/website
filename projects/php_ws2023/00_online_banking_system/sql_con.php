<?php
//Password für die Datenbank importierens
include('password.inc.php');

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");

//SQL Statement herstellen
$sql = "select name, password form User where name = " . $_POST["name"];

//SQL Query senden
$res = mysqli_query($con, $sql);

//Anzahl der SQL ergebnisse 
$num = mysqli_num_rows($res);

//Wenn keine Ergebnisse vorhanden ist 
if ($num==0) echo "Keine passenden Datensätze gefunden";


while ($dsatz = mysqli_fetch_assoc($res));
echo $dsatz;
?>
