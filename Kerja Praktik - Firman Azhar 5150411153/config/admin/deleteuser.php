<?php $select=$data->delete_user($_GET['id']); 
echo "<script>setTimeout(function () { 
	swal({
		title: 'Data Terhapus',
		type: 'success',
		showConfirmButton: false,
		timer: 800,
		});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('index.php?halaman=kelolauser');
		} ,800); </script>";
?>