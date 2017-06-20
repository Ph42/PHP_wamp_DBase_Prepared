<?php
 include_once 'config.php';

 $dbLink = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName)
	or die(mysqli_connect_errno()." - ".mysqli_connect_error());
	mysqli_query($dbLink,"SET CHARACTER SET 'utf8'");
$data = $_REQUEST;
$query = "DELETE FROM `people` WHERE `id`=".$data['id'];
mysqli_query($dbLink,$query);
header("Location: ./");
?>