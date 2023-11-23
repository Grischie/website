<?php
include("sc_shop.inc.php");
echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="get">';
if (isset($_GET['abtname'])) {
    $url = $_GET['abtname'];

    // Find the index of the selected table in the $abtname array
    $j = array_search($url, $abtname);

    if ($j !== false) {
        echo '<table border="1">';
        $count_sp = count($aname[$j]);

        for ($i = 0; $i < $count_sp; $i++) {
            echo '<tr>';
            echo '<td>' . $aname[$j][$i] . '</td>';
            echo '<td>' . $artnr[$j][$i] . '</td>';
            echo '<td>' . $preis[$j][$i] . '€</td>';
            echo '<td><input type="text" name="anzahl" /></td>';
            echo '</tr>';
        }

        echo '</table>';
		echo '<input type="submit" value="Abschicken" />';
    	echo '</form>';
	} else {
        echo 'Table not found for the specified abtname.';
    }
} else {
    echo 'No abtname specified in the URL.';
}
?>
