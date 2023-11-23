<?php
include('password.inc.php');
$con = mysqli_connect("localhost", "root", $ps, "online_banking");
$res = mysqli_query($con, "select * from User");

$dsatz = mysqli_fetch_assoc($res);

echo $dsatz['name'];

?>
