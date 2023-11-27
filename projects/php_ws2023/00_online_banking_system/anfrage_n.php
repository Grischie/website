<?php
session_start(); 
include('password.inc.php');	



if (isset($_POST["auswahl"])){
    $con = mysqli_connect("localhost", "root", $ps, "online_banking");
	
    $sql_1 = "update Kredite set nachfragender = '".$_SESSION["kontonummer"] 
    ."' where id = '"
    . $_POST["auswahl"]
    ."'";

    $sql_2 = "update Kredite set status = 'angefragt" 
    ."' where id = '"
    . $_POST["auswahl"]
    ."'";
    
	mysqli_query($con, $sql_1);
    mysqli_query($con, $sql_2);
	mysqli_close($con);
	header("Location: kreditangebote.php?f=2"); 
	exit;
} else {
	header("Location: kreditangebote.php?f=1"); 
exit;
} 
?>