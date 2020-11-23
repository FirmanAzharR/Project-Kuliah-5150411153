<?php 
include '../config/koneksi.php';
include "excel_reader2.php";
?>

<?php

$tipe = $_POST['tipe'];

//cek format excel
$allowed =  array('xls');
$filename = $_FILES['filelatih']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
	header("location:index.php?halaman=datamhs&ekstensi");
}
else{
//cek data
	$sql=mysqli_query($koneksi,"SELECT*FROM ".$tipe."");
	$cek=mysqli_num_rows($sql);
	if ($cek>0) {
		header("location:index.php?halaman=datamhs&ada_data=$tipe");
	}
	else
	{
				// upload file xls
		$tipe = $_POST['tipe'];
		$target = basename($_FILES['filelatih']['name']) ;
		move_uploaded_file($_FILES['filelatih']['tmp_name'], $target);

		// beri permisi agar file xls dapat di baca
		chmod($_FILES['filelatih']['name'],0777);

		// mengambil isi file xls
		$data = new Spreadsheet_Excel_Reader($_FILES['filelatih']['name'],false);
		// menghitung jumlah baris data yang ada
		$jumlah_baris = $data->rowcount($sheet_index=0);

		// jumlah default data yang berhasil di import
		$berhasil = 0;

		if ($tipe=="data_prediksi") {

			for ($i=2; $i<=$jumlah_baris; $i++){

				// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing

				$nim   = $data->val($i, 1);
				$jenkel= $data->val($i, 2);
				$sks1  = $data->val($i, 3);
				$sks2  = $data->val($i, 4);
				$sks3  = $data->val($i, 5);
				$sks4  = $data->val($i, 6);
				$ipk1  = $data->val($i, 7);
				$ipk2  = $data->val($i, 8);
				$ipk3  = $data->val($i, 9);
				$ipk4  = $data->val($i, 10);

				//$keterangan  = $data->val($i, 10);

				if($nim !="" && $jenkel !="" && $sks1 !="" && $sks2 != "" && $sks3 != "" && $sks4 != "" && $ipk1 != "" && $ipk2 != "" && $ipk3 != "" && $ipk4 != ""){
					
				// input data ke database (table)
					mysqli_query($koneksi,"INSERT INTO ".$tipe." values('','$nim','$jenkel','$sks1','$sks2','$sks3','$sks4','$ipk1','$ipk2','$ipk3','$ipk4')");
					$berhasil++;
				}
			}		
		}
		else
		{
			for ($i=2; $i<=$jumlah_baris; $i++){

			// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
				$nim   = $data->val($i, 1);
				$jenkel= $data->val($i, 2);
				$sks1  = $data->val($i, 3);
				$sks2  = $data->val($i, 4);
				$sks3  = $data->val($i, 5);
				$sks4  = $data->val($i, 6);
				$ipk1  = $data->val($i, 7);
				$ipk2  = $data->val($i, 8);
				$ipk3  = $data->val($i, 9);
				$ipk4  = $data->val($i, 10);
				$keterangan  = $data->val($i, 11);

				if($nim !="" && $jenkel !="" && $sks1 !="" && $sks2 != "" && $sks3 != "" && $sks4 != "" && $ipk1 != "" && $ipk2 != "" && $ipk3 != "" && $ipk4 != "" && $keterangan != ""){
					
				// input data ke database (table)
					mysqli_query($koneksi,"INSERT INTO ".$tipe." values('','$nim','$jenkel','$sks1','$sks2','$sks3','$sks4','$ipk1','$ipk2','$ipk3','$ipk4','$keterangan')");
					$berhasil++;
				}
			}
		}
		
		if ($berhasil!=0) {
			unlink($_FILES['filelatih']['name']);
			header("location:index.php?halaman=datamhs&berhasil=$berhasil&pre=$tipe");
		}
		else
		{
			unlink($_FILES['filelatih']['name']);
			header("location:index.php?halaman=datamhs&gagal=$berhasil");
		}
	}
}

?>