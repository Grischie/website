<?php
$text = array("Kilian", "Mader", "Sarah", "Springer", "Johannes", "Krause");
$max = count($text) - 1;
$zufallszahl = rand(0, $max);
echo $text[$zufallszahl];
?>
