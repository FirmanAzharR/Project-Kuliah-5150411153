<?php 
include '../../config/koneksi.php';

if ($_POST['status_antrian']=='bpumum') {

	if(isset($_POST["dokter_umum"]) && !empty($_POST["dokter_umum"]))
	{
		$str = $_POST["dokter_umum"];
		$data = explode(",",$str);

		foreach ($data as $key => $value) {
			mysqli_query($koneksi, "UPDATE dokter SET status='1' WHERE id_dokter='".$value."'");
		}
		$get_date = date("Y-m-d");
		$update2 = mysqli_query($koneksi,"update status_antrian set status_antrian='Berjalan', tanggal_mulai='$get_date' WHERE loket_antrian='bpumum' ");

	}
	else
	{
		echo 'Pilih satu atau lebih dari daftar diatas!';
	}	

}


if ($_POST['status_antrian']=='bpgigi') {

	if(isset($_POST["dokter_gigi"]) && !empty($_POST["dokter_gigi"]))
	{
		$str = $_POST["dokter_gigi"];
		$data = explode(",",$str);
		
		foreach ($data as $key => $value) {
			mysqli_query($koneksi, "UPDATE dokter SET status='1' WHERE id_dokter='".$value."'");
		}

		$get_date = date("Y-m-d");
		$update = mysqli_query($koneksi,"update status_antrian set status_antrian='Berjalan', tanggal_mulai='$get_date' WHERE loket_antrian='bpgigi' ");

	}
	else
	{
		echo 'Pilih satu atau lebih dari daftar diatas!';
	}	

}

?>