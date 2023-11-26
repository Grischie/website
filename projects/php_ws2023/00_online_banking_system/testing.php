<?php
session_start(); 

include('password.inc.php');	

//Connection zur Dantenbank herstellen
$con = mysqli_connect("localhost", "root", $ps, "online_banking");



//Neue Kontonummer generieren 
$sql_max = "select max(kontonummer) from User";
$res_max = mysqli_query($con, $sql_max);
$max_kn = mysqli_fetch_assoc($res_max);	
$num = mysqli_num_rows($res_max);
echo var_dump($max_kn) ;
echo "<br />";

$max_kn = intval($max_kn["max(kontonummer)"]);
echo $max_kn;
echo "<br />";

$new_kn = $max_kn + 1;
echo "<br />";

echo $max_kn;
echo "<br />";
echo "<br />";
echo $num
?>