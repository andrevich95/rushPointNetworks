<?php
require_once './server/server_info.php';
$conn = new mysqli($servername, $username, $password, $DB);
$sql = 'SELECT * FROM project';
$projects = $conn->query($sql);
while ($project = $projects->fetch_assoc()) {
	echo '<div class="jumbotron"><p>'.$project['name'].'</p><button class="btn btn-success pull-right">Изменить</button></div>';
}


$conn->close();
?>