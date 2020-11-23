<?php include 'class.php' ?>

<?php 

$jenkel = $_POST['jenkel'];
$sks1 = $_POST['sks1'];
$sks2 = $_POST['sks2'];
$sks3 = $_POST['sks3'];
$sks4 = $_POST['sks4'];
$ipk1 = $_POST['ipk1'];
$ipk2 = $_POST['ipk2'];
$ipk3 = $_POST['ipk3'];
$ipk4 = $_POST['ipk4'];


$prob_l_terlambat = $data->prob_l_terlambat();
$prob_l_tepat = $data->prob_l_tepat();
$prob_p_tepat = $data->prob_p_tepat(); 
$prob_p_terlambat = $data->prob_p_terlambat(); 

$mean_sks_tepat = $data->mean_sks_tepat();
$mean_sks1_tepat = $mean_sks_tepat['mean_sks1_tepat'];
$mean_sks2_tepat = $mean_sks_tepat['mean_sks2_tepat'];
$mean_sks3_tepat = $mean_sks_tepat['mean_sks3_tepat'];
$mean_sks4_tepat = $mean_sks_tepat['mean_sks4_tepat'];

$mean_sks_terlambat = $data->mean_sks_terlambat();
$mean_sks1_terlambat = $mean_sks_terlambat['mean_sks1_terlambat'];
$mean_sks2_terlambat = $mean_sks_terlambat['mean_sks2_terlambat'];
$mean_sks3_terlambat = $mean_sks_terlambat['mean_sks3_terlambat'];
$mean_sks4_terlambat = $mean_sks_terlambat['mean_sks4_terlambat'];

$std_dev_sks1_tepat = $data->std_dev_sks1_tepat();
$std_dev_sks2_tepat = $data->std_dev_sks2_tepat();
$std_dev_sks3_tepat = $data->std_dev_sks3_tepat();
$std_dev_sks4_tepat = $data->std_dev_sks4_tepat();

$std_dev_sks1_terlambat = $data->std_dev_sks1_terlambat();
$std_dev_sks2_terlambat = $data->std_dev_sks2_terlambat();
$std_dev_sks3_terlambat = $data->std_dev_sks3_terlambat();
$std_dev_sks4_terlambat = $data->std_dev_sks4_terlambat();

$std_dev_ipk1_tepat = $data->std_dev_ipk1_tepat();
$std_dev_ipk2_tepat = $data->std_dev_ipk2_tepat();
$std_dev_ipk3_tepat = $data->std_dev_ipk3_tepat();
$std_dev_ipk4_tepat = $data->std_dev_ipk4_tepat();


$std_dev_ipk1_terlambat = $data->std_dev_ipk1_terlambat();
$std_dev_ipk2_terlambat = $data->std_dev_ipk2_terlambat();
$std_dev_ipk3_terlambat = $data->std_dev_ipk3_terlambat();
$std_dev_ipk4_terlambat = $data->std_dev_ipk4_terlambat();

$mean_ipk_tepat = $data->mean_ipk_tepat();
$mean_ipk1_tepat = $mean_ipk_tepat['mean_ipk1_tepat'];
$mean_ipk2_tepat = $mean_ipk_tepat['mean_ipk2_tepat'];
$mean_ipk3_tepat = $mean_ipk_tepat['mean_ipk3_tepat'];
$mean_ipk4_tepat = $mean_ipk_tepat['mean_ipk4_tepat'];

$mean_ipk_terlambat = $data->mean_ipk_terlambat();
$mean_ipk1_terlambat = $mean_ipk_terlambat['mean_ipk1_terlambat'];
$mean_ipk2_terlambat = $mean_ipk_terlambat['mean_ipk2_terlambat'];
$mean_ipk3_terlambat = $mean_ipk_terlambat['mean_ipk3_terlambat'];
$mean_ipk4_terlambat = $mean_ipk_terlambat['mean_ipk4_terlambat'];

//ipk
$phi = 3.14;
$e =2.7183;

if ($ipk1==''||$ipk2==''||$ipk3==''||$ipk4==''||$sks1==''||$sks2==''||$sks3==''||$sks4==''||$jenkel=='null') {
	echo "<div class='col-sm-3'>
	<div class='alert alert-danger'>Lengkapi Inputan</div>
	</div>
	";
}
else{
	$ipk1_tepat = (1/(sqrt(2*$phi*$std_dev_ipk1_tepat))) * pow($e, -(pow(($ipk1-$mean_ipk1_tepat),2) / (2*pow($std_dev_ipk1_tepat,2))));
	$ipk2_tepat = (1/(sqrt(2*$phi*$std_dev_ipk2_tepat))) * pow($e, -(pow(($ipk2-$mean_ipk2_tepat),2) / (2*pow($std_dev_ipk2_tepat,2))));
	$ipk3_tepat = (1/(sqrt(2*$phi*$std_dev_ipk3_tepat))) * pow($e, -(pow(($ipk3-$mean_ipk3_tepat),2) / (2*pow($std_dev_ipk3_tepat,2))));
	$ipk4_tepat = (1/(sqrt(2*$phi*$std_dev_ipk4_tepat))) * pow($e, -(pow(($ipk4-$mean_ipk4_tepat),2) / (2*pow($std_dev_ipk4_tepat,2))));

	$ipk1_terlambat = (1/(sqrt(2*$phi*$std_dev_ipk1_terlambat))) * pow($e, -(pow(($ipk1-$mean_ipk1_terlambat),2) / (2*pow($std_dev_ipk1_terlambat, 2))));
	$ipk2_terlambat = (1/(sqrt(2*$phi*$std_dev_ipk2_terlambat))) * pow($e, -(pow(($ipk2-$mean_ipk2_terlambat),2) / (2*pow($std_dev_ipk2_terlambat, 2))));
	$ipk3_terlambat = (1/(sqrt(2*$phi*$std_dev_ipk3_terlambat))) * pow($e, -(pow(($ipk3-$mean_ipk3_terlambat),2) / (2*pow($std_dev_ipk3_terlambat, 2))));
	$ipk4_terlambat = (1/(sqrt(2*$phi*$std_dev_ipk4_terlambat))) * pow($e, -(pow(($ipk4-$mean_ipk4_terlambat),2) / (2*pow($std_dev_ipk4_terlambat, 2))));



	$sks1_tepat = (1/(sqrt(2*$phi*$std_dev_sks1_tepat))) * pow($e, -(pow(($sks1-$mean_sks1_tepat), 2) / (2*pow($std_dev_sks1_tepat,2))));
	$sks2_tepat = (1/(sqrt(2*$phi*$std_dev_sks2_tepat))) * pow($e, -(pow(($sks2-$mean_sks2_tepat), 2) / (2*pow($std_dev_sks2_tepat,2))));
	$sks3_tepat = (1/(sqrt(2*$phi*$std_dev_sks3_tepat))) * pow($e, -(pow(($sks3-$mean_sks3_tepat), 2) / (2*pow($std_dev_sks3_tepat,2))));
	$sks4_tepat = (1/(sqrt(2*$phi*$std_dev_sks4_tepat))) * pow($e, -(pow(($sks4-$mean_sks4_tepat), 2) / (2*pow($std_dev_sks4_tepat,2))));

	$sks1_terlambat = (1/(sqrt(2*$phi*$std_dev_sks1_terlambat))) * pow($e, -(pow(($sks1-$mean_sks1_terlambat), 2) / (2*pow($std_dev_sks1_terlambat,2))));
	$sks2_terlambat = (1/(sqrt(2*$phi*$std_dev_sks2_terlambat))) * pow($e, -(pow(($sks2-$mean_sks2_terlambat), 2) / (2*pow($std_dev_sks2_terlambat,2))));
	$sks3_terlambat = (1/(sqrt(2*$phi*$std_dev_sks3_terlambat))) * pow($e, -(pow(($sks3-$mean_sks3_terlambat), 2) / (2*pow($std_dev_sks3_terlambat,2))));
	$sks4_terlambat = (1/(sqrt(2*$phi*$std_dev_sks4_terlambat))) * pow($e, -(pow(($sks4-$mean_sks4_terlambat), 2) / (2*pow($std_dev_sks4_terlambat,2))));

	if ($jenkel=='L') {
		$prediksi_tepat = $prob_l_tepat*$sks1_tepat*$sks2_tepat*$sks3_tepat*$sks4_tepat*$ipk1_tepat*$ipk2_tepat*$ipk3_tepat*$ipk4_tepat;
		$prediksi_terlambat = $prob_l_terlambat*$sks1_terlambat*$sks2_terlambat*$sks3_terlambat*$sks4_terlambat*$ipk1_terlambat*$ipk2_terlambat*$ipk3_terlambat*$ipk4_terlambat;		
	}
	else{
		$prediksi_tepat = $prob_p_tepat*$sks1_tepat*$sks2_tepat*$sks3_tepat*$sks4_tepat*$ipk1_tepat*$ipk2_tepat*$ipk3_tepat*$ipk4_tepat;
		$prediksi_terlambat = $prob_p_terlambat*$sks1_terlambat*$sks2_terlambat*$sks3_terlambat*$sks4_terlambat*$ipk1_terlambat*$ipk2_terlambat*$ipk3_terlambat*$ipk4_terlambat;
		
	}

	if ($prediksi_tepat>$prediksi_terlambat) {
		$hasil = "TEPAT";
	}
	else{
		$hasil = "TERLAMBAT";
	}

	echo "
	<div class='col-sm-3'>
	<label style='font-weight:bold;' class='alert'>Hasil Perhitungan</label>
	</div>
	<div class='col-sm-3'>
	<label class='alert alert-info'>Skor Tepat : $prediksi_tepat</label>
	</div>
	<div class='col-sm-3'>
	<label class='alert alert-info'>Skor Terlambat : $prediksi_terlambat</label>
	</div>
	<div class='col-sm-3'>
	<label class='alert alert-warning'>Kesimpulan : $hasil</label>
	</div>
	";
}

?>