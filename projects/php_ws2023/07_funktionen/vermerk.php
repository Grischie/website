<?php

function vermerk($vorname, $nachname, $abteilung) {
    return "<tr><td>Programmteil von $vorname $nachname, Abteilung $abteilung</td><td>E-Mail: $vorname.$nachname@$abteilung.phpdevel.de</td></tr>";
}

?>

<table border="1">
    <?php echo vermerk("kilian", "mader", "top"); ?>
    <?php echo vermerk("simon", "grischek", "ptp"); ?>
</table>
