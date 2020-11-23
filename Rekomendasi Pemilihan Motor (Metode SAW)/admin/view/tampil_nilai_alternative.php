<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th style="text-align: center">No</th>
			<th style="text-align: center">Motor</th>
			<th style="text-align: center">Merk</th>
			<th style="text-align: center">Tipe Mesin</th>
			<th style="text-align: center">Silinder</th>
			<th style="text-align: center">Volume</th>
			<th style="text-align: center">SBB</th>
			<th style="text-align: center">Transmisi</th>
			<th style="text-align: center">Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM `data_motor` INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor`") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr style="text-align: center" id="<?php echo $value['kode_motor'] ?>">
				<td><?php echo $key+1; ?></td>
				<td>
					<?php echo $value['nama_motor'] ?>
				</td>
				<td>
					<?php
					$mrk = $value['merk_motor'];
					$qry1 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$mrk'");
					$merk = $qry1->fetch_assoc();
					echo $merk['nilai'];
					?>
				</td>
				<td>
					<?php
					$tipe_mesin = $value['tipe_mesin'];
					$qry2 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$tipe_mesin'");
					$mesin = $qry2->fetch_assoc();
					echo $mesin['nilai'];
					?>
				</td>
				<td>
					<?php
					$silinder = $value['silinder'];
					$qry3 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$silinder'");
					$ss = $qry3->fetch_assoc();
					echo $ss['nilai'];
					?>
				</td>
				<td>
					<?php
					$vol = $value['volume'];
					$qry4 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$vol'");
					$volume = $qry4->fetch_assoc();
					echo $volume['nilai'];
					?>					
				</td>
				<td>
					<?php
					$sbb = $value['sistem_bb'];
					$qry5 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$sbb'");
					$sistem_bb = $qry5->fetch_assoc();
					echo $sistem_bb['nilai'];
					?>
				</td>
				<td>
					<?php
					$transmisi = $value['transmisi'];
					$qry6 = mysqli_query($koneksi,"SELECT nilai FROM nilai_kriteria WHERE crips='$transmisi'");
					$trans = $qry6->fetch_assoc();
					echo $trans['nilai'];
					?>
				</td>
				<td>
					<?php 
					$harga1 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK22'");
					$qry1 = $harga1->fetch_assoc();
					$harga2 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK23'");
					$qry2 = $harga2->fetch_assoc();

					$harga3 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK24'");
					$qry3 = $harga3->fetch_assoc();

					$harga4 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK25'");
					$qry4 = $harga4->fetch_assoc();

					$harga5 = mysqli_query($koneksi,"SELECT crips,nilai FROM nilai_kriteria WHERE kode_nilai_kriteria='NK26'");
					$qry5 = $harga5->fetch_assoc();
					?>
					<?php 
						if ($value['harga']>=0&$value['harga']<=$qry1['crips']) {
							echo $qry1['nilai'];
						}
						if ($value['harga']>$qry1['crips']&$value['harga']<=$qry2['crips']) {
							echo $qry2['nilai'];
						}
						if ($value['harga']>$qry2['crips']&$value['harga']<=$qry3['crips']) {
							echo $qry3['nilai'];
						}
						if ($value['harga']>$qry3['crips']&$value['harga']<=$qry4['crips']) {
							echo $qry4['nilai'];
						}
						if ($value['harga']>$qry5['crips']) {
							echo $qry5['nilai'];
						}
					?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
		$('.myTable').DataTable();
	});
</script>