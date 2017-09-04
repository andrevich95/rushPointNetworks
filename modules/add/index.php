<?php
if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
}
else{
	//Загрузим файл в дирректорию, если уже не имеется таких 
	if(isset($_FILES) and !empty($_FILES)){
	$uploaddir = './assets/kml';
	$uploadfile = $uploaddir .'/'. basename($_FILES['filename']['name']);

	$files = scandir($uploaddir);
	foreach ($files as $value) {
		if($value==basename($_FILES['filename']['name'])){
			echo '<pre>';
			echo 'Данный файл уже существует, переименуйте его и загрузите заново';
			echo '</pre>';
			$is_error=true;
		}
	}
	if(!isset($is_error) or $is_error!=true){
		echo '<pre>';
		if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
		    echo "Файл корректен и был успешно загружен.\n";
		} else {
		    echo "Возможная атака с помощью файловой загрузки!\n";
		}
		echo '</pre>';
	}
		
	}
	?>
	<div class="jumbotron">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label" for="file_input">Файл в формате kml:</label>
	    		<div class="">
	    			<input type="file" class="form-control" id="file_input" name="filename" accept="kml">
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
	//РАспарсим файл и внесем в базу данных по маршрутам
	if(isset($uploadfile)and(!isset($is_error) or $is_error!=true)){
		require './modules/kml_parser.php';
		$mykml=parse_kml($uploadfile);

		require_once './server/server_info.php';
		$conn = new mysqli($servername, $username, $password, $DB);
		if ($conn->connect_error) {
	    	die('Connection failed: ' . $conn->connect_error);
		}

		$sql = 'SELECT * FROM project';
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        if($row['name']==$mykml['project']){
		        	echo'<pre>Существует уже такой проект</pre>';
		        	$is_error=true;
		        } 
		    }
		} 

		if(!isset($is_error) or $is_error!=true){
		    $sql = 'INSERT INTO project (name,file) VALUES ("'.$mykml['project'].'","'.$uploadfile.'");';
		    $conn->query($sql);
		    $sql = 'SELECT id FROM project WHERE name="'.$mykml['project'].'";';
			$project_id = $conn->query($sql)->fetch_assoc()['id'];
			foreach ($mykml['points'] as $key => $value) {
				$sql = 'INSERT INTO route (name,project_id) VALUES ("'.$key.'","'.$project_id.'");';
				$conn->query($sql);
				$route_id = $conn->query('SELECT id FROM route WHERE name="'.$key.'" AND project_id="'.$project_id.'";')->fetch_assoc()['id'];
				foreach ($value as $k => $v) {
					$temp = MapLatLonToXY(deg2rad($v['latitude']),deg2rad($v['longitude']));
					if($temp['southhemi']==null or !isset($temp['southhemi'])){
						$temp['southhemi']=0;
					}
					
					if($v['clutch']===true){
						$sql = 'INSERT INTO point (id,route_id,longitude,latitude,altitude,x_coordinate,y_coordinate,zone,southhemi,clutch,name) VALUES ("'.$k.'","'.$route_id.'","'.$v['latitude'].'","'.$v['longitude'].'","'.$v["altitude"].'","'.$temp['x'].'","'.$temp['y'].'","'.$temp['zone'].'","'.$temp['southhemi'].'","'.$v['clutch'].'","'.$v['name'].'");';
					}
					else{
						$sql = 'INSERT INTO point (id,route_id,longitude,latitude,altitude,x_coordinate,y_coordinate,zone,southhemi) VALUES ("'.$k.'","'.$route_id.'","'.$v['latitude'].'","'.$v['longitude'].'","'.$v["altitude"].'","'.$temp['x'].'","'.$temp['y'].'","'.$temp['zone'].'","'.$temp['southhemi'].'");';
					}
					$conn->query($sql);
					
				}
			}

		    echo '<pre> Данные внесенные в базу<br>';
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
		$conn->close();
	}

}
?>