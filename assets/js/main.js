$(document).ready(function(){
		$('#project').on('change',function(){

			$.post('./modules/run.php',{project_id:$(this).val()},getroute);
		});
		$('#route').on('change',function(){
			$.post('./modules/run.php',{route_id:$(this).val(),project_id:$('#project').val()},getclutch);
		});
		/*$('#view_form').on('submit',function(e){
			e.preventDefault();
			//$(this).find('button[type="submit"]').attr('disabled','disabled');
			var formData = new FormData($(this)[0]);
			$.ajax({
				url : './modules/show.php',
				type : 'POST',
				processData: false,
            	contentType: false,
            	cache: false,
				data : formData,
				success : function(data){
					$('#map').html(data);
					//$(this).find('button[type="submit"]').removeAttr('disabled');
				}
			}).always(function(){$(this).find('button[type="submit"]').removeAttr('disabled');});
		});*/
		$('#calculate_form').on('submit',function(e){
			e.preventDefault();
			//$(this).find('button[type="submit"]').attr('disabled','disabled');
			var formData = new FormData($(this)[0]);
			$.ajax({
				url : './modules/calculate.php',
				type : 'POST',
				processData: false,
            	contentType: false,
            	cache: false,
				data : formData,
				success : function(data){
					$('#map').html(data);
					//$(this).find('button[type="submit"]').removeAttr('disabled');
				}
			}).always(function(){$(this).find('button[type="submit"]').removeAttr('disabled');});
		});

	});
	function getroute(data){
		$('#route').html(data);
		$('#clutch').html('');
	}
	function getclutch(data){
		$('#clutch').html(data);
		$('#clutch1').html(data);
		$('#clutch2').html(data);
	}
	function showmap(data){
		alert(data);
	}