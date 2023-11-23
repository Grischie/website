<?php
if (isset($_COOKIE["name"])) {
    echo "Cookies wurden gesetzt<br />\n";
    echo "Name: " . htmlspecialchars($_COOKIE["name"]) . "<br />\n";
} else {
    echo "keine Cookies gesetzt";
}
?>

