<?php
function pruefen($s) {
    $maske1 = "/\.jpeg$/";
    $maske2 = "/\.jpg$/";

    if (preg_match($maske1, $s)) {
        echo "Yes";
    } else if (preg_match($maske2, $s)) {
        echo "Yes";
    } else {
        echo "No";
    }
}

$path = "user/simon.jpeg";
echo "$path<br/>";
pruefen($path);
?>
