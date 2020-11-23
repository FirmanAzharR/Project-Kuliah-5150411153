<?php 
include 'config/koneksi.php';

$alternatif = mysqli_query($koneksi,"SELECT*FROM tabel_alternatif INNER JOIN `data_motor` ON tabel_alternatif.kode_alt=data_motor.kode_motor INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor`;");
?>

<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>

<div class="panel panel-info" style="border-radius: 0px">
	<div class="panel-heading" style="border-radius: 0px">
		Hasil Analisa
	</div>
	<div class="panel-body">
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Motor</th>
					<th>Merk</th>
					<th>Tipe Mesin</th>
					<th>Silinder</th>
					<th>Volume</th>
					<th>Sistem BB</th>
					<th>Transmisi</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($alternatif as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_motor']; ?></td>
						<td><?php echo $value['merk_motor']; ?></td>
						<td><?php echo $value['tipe_mesin']; ?></td>
						<td><?php echo $value['silinder']; ?></td>
						<td><?php echo $value['volume']; ?></td>
						<td><?php echo $value['sistem_bb']; ?></td>
						<td><?php echo $value['transmisi']; ?></td>
						<td><?php echo rupiah($value['harga']); ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<br>

		<!-- //nilai -->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Motor</th>
					<th>Merk</th>
					<th>Tipe Mesin</th>
					<th>Silinder</th>
					<th>Volume</th>
					<th>Sistem BB</th>
					<th>Transmisi</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php $nilai = mysqli_query($koneksi,"SELECT*FROM tabel_nilai_alternatif") ?>
				<?php foreach ($nilai as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama'] ?></td>
						<td><?php echo $value['merk'] ?></td>
						<td><?php echo $value['mesin'] ?></td>
						<td><?php echo $value['silinder'] ?></td>
						<td><?php echo $value['volume'] ?></td>
						<td><?php echo $value['sbb'] ?></td>
						<td><?php echo $value['transmisi'] ?></td>
						<td><?php echo $value['harga'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<div class="panel panel-info" style="border-radius: 0px">
	<div class="panel-heading" style="border-radius: 0px">
		Normalisasi
	</div>
	<div class="panel-body">
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Motor</th>
					<th>Merk</th>
					<th>Tipe Mesin</th>
					<th>Silinder</th>
					<th>Volume</th>
					<th>Sistem BB</th>
					<th>Transmisi</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php $normalisasi = mysqli_query($koneksi,"SELECT*FROM tabel_normalisasi_alternatif"); ?>
				<?php foreach ($normalisasi as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama']; ?></td>
						<td><?php echo $value['merk']; ?></td>
						<td><?php echo $value['mesin']; ?></td>
						<td><?php echo $value['silinder']; ?></td>
						<td><?php echo $value['volume']; ?></td>
						<td><?php echo $value['sbb']; ?></td>
						<td><?php echo $value['transmisi']; ?></td>
						<td><?php echo $value['harga']; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<div class="panel panel-info" style="border-radius: 0px" id="rank">
	<div class="panel-heading" style="border-radius: 0px">
		Perankingan
	</div>
	<div class="panel-body">
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama Motor</th>
					<th>Total Perhitungan</th>
					<th>Ranking</th>
				</tr>
			</thead>
			<tbody>
				<?php $rank = mysqli_query($koneksi,"SELECT*FROM tabel_normalisasi_alternatif ORDER BY(jumlah) DESC"); ?>
				<?php foreach ($rank as $key => $value): ?>
					<tr>
						<td><?php echo $value['nama']; ?></td>
						<td><?php echo $value['jumlah']; ?></td>
						<td><?php echo $key+1; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>