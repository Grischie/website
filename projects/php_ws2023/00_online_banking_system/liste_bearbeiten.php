<?php
session_start(); 
include('password.inc.php');	

$con = mysqli_connect("localhost", "root", $ps, "online_banking");
$sql = "select nachfragender, betrag from Kredite";
$sql .= ' where name = "'. $_POST["auswahl"] .'"';
$res = mysqli_query($con, $sql);
$dsatz = mysqli_fetch_assoc($res);
if (isset($_POST["auswahl"])){
    if($_POST["action"]=="Annehmen"){
        echo '<form action="send_1.php" method="post" >
		Konto: <br />
		<input type="number" name="kontonummer" size="20" value='.$dsatz["nachfragender"] .'/><br /><br />
		Betrag: <br />
		<input type="number" name="betrag"size="20" /><br /><br />
        Zweck: <br />
		<input type="text" name="kommentar"size="60" value='.$_POST["grund"] .' /><br /><br />
		<input type="submit" value="überweisen" />
	    </form>';

        $sql_annehmen_1 = "update Kredite set status = 'angenommen" 
        ."' where kontonummer = '"
        . $_POST["auswahl"]
        ."'";
        $sql_annehmen_2 = "update Kredite set kommentar = '" .$_POST["grund"]
        ."' where kontonummer = '"
        . $_POST["auswahl"] 
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