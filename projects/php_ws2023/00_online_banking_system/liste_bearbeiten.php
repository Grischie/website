<?php
session_start(); 
include('password.inc.php');	
$con = mysqli_connect("localhost", "root", $ps, "online_banking");
$sql = "select nachfragender, betrag from Kredite";
$sql .= " where id = '". $_POST["auswahl"] ."'";
$res = mysqli_query($con, $sql);
$dsatz = mysqli_fetch_assoc($res);

if (isset($_POST["auswahl"])){
    if($_POST["action"]=="Annehmen"){

        $sql_konto = "select status from Konto";
        $sql_konto .= ' where kontonummer = "'. intval($_SESSION["kontonummer"]) .'"';
        $res_konto = mysqli_query($con, $sql_konto);
        $dsatz_konto = intval(mysqli_fetch_assoc($res_konto)["status"]);
        if ($dsatz_konto < intval($dsatz["betrag"])){
            header("Location: kreditanfragen_liste.php?f=2");
            exit;
        }
        $sql_new_1 = "insert into Transaktionen (kontonummer_s, betrag, kontonummer_b, kommentar) values "
        . "('" 
        . $_SESSION["kontonummer"] . "', '-"
        . $dsatz["betrag"] . "', '"
        . $dsatz["nachfragender"] . "', '"
        . "Kredit" ."'"
        .")";
    
        $sql_new_2 = "insert into Transaktionen (kontonummer_s, betrag, kontonummer_b, kommentar) values "
        . "('" 
        . $dsatz["nachfragender"] . "', '"
        . $dsatz["betrag"] . "', '"
        . $_SESSION["kontonummer"] . "', '"
        . "Kredit" ."'"
        .")";
        $_SESSION["status"] = intval($_SESSION["status"]) - intval($dsatz["betrag"]);
    
        $sql_update_1= "update Konto set status = '" 
        . intval($_SESSION["status"]) - intval($dsatz["betrag"]) 
        ."' where kontonummer = '"
        . intval($_SESSION["kontonummer"]) 
        ."'";
        $sql_update_2 = "update Konto set status = '" 
        . intval($dsatz_ziel) + intval($dsatz["betrag"]) 
        ."' where kontonummer = '"
        . intval($dsatz["nachfragender"]) 
        ."'";

        $sql_annehmen_1 = "update Kredite set status = 'angenommen" 
        ."' where id = '"
        . $_POST["auswahl"]
        ."'";
        $sql_annehmen_2 = "update Kredite set kommentar = '" .$_POST["grund"]
        ."' where id = '"
        . $_POST["auswahl"] 
        ."'";

        mysqli_query($con, $sql_new_1);
        mysqli_query($con, $sql_new_2);
        mysqli_query($con, $sql_update_1);
        mysqli_query($con, $sql_update_2);
        mysqli_query($con, $sql_annehmen_1);
        mysqli_query($con, $sql_annehmen_2);

    } elseif($_POST["action"]=="Ablehnen") {

        $sql_annehmen_1 = "update Kredite set status = 'abgelehnt" 
        ."' where id = '"
        . $_POST["auswahl"]
        ."'";
        $sql_annehmen_2 = "update Kredite set kommentar = '" .$_POST["grund"]
        ."' where id = '"
        . $_POST["auswahl"] 
        ."'";
        mysqli_query($con, $sql_annehmen_1);
        mysqli_query($con, $sql_annehmen_2);
    }
    
	mysqli_close($con);
	header("Location: kreditanfragen_liste.php?f=3"); 
	exit;
} else {
	header("Location: kreditanfragen_liste.php?f=1"); 
exit;
} 
?>