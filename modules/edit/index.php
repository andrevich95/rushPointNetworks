<?php
require_once './server/server_info.php';
$conn = new mysqli($servername, $username, $password, $DB);
$sql = 'SELECT * FROM project';
$projects = $conn->query($sql);
while ($project = $projects->fetch_assoc()) {
	echo '<div class="jumbotron"><p>'.$project['name'].'</p><div class="pull-right"><button class="btn btn-success">Изменить</button><button class="btn btn-danger pull-right">Удалить</button></div></div>';
}


$conn->close();
?>