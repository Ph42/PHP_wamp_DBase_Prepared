<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src='js/jquery-3.2.1.min.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>
</head>
<body>
<div class='container'>
	<?php
	include_once "config.php";

	function antiHack($var)
	{
		if(is_array($var))
		{
			$new = null;
			foreach ($var as $k => $v)
			{
				$new[$k] = antiHack($v);
				return $new; 
			}
			return htmlspecialchars(strip_tags($var), ENT_QUOTES)
			}
	}
	$data = antiHack($_REQUEST)

	$dbLink = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName)
		or die(mysqli_connect_errno()." - ".mysqli_connect_error());
		mysqli_query($dbLink,"SET CHARACTER SET 'utf8'");
	$query = "SELECT * FROM `people` WHERE 1";
	$result = mysqli_query($dbLink,$query);
	?>
	<div class='row'>
		<a href="add.php">Добавить новую запись</a>
		<table width="100%" class="table table-striped">
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td><a href='edit.php?id=".$row['id']."'>".$row['fio']."</a></td>";
					echo "<td>".$row['birthday']."</td>";
					echo "<td>".$row['sex']."</td>";
					echo "<td><a href='./delete.php?id=".$row['id']."'>del</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</div>
</body>
</html>
