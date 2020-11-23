<?php 

include 'config/koneksi.php';

$kode = $_POST['kode'];

$detail = mysqli_query($koneksi,"SELECT*FROM `data_motor` INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor` WHERE data_motor.kode_motor='$kode'");
$motor=$detail->fetch_assoc();
?>

<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>

<div class="row">
	<div class="col-md-7">
		<table class="table">
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
				<td><?php echo rupiah($motor['harga']); ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-5">
		<center>
			<img class="img-responsive" style="max-height: 300px; display: block; margin: auto; width: 100%;" src="admin/img/<?php echo $motor['gambar']; ?>">
		</center>
	</div>
</div>
<div class="panel-footer" align="right">
	<button class="btn btn-sm btn-danger" id="close">Close</button>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#close').click(function(){
			$('#myModal').modal('toggle');
		});
	})
</script>