<?php
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
	
		<form class="form-horizontal" action="./modules/show.php" method="post" id="view_form">
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
			<label for="clutch">Муфта</label>
			<select name="clutch" class="form-control" id="clutch">
			 </select>
			 <br>
			 <button type="submit" class="btn btn-primary">Отобразить на карте</button> 
			</div>
			<div id="map">
				
			</div>
		</form>
