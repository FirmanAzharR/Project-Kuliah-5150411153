<?php 
include '../config/koneksi.php';

$nama = $_POST['nama'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$telp = $_POST['telepon'];
$foto = $_POST['image'];

/*$nama_foto=$foto['name'];
$lokasi_foto=$foto['tmp_name'];
if(!empty($lokasi_foto)){
	$data_lama = $this->select_peserta($id); 
	$foto_lama = $data_lama['foto'];
	if(file_exists("../../file/$foto_lama")){
		unlink("../../file/$foto_lama");
	}

	move_uploaded_file($lokasi_foto,"../../file/$nama_foto");

	$this->koneksi->query("UPDATE data_peserta SET pendidikan='$pendidikan',jurusan='$jurusan',asal_sekolah='$sekolah',file='$nama_foto' WHERE id_peserta='$id'");

	echo "<script>setTimeout(function () { 
		swal({
			title: 'Berhasil',
			type: 'success',
			showConfirmButton: false,
			timer: 1200,
			});  
			},10); 
			</script>";
			echo "<script>
			setTimeout(function () {
				window.location.replace('index.php?halaman=editpeserta&id=$id');
				},1230); 
				</script>";
			}
			else{
				$this->koneksi->query("UPDATE data_peserta SET pendidikan='$pendidikan',jurusan='$jurusan',asal_sekolah='$sekolah' WHERE id_peserta='$id'");

				echo "<script>setTimeout(function () { 
					swal({
						title: 'Berhasil',
						type: 'success',
						showConfirmButton: false,
						timer: 1200,
						});  
						},10); 
						</script>";
						echo "<script>
						setTimeout(function () {
							window.location.replace('index.php?halaman=editpeserta&id=$id');
							},1230); 
							</script>";
						}*/

						?>