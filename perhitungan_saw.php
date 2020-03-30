<?php
//Nilai
//Penghasilan
//Tanggungan
//Jumlah Prestasi

$bobot=array('0.2','0.3','0.4','0.1');
$jenis=array('benefit','cost','benefit','benefit');

$alternatif[0] = array('90','2000000','2','1');
$alternatif[1] = array('80','7000000','2','1');
$alternatif[2] = array('70','4000000','4','2');
$alternatif[3] = array('60','4000000','3','2');
$alternatif[4] = array('80','1000000','3','6');

echo "<table border='1px'>";
for ($i=0;$i<5;$i++) { 
	echo "<tr>";
	for ($j=0;$j<4;$j++) { 
		echo "<td>";
		echo $alternatif[$i][$j];
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";


echo "<table border='1px'>";
for ($i=0;$i<5;$i++) { 
	echo "<tr>";
	for ($j=0;$j<4;$j++) { 
		echo "<td>";
		if($jenis[$j]=='benefit'){
			echo $alternatif[$i][$j]/maxmin($jenis[$j],$j,$alternatif);
		}else{
			echo maxmin($jenis[$j],$j,$alternatif)/$alternatif[$i][$j];
		}
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";


echo "<table border='1px'>";
for ($i=0;$i<5;$i++) {
	$jumlah=0; 
	echo "<tr>";
	for ($j=0;$j<4;$j++) { 
		echo "<td>";
		if($jenis[$j]=='benefit'){
			echo ($alternatif[$i][$j]/maxmin($jenis[$j],$j,$alternatif))*$bobot[$j];
			$jumlah+=($alternatif[$i][$j]/maxmin($jenis[$j],$j,$alternatif))*$bobot[$j];
		}else{
			echo (maxmin($jenis[$j],$j,$alternatif)/$alternatif[$i][$j])*$bobot[$j];
			$jumlah+=(maxmin($jenis[$j],$j,$alternatif)/$alternatif[$i][$j])*$bobot[$j];
		}
		echo "</td>";
	}
	echo "<td>";
	echo $jumlah;
	echo "<td>";
	echo "</tr>";
}
echo "</table>";

//echo maxmin("benefit","3",$alternatif);

function maxmin($jenis,$index,$alternatif){
	$max="";
	$min="";
	$hasil="";

	foreach ($alternatif as $key => $value) {
		if($jenis=='benefit'){
			if($max==''){
				$max=$value[$index];
			}else{
				if($max<=$value[$index]){
					$max=$value[$index];
				}
			}
			$hasil=$max;
		}else{
			if($min==''){
				$min=$value[$index];
			}else{
				if($min>=$value[$index]){
					$min=$value[$index];
				}
			}
			$hasil=$min;
		}
	}

	return $hasil;

}

?>


