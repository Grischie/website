<?php
include("sc_shop.inc.php");

$html = "";
foreach ($abtname as $abname) {
    $html .= '<a href="sc_shop_b.php?abtname=' . $abname .'">' . $abname . '</a> <br />';
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php echo $html ?>
</body>
</html>

