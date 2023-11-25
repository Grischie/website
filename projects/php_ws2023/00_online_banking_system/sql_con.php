<?php
//Password für die Datenbank importierens
include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");

$username = "test_user1";
//SQL Statement herstellen
//$sql = "select name, password from User";
//$sql .= " where name = " . $username;
$sql = "select * from User";
//SQL Query senden
$res = mysqli_query($con, $sql);

//Datensatz holen
while($dsatz = mysqli_fetch_assoc($res)){
    echo $dsatz["name"];
    echo $dsatz["mail"];
}	
?>
