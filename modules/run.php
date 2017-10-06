<?php
require_once '../server/server_info.php';

$conn = new mysqli($servername,$username,$password,$DB);
if(isset($_POST['project_id']) and !isset($_POST['route_id'])){
	$project = $_POST['project_id'];
	$sql = 'SELECT * FROM route WHERE project_id="'.$project.'";';
	$result = $conn->query($sql);
	$route = array();
	if($result->num_rows>0){
		while ($row = $result->fetch_assoc()) {
			$route [$row['id']] =$row['name'];
			
		}
	}
	$str ='<option disabled selected>Выберите маршрут</option>';
	foreach ($route as $key => $value) {
		$str .='<option value="'.$key.'">'.$value.'</option>';
	}
	echo $str;
}
if(isset($_POST['route_id'])){
	$project = $_POST['project_id'];
	$route = $_POST['route_id'];
	$sql = 'SELECT point.id,point.name FROM point LEFT JOIN route ON point.route_id=route.id WHERE route.project_id="'.$project.'" AND point.clutch="1" AND point.route_id="'.$route.'";';
	$result = $conn->query($sql);
	$clutch = array();
	if($result->num_rows>0){
		while ($row = $result->fetch_assoc()) {
			$clutch[$row['id']] =$row['name'];	
		}
	}
	$str ='<option disabled selected>Выберите муфту</option>';
	foreach ($clutch as $key => $value) {
		$str .='<option value="'.$key.'">'.$value.'</option>';
	}
	echo $str;
}
?>