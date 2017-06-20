<?php
include_once "config.php";
$data = $_REQUEST;
if (isset($data['send'])){
	$dbLink = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName)
	or die(mysqli_connect_errno()." - ".mysqli_connect_error());
	mysqli_query($dbLink,"SET CHARACTER SET 'utf8'");

	$query = "INSERT INTO `people`(`fio`, `birthday`, `sex`) VALUES ('".$data['fio']."','".$data['birthday']."',".$data['sex'].")";
	mysqli_query($dbLink,$query)
		or die("Ошибка добавления в БД #".mysqli_errno($dbLink)." - ".mysqli_error($dbLink));
	header("Location: ./");
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>add new row</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src='js/jquery-3.2.1.min.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>
</head>
<body>
	<form action="add.php" class="form-horizontal">
		<div class="form-group">
			<label for="fio" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-lable has-error">
				ФИО: 
			</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input type="text" name="fio" class="form-control">
			</div>
		</div>
		<div class='form-group'>
			<label for="dr" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-lable has-error">
				День Рождения: 
			</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input type="date" name="birthday" class="form-control">
			</div>
		</div>
		<div class='form-group'>
			<label for="sex" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-lable has-error">
				ПОЛ:
			</label>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class='radio'>
					<lable>
						<input type="radio" name="sex" value="1">M
					</lable>
				</div>
				<div class="radio">
					<lable>
						<input type="radio" name="sex" value="0">Ж
					</lable>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-12">
				<input type="submit" name="send" value="Добавить" class='btn'>
			</div>
		</div>
	</form>
</body>
</html>
<?php
}
?>