<?php
include 'geo_converter.php';
include 'math.php';

function parse_kml($file){
	libxml_use_internal_errors(true);
	$myXMLData =file_get_contents($file); 
	$xml = simplexml_load_string($myXMLData);

	if ($xml === false) {
    	echo "Failed loading XML: ";
    	foreach(libxml_get_errors() as $error) {
        	echo "<br>", $error->message;
    	}
	}
	$points = array();
	$routes = array();

	foreach ($xml->Document->Folder->Placemark as $row) {
		if($row->Point->coordinates){
			$a = strval($row->name);
			$b = explode(',', $row->Point->coordinates);
			$points[$a]= array('longitude' => $b[0], 'latitude' => $b[1], 'altitude' => $b[2]);
		}
		if($row->LineString->coordinates){
			$a = strval($row->name);
			$b = explode(' ', $row->LineString->coordinates);
			foreach ($b as $key => $value) {
				$str = explode(',', $value);
				if(isset($str[0])&&isset($str[1])&&isset($str[2])){
					$temp = MapLatLonToXY(deg2rad($str[1]),deg2rad($str[0]));
					$b[$key] = array('longitude' => $str[0], 'latitude' => $str[1], 'altitude' => $str[2], 'x' => $temp['x'], 'y' => $temp['y'],  'zone' => $temp['zone'], 'southhemi' => $temp['southhemi'], 'clutch' => false);
				}
				else unset($b[$key]);
			}
			$routes[$a]= $b;
		}
	}

	$result = array(strval($xml->Document->name),$points,$routes);
	
	$za = find_clutch($points,$routes);
	foreach ($za as $key => $value) {
		foreach ($value as $v) {
			if($v['clutch']==true)
			print_r($v);
			echo '<hr>';

		}
	}
	//$ttt = get_rush_point(3000,$routes);

	//var_dump(MapXYToLatLon ($ttt['x'], $ttt['y'], 31, false));
}
function find_clutch($clutches,$points){
	foreach ($clutches as $clutch) {
		foreach ($points as $value) {
			$previousValue = null;
			foreach ($value as $point) {
				if($previousValue!=0){
					$temp = MapLatLonToXY(deg2rad($clutch['latitude']),deg2rad($clutch['longitude']));
					$my_temp = array('longitude' => $clutch['longitude'], 'latitude' => $clutch['latitude'], 'altitude' => $clutch['altitude'], 'x' => $temp['x'], 'y' => $temp['y'],  'zone' => $temp['zone'], 'southhemi' => $temp['southhemi'], 'clutch' => true);
					if(($clutch['longitude']>$previousValue['longitude']&&$clutch['longitude']<$point['longitude'])&&($clutch['latitude']>$previousValue['latitude']&&$clutch['latitude']<$point['latitude']) )
						{
							array_push($points,$my_temp);
						}
				}
				else{
					$previousValue=$point;
				}
			}
		}
	}
	return $points;
}
parse_kml('1.kml')
?>