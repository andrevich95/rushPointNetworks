<?php
if(isset($_FILES) and !empty($_FILES)){
	$uploaddir = './assets/kml/';
	$uploadfile = $uploaddir . basename($_FILES['filename']['name']);

	echo '<pre>';
	if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
	    echo "Файл корректен и был успешно загружен.\n";
	} else {
	    echo "Возможная атака с помощью файловой загрузки!\n";
	}
	echo '</pre>';
}
?>
<div class="jumbotron">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="control-label" for="file_input">Файл в формате kml:</label>
    		<div class="">
    			<input type="file" class="form-control" id="file_input" name="filename">
		    </div>
		</div>
		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<button type="submit" class="btn btn-default">Загрузить</button>
		    </div>
		</div>
	</form>
</div>
<?php
if(isset($uploadfile)){

require './modules/kml_parser.php';
echo '<pre>';
$mykml=parse_kml($uploadfile);
echo 'Проект: '.$mykml['project'];
foreach ($mykml['points'] as $key => $value) {
	echo '<br>Маршрут ===> <br>Имя:'.$key.'<br>';
	foreach ($value as $key => $value) {
		if($value['clutch']==true)
		{
			echo '<hr>Муфта ['.$value['name'].']<br>';
			print_r($value);
		}
	}
}
echo '</pre>';
}
?>