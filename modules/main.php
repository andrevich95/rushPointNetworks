<?php require './modules/includes/header.php';?>
<div class="jumbotron">	
<?php
	if(isset($_GET['mod']))
	{
		$choice = $_GET['mod'];
		switch($choice){
		case 'add':
			include './modules/add/index.php';
			break;
		case 'add':
			include './modules/articles/index.php';
			break;
		case 'gallery':
			include './modules/gallery/index.php';
			break;
		case 'contacts':
			include './modules/contacts/index.php';
			break;
		default:
			include './modules/main/index.php';
			break;		
		}
	}
?>
</div>
<?php require './modules/includes/footer.php';?>