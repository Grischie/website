<?php
session_start(); 
include('password.inc.php');	

$con = mysqli_connect("localhost", "root", $ps, "online_banking");

if (isset($_POST["auswahl"])){
    if($_POST["action"]=="Annehmen"){
        $sql_annehmen_1 = "update Kredite set status = 'angenommen" 
        ."' where kontonummer = '"
        . $_POST["aushwal"]
        ."'";
        $sql_annehmen_2 = "update Kredite set kommentar = '" .$_POST["grund"]
        ."' where kontonummer = '"
        . $_POST["aushwal"] 
        ."'";
    }
    
	mysqli_close($con);
	header("Location: kreditanfragen_liste.php"); 
	exit;
} else {
	header("Location: kreditanfragen_liste.php?f=1"); 
exit;
} 
?>