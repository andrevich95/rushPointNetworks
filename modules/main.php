<?php require_once './modules/includes/header.php';?>
<div class="container">
<?php
	if(isset($_GET['mod']))
	{
		$choice = $_GET['mod'];
		switch($choice){
		case 'add':
			include './modules/add/index.php';
			break;
		case 'view':
			include './modules/view/index.php';
			break;
		case 'calculate':
			include './modules/calculate/index.php';
			break;
		case 'edit':
			include './modules/edit/index.php';
			break;
		case 'logout':
			unset($_SESSION['user_id']);
			session_destroy();
			header('Location: index.php');
			break;
		default:
			include './modules/main/index.php';
			break;		
		}
	}
?>
</div>

<?php require_once './modules/includes/footer.php';?>