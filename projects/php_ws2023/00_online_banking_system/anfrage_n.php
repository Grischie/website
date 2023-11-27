<?php
session_start(); 
include('password.inc.php');	



if (isset($_POST["auswahl"])){

	$sql = "update Kredite set status = 'angefragt" 
    ."' where id = '"
    . $_POST["auswahl"]
    ."'";

	mysqli_query($con, $sql_new);
	mysqli_close($con);
	header("Location: kreditangebote.php?f=2"); 
	exit;
} else {
	header("Location: kreditangebote.php?f=1"); 
exit;
} 
?>