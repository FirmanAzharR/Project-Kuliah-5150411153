<?php
include '../../config/koneksi.php';
  //text

 $kode_motor   = $_POST['kode_motor'];
 $nama_motor   = $_POST['nama_motor'];
 $merk   = $_POST['merk'];
 $mesin   = $_POST['tipe_mesin'];
 $silinder   = $_POST['susunan_silinder'];
 $volume   = $_POST['volume_silinder'];
 $sistem_bb   = $_POST['sistem_bahanbakar'];
 $transmisi   = $_POST['transmisi'];
 $harga   = $_POST['harga'];

$fileupload ='';

if (isset($_FILES['fileupload'])) {
  //img
  $fileupload      = $_FILES['fileupload']['tmp_name'];
  $ImageName       = $_FILES['fileupload']['name'];
  $ImageType       = $_FILES['fileupload']['type'];

}


if(!empty($fileupload)){
  //data with image
  //cek foto and remove
  $query = mysqli_query($koneksi,"SELECT gambar FROM data_motor WHERE kode_motor='$kode_motor'");
  $data_lama = $query->fetch_assoc();
  $foto_lama = $data_lama['gambar'];

  if(file_exists("../img/$foto_lama")){
    unlink("../img/$foto_lama");
  }

  //update data and image
  include 'koneksi.php';

  $temp = "../img/";
  if (!file_exists($temp))
    mkdir($temp);

  if (!empty($fileupload)){
    $acak           = rand(11111111, 99999999);
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);

    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

    $update = mysqli_query($koneksi,"UPDATE data_motor SET nama_motor='$nama_motor',gambar='$NewImageName' WHERE kode_motor='$kode_motor'");
    $update2 = mysqli_query($koneksi,"UPDATE spesifikasi_motor SET merk_motor='$merk',tipe_mesin='$mesin',silinder='$silinder',volume='$volume',sistem_bb='$sistem_bb',transmisi='$transmisi',harga='$harga' WHERE kode_motor='$kode_motor'");

    if($update&$update2){
      echo "berhasil";
    }else{
      echo "gagal";
    }

  }



}else{

////query Update without image
    $update = mysqli_query($koneksi,"UPDATE data_motor SET nama_motor='$nama_motor' WHERE kode_motor='$kode_motor'");
    $update2 = mysqli_query($koneksi,"UPDATE spesifikasi_motor SET merk_motor='$merk',tipe_mesin='$mesin',silinder='$silinder',volume='$volume',sistem_bb='$sistem_bb',transmisi='$transmisi',harga='$harga' WHERE kode_motor='$kode_motor'");

    if($update2){
      echo "berhasil";
    }else{
      echo "gagal";
    }

}

?>