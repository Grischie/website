<?php
session_start(); 
if (isset($_POST["name"]) && $_POST["name"] == "Hans" && $_POST["passwort"] == "geheim") { 
	$_SESSION["name"] = "Hans"; 
	$_SESSION["login"] = "ok";
	header("Location: willkommen.php");
	exit;
} else {
	header("Location: start.php?f=1"); 
exit;
} 
?> 
