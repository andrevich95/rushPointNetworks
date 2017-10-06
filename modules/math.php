<?php
//Функция для расчета расстояния между двумя точками в декартовой ск
function distance($point1,$point2){
	return sqrt(pow($point2['x']-$point1['x'],2)+pow($point2['y']-$point1['y'],2));
}

function rush_point($d,$point1,$point2,$D){
	$result = array();
	//var_dump($point1);
	if($point1['x'] > $point2['x']){
		$result['x'] = ($point1['x']-$point2['x'])*($D-$d)/$D + $point2['x'];
	}
	else $result['x'] = $point2['x'] - ($point2['x']-$point1['x'])*($D-$d)/$D;
	if($point1['y'] > $point2['x']){
		$result['y'] = $point1['y'] - ($point1['y']-$point2['y'])*$d/$D;
	} 
	else $result['y'] = ($point2['y']-$point1['y'])*$d/$D+$point1['y'];
	
	return $result;
}

function get_rush_point($dist,$points){
	$previousValue = null;
	foreach ($points as $value) {
			if($previousValue!=0){
				$D = distance($previousValue,$value);
				if($dist-$D<0){
					return rush_point($dist,$previousValue,$value,$D);
				}
				else $dist-=$D;
			}
			else{
				$previousValue=$value;
			}
		
	}
}


?>