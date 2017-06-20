<?php
include_once "config.php";

$dbLink = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName) or die(mysqli_connect_errno()." - ".mysqli_connect_error());
mysqli_query($dbLink,"SET CHARACTER SET 'utf8'");

$data = $_REQUEST;
if (isset($data['save'])){
	$query = "UPDATE `people` SET `fio`='".$data['fio']."',`birthday`='".$data['birthday']."',`sex`=".$data['sex']." WHERE `id`=".$data['id'];
	mysqli_query($dbLink,$query) or die("Ошибка редактирования записи #".mysqli_errno($dbLink)." - ".mysqli_error($dbLink));
	header("Location: ./");
}else{
	$query = "SELECT * FROM `people` WHERE `id`=".$data['id'];
	$result = mysqli_query($dbLink,$query) or die("Ошибка запроса #".mysqli_errno($dbLink)." - ".mysqli_error($dbLink));
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit row</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src='js/jquery-3.2.1.min.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>
</head>
<body>
<form action="edit.php" class="form-horizontal">
		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
	<div class='form-group'>
		<label for="fio" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-lable has-error">
			ФИО: 
		</label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<input type="text" name="fio" value="<?php echo $row['fio'];?>" class='form-control'>
		</div>
	</div>
	<div class='form-group'>
		<label for="fio" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-lable has-error">
			День Рождения: 
		</label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<input type="date" name="birthday" value="<?php echo $row['birthday'];?>" class='form-control'>
		</div>
	</div>
	<div class="form-group">
		<label for="sex" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-lable has-error">
			ПОЛ:
		</label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="radio">
				<label>
					<input type="radio" name="sex" value="1"
					<?php if($row['sex'] == 1){ echo "checked";}?>
					>М
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="sex" value="0"
					<?php if($row['sex'] == 0){ echo "checked";}?>
					>Ж
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-12">
			<input type="submit" name="save" value="Сохранить">
		</div>
	</div>
</form>
</body>
</html>
<?php
}
?>