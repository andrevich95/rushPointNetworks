$(document).ready(function(){
		$('#project').on('change',function(){
			$.post('run.php',{project_id:$(this).val()},getroute);
		});
		$('#route').on('change',function(){
			$.post('run.php',{route_id:$(this).val(),project_id:$('#project').val()},getclutch);
		});
	});
	function getroute(data){
		$('#route').html(data);
		$('#clutch').html('');
	}
	function getclutch(data){
		$('#clutch').html(data);
	}s