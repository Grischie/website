<?php
session_start(); 

include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");



//Neue Kontonummer generieren 
$sql_max = "select max(kontonummer) from User";
$res_max = mysqli_query($con, $sql_max);
$max_kn = mysqli_fetch_assoc($res_max);	
echo $max_kn;
$max_kn = $max_kn["Kontonummer"];
echo $max_kn;
$new_kn = $max_kn + 1;
echo $max_kn;
?>