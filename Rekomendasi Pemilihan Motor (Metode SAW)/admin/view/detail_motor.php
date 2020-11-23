<?php 

include '../../config/koneksi.php';

$kode = $_POST['kode'];

$detail = mysqli_query($koneksi,"SELECT*FROM `data_motor` INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor` WHERE data_motor.kode_motor='$kode'");
$motor=$detail->fetch_assoc();
?>

<div class="panel panel-info">
	<div class="panel-heading">
		<label style="font-size: 17px">Informasi Lengkap Motor</label>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<td>Nama Motor</td>
				<td><?php echo $motor['nama_motor']; ?></td>
			</tr>
			<tr>
				<td>Merk Motor</td>
				<td><?php echo $motor['merk_motor']; ?></td>
			</tr>
			<tr>
				<td>Tipe Mesin</td>
				<td><?php echo $motor['tipe_mesin']; ?></td>
			</tr>
			<tr>
				<td>Susunan Silinder</td>
				<td><?php echo $motor['silinder']; ?></td>
			</tr>
			<tr>
				<td>Volume Silinder</td>
				<td><?php echo $motor['volume']; ?></td>
			</tr>
			<tr>
				<td>Sistem Bahan Bakar</td>
				<td><?php echo $motor['sistem_bb']; ?></td>
			</tr>
			<tr>
				<td>Tipe Transmisi</td>
				<td><?php echo $motor['transmisi']; ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><?php echo $motor['harga']; ?></td>
			</tr>
		</table>
		<hr>
		<center>
			<img style="width: 250px" src="img/<?php echo $motor['gambar']; ?>">
		</center>
	</div>
	<div class="panel-footer" align="right">
		<button class="btn btn-sm btn-danger" id="close">Close</button>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#close').click(function(){
			$('#detail-motor').hide(300);
		});
	})
</script>