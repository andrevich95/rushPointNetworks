<?php
if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
}
require_once './server/server_info.php';

$conn = new mysqli($servername,$username,$password,$DB);
$sql = 'SELECT * FROM project';
$result = $conn->query($sql);
$project = array();
if($result->num_rows>0){
	while ($row = $result->fetch_assoc()) {
		$project[$row['id']] =$row['name'];
	}
}

?>

<form class="form-horizontal" action="" method="post" id="calculate_form">
		<div class="form-group">
			<label for="project">Проект</label>
			<select name="project" class="form-control" id="project">
			<option disabled selected>Выберите проект</option>
			<?php 
				foreach ($project as $key => $value) {
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
			?>
			 </select>
			 <label for="route">Маршрут</label>
			<select name="route" class="form-control" id="route">
				
			</select>
			<label for="clutch1">Муфта</label>
			<select name="clutch1" class="form-control" id="clutch1">
			 </select>
			 <label for="clutch2">Муфта</label>
			<select name="clutch2" class="form-control" id="clutch2">
			 </select>
			 <label for="dist"></label>
			 <input type="text" name="dist" class="form-control" placeholder="Расстояние до точки порыва">
			 <br>
			 <button type="submit" class="btn btn-primary">Расчитать</button> 
			</div>
</form>
			<div id="map">
				
			</div>
			
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA60595FC2puYFMkABHsbo6dQN8VCZdDFM&callback=initMap"></script>