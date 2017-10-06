<?php
/*
В процессе пересчета понадобятся также следующие параметры:

Большая полуось эллипсоида WGS84: a = 6378137.0 м
Малая полуось эллипсоида WGS84: b = 6356752.3142 м
Масштабный коэфициент = 0.9996
*/
define("A", 6378137.0);
define("B", 6356752.3142);
define("UTMScaleFactor",0.9996);

/*
Вход:широту точки в радианах
Выход:эллипсоидальное расстояние точки от экватора, в метрах.

Из источника: Hoffmann-Wellenhof, B., Lichtenegger, H., and Collins, J., GPS: Theory and Practice, 3rd ed.  New York: Springer-Verlag Wien, 1994.
*/
function ArcLengthOfMeridian ($phi){
	$n = (A-B)/(A+B); 
    $alpha = ((A+B) / 2.0) * (1.0 + (pow ($n, 2.0) / 4.0) + (pow ($n, 4.0) / 64.0)); 
    $beta = (-3.0 * $n / 2.0) + (9.0 * pow ($n, 3.0) / 16.0) + (-3.0 * pow ($n, 5.0) / 32.0); 
    $gamma = (15.0 * pow ($n, 2.0) / 16.0) + (-15.0 * pow ($n, 4.0) / 32.0);
    $delta = (-35.0 * pow ($n, 3.0) / 48.0) + (105.0 * pow ($n, 5.0) / 256.0);    
    $epsilon = (315.0 * pow ($n, 4.0) / 512.0);    
   	return $alpha * ($phi + ($beta * sin (2.0 * $phi)) + ($gamma * sin (4.0 * $phi)) + ($delta * sin (6.0 * $phi)) + ($epsilon * sin (8.0 * $phi)));
}

/*
Определяет центральный меридиан для данной зоны UTM.
Целое значение, обозначающее зону UTM
Выход:Центральный меридиан для данной зоны UTM, в радианах или ноль
*/
function UTMCentralMeridian ($zone){
	return deg2rad(-183.0 + ($zone * 6.0));
}

/*
Вычисляет координаты широты для использования в преобразовании поперечного Mercator координат к эллипсоидальной координате.
Вход:координата северного UTM, в метрах
Выход:широта точки в радианах
*/
function FootpointLatitude ($y){
    $n = (A-B)/(A+B); 
    $alpha = ((A+B) / 2.0) * (1.0 + (pow ($n, 2.0) / 4.0) + (pow ($n, 4.0) / 64.0));
    $beta = (3.0 * $n / 2.0) + (-27.0 * pow ($n, 3.0) / 32.0) + (269.0 * pow ($n, 5.0) / 512.0);
    $gamma = (21.0 * pow ($n, 2.0) / 16.0) + (-55.0 * pow ($n, 4.0) / 32.0);    
    $delta = (151.0 * pow ($n, 3.0) / 96.0) + (-417.0 * pow ($n, 5.0) / 128.0);
    $epsilon = (1097.0 * pow ($n, 4.0) / 512.0);
    $y_ = $y / $alpha; 
    return $y_ + ($beta * sin (2.0 * $y_)) + ($gamma * sin (4.0 * $y_)) + ($delta * sin (6.0 * $y_)) + ($epsilon * sin (8.0 * $y_));
}
/*
Преобразует пару широты / долготы в координаты x и y в проекции поперечного Меркатора. Обратите внимание, что поперечный Меркатор не совпадает с UTM; Для преобразования между ними необходим масштабный коэффициент.
Вход:Широта точки, в радианах. Долгота точки, в радианах. Долгота центрального меридиана для использования в радианах.
Выход:2-элементный массив, содержащий координаты x и y вычисленной точки.
*/
function MapLatLonToXY ($phi, $lambda){
	if($phi<0)
		$southhemi = true;
	else
		$southhemi = false;
	$zone = floor (($lambda + 180.0) / 6) + 1;
	$lambda0=UTMCentralMeridian ($zone);

	$ep2 = (pow (A, 2.0) - pow (B, 2.0)) / pow (B, 2.0);
	$nu2 = $ep2 * pow (cos ($phi), 2.0);
	$N = pow (A, 2.0) / (B * sqrt (1 + $nu2));
	$t = tan ($phi);
	$tmp = pow($t,6)- pow ($t, 6.0);
	$l = $lambda - $lambda0;
    $l3coef = 1.0 - pow($t,2) + $nu2;
    $l4coef = 5.0 - pow($t,2) + 9 * $nu2 + 4.0 * pow($nu2,2);
    $l5coef = 5.0 - 18.0 * pow($t,2) + pow($t,4) + 14.0 * $nu2 - 58.0 * pow($t,2) * $nu2;
	$l6coef = 61.0 - 58.0 * pow($t,2) + pow($t,4) + 270.0 * $nu2 - 330.0 * pow($t,2) * $nu2;
	$l7coef = 61.0 - 479.0 * pow($t,2) + 179.0 * pow($t,4) - pow($t,6);
	$l8coef = 1385.0 - 3111.0 * pow($t,2) + 543.0 * pow($t,4) - pow($t,6);
    $x = $N * cos ($phi) * $l + ($N / 6.0 * pow (cos ($phi), 3.0) * $l3coef * pow ($l, 3.0)) + ($N / 120.0 * pow (cos ($phi), 5.0) * $l5coef * pow ($l, 5.0)) + ($N / 5040.0 * pow (cos ($phi), 7.0) * $l7coef * pow ($l, 7.0));
	$y = ArcLengthOfMeridian($phi) + ($t / 2.0 * $N * pow (cos ($phi), 2.0) * pow ($l, 2.0)) + ($t / 24.0 * $N * pow (cos ($phi), 4.0) * $l4coef * pow ($l, 4.0)) + ($t / 720.0 * $N * pow (cos ($phi), 6.0) * $l6coef * pow ($l, 6.0)) + ($t / 40320.0 * $N * pow (cos ($phi), 8.0) * $l8coef * pow ($l, 8.0));

	$x= $x * UTMScaleFactor + 500000.0;
    $y = $y * UTMScaleFactor;
    if ($y < 0.0)
    	$y = $y + 10000000.0;

    return array('x' => $x, 'y' => $y, 'zone' => $zone, 'southhemi' => $southhemi);
}
/*
 Преобразует координаты x и y в проекции поперечного Меркатора на пару широты / долготы. Обратите внимание, что поперечный Меркатор не совпадает с UTM; Для преобразования между ними необходим масштабный коэффициент.
 Вход: восток точки, в метрах, северный пункт, в метрах. Долгота центрального меридиана для использования в радианах
 Выход: 2-элемент, содержащий широту и долготу в радианах.
*/
function MapXYToLatLon ($x, $y, $zone, $southhemi=false){
	$lambda0 = UTMCentralMeridian ($zone);
	$x = ($x - 500000.0)/UTMScaleFactor;
	if ($southhemi) $y = $y - 10000000.0;        
    $y = $y / UTMScaleFactor;

	$phif = FootpointLatitude ($y);
	$ep2 = (pow (A, 2.0) - pow (B, 2.0)) / pow (B, 2.0);
    $cf = cos ($phif);
    $nuf2 = $ep2 * pow ($cf, 2.0);
    $Nf = pow (A, 2.0) / (B * sqrt (1 + $nuf2));
    $tf = tan ($phif);
    $x1frac = 1.0 / ($Nf * $cf);
    $x2frac = $tf / (2.0 * pow($Nf,2));
    $x3frac = 1.0 / (6.0 * pow($Nf,3)*$cf);
    $x4frac = $tf / (24.0 * pow($Nf,4));
    $x5frac = 1.0 / (120.0 * pow($Nf,5) * $cf);
    $x6frac = $tf / (720.0 * pow($Nf,6));
    $x7frac = 1.0 / (5040.0 * pow($Nf,7) * $cf);
    $x8frac = $tf / (40320.0 * pow($Nf,8));
    $x2poly = -1.0 - $nuf2;
    $x3poly = -1.0 - 2 * pow($tf,2) - $nuf2;
    $x4poly = 5.0 + 3.0 * pow($tf,2) + 6.0 * $nuf2 - 6.0 * pow($tf,2) * $nuf2 - 3.0 * ($nuf2 * $nuf2) - 9.0 * pow($tf,2) * pow($nuf2,2);
    $x5poly = 5.0 + 28.0 * pow($tf,2) + 24.0 * pow($tf,4) + 6.0 * $nuf2 + 8.0 * pow($tf,2) * $nuf2;
    $x6poly = -61.0 - 90.0 * pow($tf,2) - 45.0 * pow($tf,4) - 107.0 * $nuf2 + 162.0 * pow($tf,2) * $nuf2;
    $x7poly = -61.0 - 662.0 * pow($tf,2) - 1320.0 * pow($tf,4) - 720.0 * (pow($tf,4) * pow($tf,2));
    $x8poly = 1385.0 + 3633.0 * pow($tf,2) + 4095.0 * pow($tf,4) + 1575 * (pow($tf,4) * pow($tf,2));
    /* Расчитываем широту */
    $latitude = $phif + $x2frac * $x2poly * pow($x,2) + $x4frac * $x4poly * pow ($x, 4.0) + $x6frac * $x6poly * pow ($x, 6.0) + $x8frac * $x8poly * pow ($x, 8.0);
	/* Расчитываем долготу */
    $longitude= $lambda0 + $x1frac * $x + $x3frac * $x3poly * pow ($x, 3.0) + $x5frac * $x5poly * pow ($x, 5.0) + $x7frac * $x7poly * pow ($x, 7.0);
            
    return array('latitude' => rad2deg($latitude), 'longitude' => rad2deg($longitude) );
}

?>