<?php

	$x=$_GET['x']; 

	if ($x==1) {
		$data->status_cetak($_GET['id'],1);
		echo "
				<script>
					window.location.href = 'location: index.php?halaman=sertifikat';
				</script>
			";
	}
	else{
		$data->status_cetak($_GET['id'],0);
		echo "
				<script>
					window.location.href = 'location: index.php?halaman=sertifikat';
				</script>
			";
	}

?>