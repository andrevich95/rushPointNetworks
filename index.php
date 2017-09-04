<!DOCTYPE html>
<html>
<head>
	<title>Программа поиска</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<script src="./assets/js/main.js"></script>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	require './modules/login.php';
}
else{
	require './modules/main.php';
}
?>
</body>
</html>
