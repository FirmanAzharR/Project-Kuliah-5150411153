<?php
  include 'koneksi.php';

  $temp = "../img/";
  if (!file_exists($temp))
    mkdir($temp);

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

  //img
  $fileupload      = $_FILES['fileupload']['tmp_name'];
  $ImageName       = $_FILES['fileupload']['name'];
  $ImageType       = $_FILES['fileupload']['type'];

  if (!empty($fileupload)){
    $acak           = rand(11111111, 99999999);
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);

    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

    $query = "INSERT into data_motor(kode_motor,nama_motor,gambar) VALUES (?, ?, ?)";
    $x = $db1->prepare($query);
    $x->bind_param("sss", $kode_motor, $nama_motor, $NewImageName);
    $x->execute();


    include '../../config/koneksi.php';

    $insert_spek = mysqli_query($koneksi,"INSERT INTO spesifikasi_motor(kode_motor,merk_motor,tipe_mesin,silinder,volume,sistem_bb,transmisi,harga) VALUES('$kode_motor','$merk','$mesin','$silinder','$volume','$sistem_bb','$transmisi','$harga')"); 

    if ($insert_spek) {
      echo 'berhasil';
    }else{
      echo 'gagal';
    }

  } else {
    echo "gagal";
  }
?>