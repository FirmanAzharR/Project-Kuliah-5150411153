<?php include '../class.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sertifikat</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<script src="../../assets/js/bootstrap.js"></script>
</head>
<body>
	<?php $tgl=$_GET['tgl'] ?>
	<div class="container">
		<div style="margin-top: 30px">
			<div class="row">
				<div class="col-md-2">
					<img src="../../img/logo.png" style="top: 0px;width: 90px;position: absolute">		
				</div>
				<div class="col-md-8">
					<h4 style="text-align: center;">PEMERINTAH KABUPATEN KULON PROGO</h4>
					<h6 style="text-align: center;">DINAS TENAGA KERJA DAN TRANSMIGRASI</h6>
					<h6 style="text-align: center;">BALAI LATIHAN KERJA (BLK)</h6>
					<div style="text-align: center;">Alamat: Jl.Raya Wates-Purworejo Km 2 Tambak, Triharjo, Wates, Kulonprogo</div>
				</div>
			</div>
		</div>	
		<hr style="border: 1px solid black;">
		<table class="table table-bordered">
			<thead style="text-align: center;font-weight: bold">
				<td>No</td>
				<td>Nama</td>
				<td>Program</td>
				<td>Test</td>
				<td>Wawancara</td>
				<td>Keterangan</td>
			</thead>
			<tbody style="text-align: center;">
				<?php error_reporting(0); ?>
				<?php $lulus=$data->laporan_lulus($tgl); ?>
				<?php foreach ($lulus as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_peserta'] ?></td>
						<td><?php echo $value['nama_program'] ?></td>
						<td><?php echo $value['nilai'] ?></td>
						<td><?php echo $value['nilai_wawancara'] ?></td>
						<td><?php
						$total=($value['nilai']+$value['nilai_wawancara']);
						$hasil=$total/2;

						if ($hasil>=70) {
							echo "Lulus";
						}
						else{
							echo "Tidak Lulus";
						}
						?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<hr>
		<div class="row">
			<div class="col-md-9">
				
			</div>
			<div class="col-md-3">
				<div style="float: right">
					Wates, 
					<?php
					function tgl_indo($tanggal){
						$bulan = array (
							1 =>   'Januari',
							'Februari',
							'Maret',
							'April',
							'Mei',
							'Juni',
							'Juli',
							'Agustus',
							'September',
							'Oktober',
							'November',
							'Desember'
						);
						$pecahkan = explode('-', $tanggal);

					// variabel pecahkan 0 = tanggal
					// variabel pecahkan 1 = bulan
					// variabel pecahkan 2 = tahun

						return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
					}
					echo tgl_indo(date('Y-m-d'));
					?>
					<br>
					Pegawai
					<br><br><br>
					<?php 
					$select=$data->select_pegawai($_SESSION['pegawai']);
					echo $select['nama_pegawai'];
					?>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
		window.print();
		window.close();
	</script>
</body>
</html>