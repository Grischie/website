<?php

function rechne($zahl1, $zahl2, &$summe, &$produkt){
	$summe = $zahl1 + $zahl2;
	$produkt = $zahl1 * $zahl2;
}

$zahl1 = 5;
$zahl2 = 7;
$summe = 0;
$produkt = 0;

echo "$zahl1, $zahl2, $summe, $produkt<br/><br/>";
rechne($zahl1, $zahl2, $summe, $produkt);
echo "Die Summe von $zahl1 und $zahl2 beträgt $summe<br/>Das Produkt von $zahl1 und $zahl2 beträgt $produkt";
?>

