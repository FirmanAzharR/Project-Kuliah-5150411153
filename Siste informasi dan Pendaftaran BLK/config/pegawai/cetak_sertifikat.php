<?php include '../class.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sertifikat</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<script src="../../assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="container" style="padding-left: 90px;padding-right:90px;padding-top: 40px">
		<div style="margin-top: 30px">
			<div class="row">
				<div class="col-md-2">
					<img src="../../img/logo.png" style="top: 0px;width: 90px;position: absolute">		
				</div>
				<div class="col-md-8" style="font-family: Times New Roman">
					<h6 style="text-align: center;font-weight: bold">PEMERINTAH KABUPATEN KULON PROGO</h6>
					<h6 style="text-align: center;font-weight: bold">DINAS SOSIAL TENAGA KERJA DAN TRANSMIGRASI</h6>
					<h4 style="text-align: center;font-weight: bold">UPTD BALAI LATIHAN KERJA</h4><br>
					<h2 style="text-align: center;font-weight: bold;font-family:Arial">SERTIFIKAT</h2><br>
				</div>
			</div>
		</div>	
		<div id="isi">
			<?php $peserta=$data->select_peserta($_GET['id']); ?>
			<p style="text-align: ;">Dinas Sosial Tenaga Kerja da Transmigrasi Kabupaten Kulon Progo menerangkan bahwa:</p>
			<p>
				Nama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $peserta['nama_peserta'] ?> <br>
				Tempat, tanggal lahir &nbsp;: &nbsp;<?php echo $peserta['tempat']?>,<?php echo $peserta['tempat']; ?><br>
				Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: &nbsp;<?php echo $peserta['alamat'] ?> <br>
			</p>
		</div>
		<p style="text-align: justify;">
			Telah mengikuti Pelatihan Berbasis Kompetensi Sub Kejuruan <?php echo $peserta['nama_sub']; ?> yang diselenggarakan berdasarkan Keputusan Kuasa Pengguna Anggaran Program PKTKP dana Tugas Pembantuan Ditjen Binalattas UPTD. Balai Latihan Kerja Kulon Progo selama 240 Jam Pelatihan dari tanggal 2 Mei sampai dengan 7 Juni 2011, Dengan Hasil: <label style="font-weight: bold">BAIK</label>
		</p>
		<table class="">
			<tr>
				<td>
					<img class="img-thumbnail" src="../../foto/<?php echo $peserta['foto']; ?>" style="margin-left: 50px;width: 112px;height: 165px">		
				</td>
				<td>
					<div style="margin-left: 420px;text-align: center">
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
						Kepala Dinas
						<br><br><br>
						<?php 
						echo"<label style='font-weight:bold'>Drs. RIYADI SUNARTO</label>";
						echo"<label>NIP. 19671018&nbsp;199303&nbsp;1&nbsp;004</label>";
						?>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		window.print();
		//window.close();
	</script>
</body>
</html>