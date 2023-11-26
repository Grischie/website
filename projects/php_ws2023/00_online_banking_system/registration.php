<?php
session_start(); 

//Prüfen ob die eingegebnen Daten korrekt sind
if (isset($_POST["vorname"]) && $_POST["vorname"] != "" && isset($_POST["name"]) && $_POST["name"] != "" &&  isset($_POST["mail"]) && $_POST["mail"] != "" &&  isset($_POST["geburtstag"]) && $_POST["geburtstag"] != "" &&  isset($_POST["kapital"]) && $_POST["kapital"] != "" &&  isset($_POST["passwort_1"]) && $_POST["passwort_1"] != "" &&  isset($_POST["passwort_2"])) {

    //Password für die Datenbank importierens
    include('password.inc.php');	

    //Connection zur Dantenbank herstellen
    $con = mysqli_connect("localhost", "root", $ps, "online_banking");
    $sql_user = "select name from User";
    $sql_user .= ' where name = "'. $_POST["name"] .'"';
    $res_user = mysqli_query($con, $sql_user);
    $num_user = mysqli_num_rows($res_user);

    //Prüfe nach Fehler
    if ($num_user == 1){
        header("Location: start_registration.php?f=1"); 
        exit;
    }
	if (isset($_POST["rechte_0"]) == isset($_POST["rechte_1"])){
        header("Location: start_registration.php?f=2"); 
        exit;
    }
    if ($_POST["passwort_1"] != $_POST["passwort_2"]){
        header("Location: start_registration.php?f=3"); 
        exit;
    }

    //Datenbankanbindung 

    //Neue Kontonummer generieren 
    $sql_max = "select max(kontonummer) from User";
    $res_max = mysqli_query($con, $sql_max);
    $max_kn = mysqli_fetch_assoc($res_max);	
    $max_kn = $max_kn["max(kontonummer)"];
    $new_kn = $max_kn + 1;

    //Art des Konto definieren
    $rechte = 0;
    if ($_POST["rechte_0"] ==  true) {
        $rechte = 0;
    } elseif($_POST["rechte_1"] ==  true) {
        $rechte = 1;
    }

    //Neue Daten anbinden in User Datenbank
    
    $sql_new = "insert into User (name, vorname, mail, password, geburtstag, kontonummer, rechte) values "
        . "('" 
        . $_POST["name"] . "', '"
        . $_POST["vorname"] . "', '"
        . $_POST["mail"] . "', '"
        . $_POST["passwort_1"] . "', '"
        . $_POST["geburtstag"] . "', '"
        . $new_kn . "', '"
        . $rechte . "'"
        .")";
    mysqli_query($con, $sql_new);
   
    //Neue Daten anbinden in Konto Datenbank
    $sql_new = "insert into Konto (kontonummer, status, verlauf) values "
        . "('" 
        . $new_kn . "', '"
        . $_POST["kapital"] . "', '"
        . "" ."'"
        .")";
    mysqli_query($con, $sql_new);
  
    $_SESSION["name"] = $_POST["name"]; 
	$_SESSION["login"] = "ok";
    $_SESSION["rechte"] = $rechte;
	if($dsatz["rechte"] == 0){
		header("Location: willkommen_kreditanbietende.php");
	} else {
		header("Location: willkommen_nachfragende.php");
	}
	exit;
} else {
	header("Location: start_registration.php?f=4"); 
    exit;
} 
?> 
