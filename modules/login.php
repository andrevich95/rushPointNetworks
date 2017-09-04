<?php
if(!isset($_SESSION['user_id']) and isset($_POST['user'])){

	$_SESSION['user_id']=$_POST['user'];
	header('Location: index.php');
}
?>
<div class="container">
<div class="jumbotron">
	<form action="" class="form-horizontal" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2" for="user">Пользователь:</label>
    		<div class="col-sm-10">
    			<input type="text" class="form-control" id="user" name="user" placeholder="Введите имя пользователя">
		    </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Пароль:</label>
    		<div class="col-sm-10">
    			<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Введите пароль">
		    </div>
		</div>
		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<button type="submit" class="btn btn-default">Вход</button>
		    </div>
		</div>
		
	</form>
</div>
</div>