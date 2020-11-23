<?php 
$data->delete_pengumuman($_GET['id']);
echo "<script>setTimeout(function () { 
	swal({
		title: 'Data Terhapus',
		type: 'success',
		showConfirmButton: false,
		timer: 1000,
		});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('index.php?halaman=pengumuman');
		} ,1000); </script>";
	?>
