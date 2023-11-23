<?php
	$artikel = [22.5, 12.3, 5.2];
	$i = 0;
	$summe = 0;
	foreach ($artikel as $a) {
		$i = $i + 1;
		echo "Artikel " . $i . ": " . $a . " Euro<br/>";
		$summe = $summe + $a;
		}
	echo "<br/>Nettosumme: " . $summe . " Euro<br/>";
	echo "Umsatzsteuer: 19%<br/>";
	echo "Bruttosumme: " . $summe * 1.19 . " Euro<br/>";
?>
