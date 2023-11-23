<?php
	date_default_timezone_set("Europe/Berlin");
	$uhrzeit = date("H");
	$lfarbe = "black";
	if ($uhrzeit < 5 || $uhrzeit > 20) {
		$gruss = "Gute Nacht";
		$bfarbe = "black";
		$lfarbe = "white";
	} elseif ($uhrzeit < 11) {
		$gruss = "Guten Morgen";
		$bfarbe = "yellow";
	} elseif ($uhrzeit < 15) {
		$gruss = "Guten Mittag";
		$bfrabe = "green";
	} elseif ($uhrzeit < 18) {
		$gruss = "Guten Nachmittag";
		$bfrabe = "organge";
	} else {
		$gruss = "Guten Abend";
		$bfrabe = "red";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Unterschiedliche Begrüßung
	</title>
	<style>
		body {
			background-color: <?php echo $bfrabe ?>;
			color: <?php echo $lfrabe ?>;
		}
	</style>
</head>
<body>
	<?php
		echo $gruss;
	?>
</body>
</html>
