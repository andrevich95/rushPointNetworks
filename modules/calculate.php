<?php
require_once '../server/server_info.php';
require_once 'geo_converter.php';
require_once 'math.php';

if(isset($_POST)){
	if($_POST['clutch1']>$_POST['clutch2']){
		$id_p1=$_POST['clutch1'];$id_p2=$_POST['clutch2'];
		$order = 'ASC';
	}
	else{
		$id_p1=$_POST['clutch2'];$id_p2=$_POST['clutch1'];
		$order = 'DESC';
	}
	$conn = new mysqli($servername,$username,$password,$DB);
	$sql = 'SELECT * FROM point WHERE route_id="'.$_POST['route'].'" AND (id BETWEEN '.$id_p2.' AND '.$id_p1.') ORDER BY id '.$order.';';
	$result = $conn->query($sql);
	$points = array();
	if($result->num_rows>0){
		while ($row = $result->fetch_assoc()) {
			array_push($points, array('x' => $row['x_coordinate'],'y' => $row['y_coordinate']));
			if(!isset($zone))$zone = $row['zone'];	
		}
	}
	$pr = get_rush_point((int)$_POST['dist'],$points);
	$pr = MapXYToLatLon ($pr['x'], $pr['y'], $zone, $southhemi=false);
	echo '<script>
      function initMap() {
        var uluru = {lat: '.$pr['latitude'].', lng: '.$pr['longitude'].'};
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 1,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>';

}
?>