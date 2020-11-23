<?php 
include '../../config/koneksi.php';
$sql=mysqli_query($koneksi,"SELECT*FROM data_uji");
$cek=mysqli_num_rows($sql);
if ($cek>0) {
	echo '<div style="text-align: center;color: #28A745;">
	<i class="fa fa-check"></i>&nbsp;Data Uji
	</div>';
}
else
{
	echo '<div style="text-align: center;color: #DC3545;">
	<i class="fa fa-close"></i>&nbsp;Data Uji
	</div>';
}

?>