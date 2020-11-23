<?php
include '../config/koneksi.php';

$tgl = $_POST['tgl'];
$namapasien = $_POST['namapasien'];
$namakk = $_POST['namakk'];
$jenkel = $_POST['jenkel'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$tempatlahir = $_POST['tempatlahir'];
$tgllahir = $_POST['tgllahir'];
$agama = $_POST['agama'];
$jpasien = $_POST['jpasien'];
$tujuan = $_POST['tujuan'];
$dokter = $_POST['dokterx'];
$no_jaminan=$_POST['no_jaminan'];




$insert_pasien = mysqli_query($koneksi,"INSERT INTO pasien(tanggal_daftar,nama_pasien,jenis_kelamin,nama_kk,pekerjaan,alamat,tempat_lahir,tanggal_lahir,agama) VALUES('$tgl','$namapasien','$jenkel','$namakk ','$pekerjaan','$alamat','$tempatlahir','$tgllahir','$agama')");

$select = mysqli_query($koneksi,"SELECT no_rm FROM pasien WHERE nama_pasien='$namapasien' AND nama_kk='$namakk'");
$dt=$select->fetch_assoc();
$norm=$dt['no_rm'];


if ($insert_pasien) {
        
    $cek = mysqli_query($koneksi,"SELECT no_antrian FROM pasien_berobat WHERE tujuan ='$tujuan' AND `tanggal_berobat` = CURDATE()  ORDER BY `no_antrian` DESC LIMIT 1");
$antrian=$cek->fetch_assoc();

$no = $antrian['no_antrian']+1;	    
    
	$insert_berobat = mysqli_query($koneksi,"INSERT INTO pasien_berobat(no_rm,tanggal_berobat,nama_pasien,jenis_kelamin,tempat_lahir,tanggal_lahir,jenis_pasien,no_jaminan,tujuan,no_antrian,dokter) VALUES('$norm','$tgl','$namapasien','$jenkel','$tempatlahir','$tgllahir','$jpasien','$no_jaminan','$tujuan',$no,'$dokter')");
	header("location:../index.php?halaman=baru&pesan=berhasil&no=$no&tujuan=$tujuan");
}
else{
	header("location:../index.php?halaman=baru&pesan=gagal");
}
?>
