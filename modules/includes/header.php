<nav class="navbar navbar-default">
	<div class="container-fluid">
    	<div class="navbar-header">
    		<a class="navbar-brand" href="#">Rush</a>
    	</div>
    	<ul class="nav navbar-nav">
      		<li class="active"><a href="#"><?php echo $_SESSION['user_id'];?></a></li>
      		<li><a href="index.php?mod=add">Загрузить файл</a></li>
      		<li><a href="index.php?mod=view">Показать муфты</a></li>
          <li><a href="index.php?mod=edit">Отобразить проекты</a></li>
      		<li><a href="index.php?mod=calculate">Расчитать точку порыва</a></li>
          <li><a href="index.php?mod=logout">Выйти</a></li>
    	</ul>
  	</div>
</nav>