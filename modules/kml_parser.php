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
	else{
		$project = strval($xml->Document->name);
		foreach ($xml->Document->Folder as $folder) {
			$folder_name = $folder->name;
			switch ($folder_name) {
				case 'Clutch':
					$cluthes = run_clutch_Folders($folder);
					break;
				case 'Path':
					$path = run_path_Folders($folder);
					break;
				default:
					continue;
			}
		}

	}
	return array('project' => str_replace('.kml','',$project), 'points' => set_clutches($cluthes,$path));
}

function run_clutch_Folders($folder){
	$result = array(); 
	foreach ($folder->Folder as $value) {
		$cluthes=array();
		foreach ($value->Placemark as $clutch) {
			$coordinates = explode(',', strval($clutch->Point->coordinates));
			$cluthes[strval($clutch->name)]=array('longitude' => floatval($coordinates[0]), 'latitude' => floatval($coordinates[1]), 'altitude' => floatval($coordinates[2]));
		}
		$result[strval($value->name)]=$cluthes;
	}
	return $result;
}

function run_path_Folders($folder){
	$result = array(); 
	foreach ($folder->Folder as $value) {
		foreach ($value->Placemark as $points) {
			$point = explode(' ', strval($points->LineString->coordinates));
			unset($point[count($point)-1]);
			foreach ($point as $key => $coordinates) {
				$temp = explode(',', $coordinates);
				$coordinates = array('longitude' => floatval($temp[0]), 'latitude' => floatval($temp[1]), 'altitude' => floatval($temp[2]), 'clutch' => false, 'name' => NULL);
				$point[$key]=$coordinates;
			}
		}
		$result[strval($value->name)]=$point;
	}
	return $result;
}

function set_clutches($cluthes,$points){
	foreach ($cluthes as $key => $value) {
		foreach ($value as $key_clutch => $value_clutch) {
			foreach ($points[$key] as $key_point => $value_point) {
				if (abs($value_clutch['longitude']-$value_point['longitude'])<0.001 and abs($value_clutch['latitude']-$value_point['latitude'])<0.001) {
					$value_point['clutch']=true;
					$value_point['name']=$key_clutch;
					$points[$key][$key_point]=$value_point;
				}
			}
		}
	}
	return $points;
}
/*

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
				if(isset($str[0]) and isset($str[1]) and isset($str[2])){
					$temp = MapLatLonToXY(deg2rad($str[1]),deg2rad($str[0]));
					$b[$key] = array('longitude' => $str[0], 'latitude' => $str[1], 'altitude' => $str[2], 'x' => $temp['x'], 'y' => $temp['y'],  'zone' => $temp['zone'], 'southhemi' => $temp['southhemi']);
				}
				else unset($b[$key]);
			}
			$routes[$a]= $b;
		}
	}

	$result = array(strval($xml->Document->name),$points,$routes);

	$za = find_clutch($points,$routes);
	foreach ($za as $key => $value) {
		echo "key: ".$key.'<hr>';
		foreach ($value as $v) {
			if($v['clutch']==true)
			{
				print_r($v);
				echo '<br>';
			}
		}
		# code...
	}
	//$ttt = get_rush_point(3000,$routes);

	//var_dump(MapXYToLatLon ($ttt['x'], $ttt['y'], 31, false));
}*/

function form_kml($project,$routes,$points,$clutches){
	$result = '<?xml version="1.0" encoding="UTF-8"?><kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom"><Document><name>'.$project.'</name><visibility>0</visibility><open>1</open>';
	$result.='<Folder><name>Clutch</name><open>1</open></Folder>';
	foreach ($clutches as $key => $value) {
		$result.='<name>Clutch</name>
		<open>1</open>
		<Placemark>
			<name>'.$key.'</name>
			<LookAt>
				<longitude>'.$value['longitude'].'</longitude>
				<latitude>'.$value['latitude'].'</latitude>
				<altitude>'.$value['altitude'].'</altitude>
				<heading>0.2043624092642297</heading>
				<tilt>19.09311250056211</tilt>
				<range>256.1687726573217</range>
				<gx:altitudeMode>relativeToSeaFloor</gx:altitudeMode>
			</LookAt>
			<Point>
				<gx:drawOrder>1</gx:drawOrder>
				<coordinates>'.$value['longitude'].','.$value['latitude'].','.$value['altitude'].'</coordinates>
			</Point>
		</Placemark>';
	}


}






/*
function find_clutch($clutches,$points){
	foreach ($clutches as $clutch) {
		foreach ($points as $value) {
			$previousValue = null;
			foreach ($value as $point) {
				if($previousValue!=null){
					$temp = MapLatLonToXY(deg2rad($clutch['latitude']),deg2rad($clutch['longitude']));
					$my_temp = array('longitude' => $clutch['longitude'], 'latitude' => $clutch['latitude'], 'altitude' => $clutch['altitude'], 'x' => $temp['x'], 'y' => $temp['y'],  'zone' => $temp['zone'], 'southhemi' => $temp['southhemi'], 'clutch' => true);
					$st1 = $previousValue['longitude']>$point['longitude'] and $point['longitude']<$clutch['longitude'] and $previousValue['longitude']>$clutch['longitude'];
					$st2 = $previousValue['longitude']<$point['longitude'] and $point['longitude']>$clutch['longitude'] and $previousValue['longitude']<$clutch['longitude'];
					$st3 = $previousValue['latitude']>$point['latitude'] and $point['latitude']<$clutch['latitude'] and $previousValue['latitude']>$clutch['latitude'];
					$st4 = $previousValue['latitude']<$point['latitude'] and $point['latitude']>$clutch['latitude'] and $previousValue['latitude']<$clutch['latitude'];
					$var = $st1 and $st3;
					if(($st1 and $st3) or ($st1 and $st4) or ($st2 and $st3) or ($st2 and $st4)){
						echo 'sfdsfd'.array_search($previousValue, $value).'<br>';
						array_splice( $value, array_search($previousValue, $value), 0, $my_temp);
						print_r($my_temp);
						echo '<br>';
						$previousValue=$my_temp;
					}
					else $previousValue=$point;
				}
				else{
					$previousValue=$point;
				}
			}
		}
	}
	echo '<hr><hr>';
	return $points;
}
*/

?>