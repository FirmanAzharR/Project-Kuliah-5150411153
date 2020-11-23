<?php 

include 'config/koneksi.php';

$motor=$_POST['pilih'];  

$jml_pilih = count($motor);

$alt = mysqli_query($koneksi,"SELECT count(kode_alt) as x FROM tabel_alternatif");
$cek_alt=$alt->fetch_assoc();

if ($cek_alt>0) {
	$del_alt = mysqli_query($koneksi,"DELETE FROM tabel_normalisasi_alternatif");
	$del_alt = mysqli_query($koneksi,"DELETE FROM tabel_nilai_alternatif");
	$del_alt = mysqli_query($koneksi,"DELETE FROM tabel_alternatif");
}

// echo $motor;

for ($i=0; $i<$jml_pilih; $i++) { 
	$motor[$i];
	$select = mysqli_query($koneksi,"SELECT*FROM `data_motor` INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor` WHERE data_motor.kode_motor='$motor[$i]'");
	
	$insert_alternatif = mysqli_query($koneksi,"INSERT INTO tabel_alternatif(kode_alt) VALUES('$motor[$i]')");	
	
}



$alternatif = mysqli_query($koneksi,"SELECT*FROM tabel_alternatif INNER JOIN `data_motor` ON tabel_alternatif.kode_alt=data_motor.kode_motor INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor`;");

foreach ($alternatif as $key => $value) {

	$namamtr = $value['nama_motor'];

	$mrk = $value['merk_motor'];
	$qry1 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$mrk'");
	$merk = $qry1->fetch_assoc();
	$mrx = $merk['nilai'];

	$tipe_mesin = $value['tipe_mesin'];
	$qry2 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$tipe_mesin'");
	$mesin = $qry2->fetch_assoc();
	$msn = $mesin['nilai'];

	$silinder = $value['silinder'];
	$qry3 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$silinder'");
	$ss = $qry3->fetch_assoc();
	$susunan = $ss['nilai'];

	$vol = $value['volume'];
	$qry4 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$vol'");
	$volume = $qry4->fetch_assoc();
	$cc = $volume['nilai'];

	$sbb = $value['sistem_bb'];
	$qry5 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$sbb'");
	$sistem_bb = $qry5->fetch_assoc();
	$bb = $sistem_bb['nilai'];

	$transmisi = $value['transmisi'];
	$qry6 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$transmisi'");
	$trans = $qry6->fetch_assoc();
	$trs = $trans['nilai'];


	$harga1 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK22'");
	$hrg1 = $harga1->fetch_assoc();
	$harga2 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK23'");
	$hrg2 = $harga2->fetch_assoc();
	$harga3 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK24'");
	$hrg3 = $harga3->fetch_assoc();
	$harga4 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK25'");
	$hrg4 = $harga4->fetch_assoc();
	$harga5 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK26'");
	$hrg5 = $harga5->fetch_assoc();

	if ($value['harga']>=0&$value['harga']<=$hrg1['crips']) {
		$hrg = $hrg1['nilai'];
	}
	if ($value['harga']>$hrg1['crips']&$value['harga']<=$hrg2['crips']) {
		$hrg=$hrg2['nilai'];
	}
	if ($value['harga']>$hrg2['crips']&$value['harga']<=$hrg3['crips']) {
		$hrg=$hrg3['nilai'];
	}
	if ($value['harga']>$hrg3['crips']&$value['harga']<=$hrg4['crips']) {
		$hrg=$hrg4['nilai'];
	}
	if ($value['harga']>$hrg5['crips']) {
		$hrg=$hrg5['nilai'];
	}


	$insert_nilai = mysqli_query($koneksi,"INSERT INTO tabel_nilai_alternatif(nama,merk,mesin,silinder,volume,sbb,transmisi,harga) VALUES('$namamtr','$mrx','$msn','$susunan','$cc','$bb','$trs','$hrg')");
}


//SAW
//normalisasi benefit
function normalisasi_benefit($max,$nilai){
	$benefit = $nilai/$max;
	return $benefit;
}

//normalisasi cost
function normalisasi_cost($min,$nilai){
	$cost = $min/$nilai;
	return $cost;
}

//BOBOT
$q1 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K1'");
$kriteria_mesin = $q1->fetch_assoc();
$bobot_mesin = $kriteria_mesin['bobot'];

$q2 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K2'");
$kriteria_silinder = $q2->fetch_assoc();
$bobot_silinder = $kriteria_silinder['bobot'];

$q3 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K3'");
$kriteria_merk = $q3->fetch_assoc();
$bobot_merk = $kriteria_merk['bobot'];

$q4 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K4'");
$kriteria_volume = $q4->fetch_assoc();
$bobot_volume = $kriteria_volume['bobot'];

$q5 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K5'");
$kriteria_bb = $q5->fetch_assoc();
$bobot_bb = $kriteria_bb['bobot'];

$q6 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K6'");
$kriteria_trans = $q6->fetch_assoc();
$bobot_trans = $kriteria_trans['bobot'];

$q7 = mysqli_query($koneksi,"SELECT bobot FROM data_kriteria WHERE kode_kriteria='K7'");
$kriteria_hrg = $q7->fetch_assoc();
$bobot_hrg = $kriteria_hrg['bobot'];


$nilai_alter = mysqli_query($koneksi,"SELECT*FROM tabel_nilai_alternatif");

$qry_min_max = mysqli_query($koneksi,"SELECT MAX(`merk`) AS max_merk, MAX(`mesin`) AS max_mesin, MAX(`silinder`) AS max_silinder,MAX(volume) AS max_volume, MAX(`sbb`) AS max_sbb, MAX(`transmisi`) AS max_transmisi, MIN(harga) AS min_harga FROM tabel_nilai_alternatif");
$min_max=$qry_min_max->fetch_assoc();

foreach ($nilai_alter as $key => $value) {
	
	echo $merk = normalisasi_benefit($min_max['max_merk'],$value['merk']); 
	echo "<br>";
	echo $mesin = normalisasi_benefit($min_max['max_mesin'],$value['mesin']);
	echo "<br>";
	echo $silinder = normalisasi_benefit($min_max['max_silinder'],$value['silinder']);
	echo "<br>";
	echo $volume = normalisasi_benefit($min_max['max_volume'],$value['volume']);
	echo "<br>";
	echo $sbb_x = normalisasi_benefit($min_max['max_sbb'],$value['sbb']);
	echo "<br>";
	echo $transmisi = normalisasi_benefit($min_max['max_transmisi'],$value['transmisi']);
	echo "<br>";
	echo $harga = normalisasi_cost($min_max['min_harga'],$value['harga']);
	echo "<br>";
	echo $jumlah = ($merk*$bobot_merk)+($mesin*$bobot_mesin)+($silinder*$bobot_silinder)+($volume*$bobot_volume)+($sbb_x*$bobot_bb)+($transmisi*$bobot_trans)+($harga*$bobot_hrg);

	$insert_normalisasi = mysqli_query($koneksi,"INSERT INTO tabel_normalisasi_alternatif(nama,merk,mesin,silinder,volume,sbb,transmisi,harga,jumlah) VALUES('".$value['nama']."','$merk','$mesin','$silinder','$volume','$sbb_x','$transmisi','$harga','$jumlah')");
}

?>