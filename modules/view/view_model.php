<?php
require './server/server_info.php';

$conn = new mysqlli($servername,$username,$password,$DB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	$query='SELECT * FROM clutch';
	$result = $conn->query($query);
	if ($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
			var_dump($row);
		}
	}
}

?>