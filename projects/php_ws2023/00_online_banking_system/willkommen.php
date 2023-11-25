<?php
	include_once("check_head.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Willkommen im geschützten Bereich</title>
</head>
<body>
	<?php
		echo "<h1>Hallo {$_SESSION['name']}</h1>";
	?>
	<p>Hier stehen viele weitere interessante Informationen</p>
	<p><a href="logout.php">Ausloggen</p>
</body>
</html>
<?php
	include_once("check_foot.php");
?>
