<style type="text/css">
@media print {
	.print {
		display:none
	}
}
</style>


<div style="padding: 50px" class="animated fadeIn" id="konten">
	<?php error_reporting(0); ?>
	<?php $id=$_GET['id']; ?>
	<?php $kls=$_GET['kls']; ?>
	<?php $smt=$_GET['smstr']; ?>
	<div style="text-align: center;font-weight: bold;font-size: 16px">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">LAPORAN HASIL BELAJAR PESERTA DIDIK <br>
			SEKOLAH MENENGAH UMUM (SMA) Dr. WAHIDIN MLATI</div>
			<div class="col-md-2">
				<?php if ($_SESSION['hak_akses']=='admin'): ?>
				<div id="cetak" style="float: right;" onclick="myFunction()">
					<button class="btn btn-primary btn-sm print"><i class="fa fa-print"></i>&nbspCetak</button>
				</div>
			<?php endif ?>
			</div>
		</div>
	</div>
	<hr>
	<?php $akademik=$data->one_select_siswa_akademik($id) ?>
	<?php $kelas=$data->one_select_kelas($kls) ?>
	<?php $siswa=$data->one_select_siswa($id) ?>
	<?php $tahun=$data->select_tahun($id,$kls,$smt) ?>
	<div class="row">
		<div class="col-md-3">
			<div>
				<table>
					<tr style=" color: #828285">
						<h6>Nama Peserta Didik </h6>
					</tr>
					<tr style="color: #828285">
						<h6>NISS </h6>
					</tr>
					<tr style=" color: #828285">
						<h6>Nama Sekolah</h6>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<table>
				<tr style=" color: #828285">
					<h6>: <?php echo $siswa['nama_siswa']  ?></h6>
				</tr>
				<tr style="color: #828285">
					<h6>: <?php echo $akademik['NISS']; ?></h6>
				</tr>
				<tr style=" color: #828285">
					<h6>: SMA Dr. Wahidin Mlati</h6>
				</tr>
			</table>
		</div>
		<div class="col-md-3">
			<div>
				<table>
					<tr>
						<h6>Kelas - Jurusan / Semester</h6>
					</tr>
					<tr>
						<h6>Tahun Ajaran</h6>
					</tr>
					<tr>
						<h6>Program</h6>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-2">
			<div>
				
				<table>
					<tr>
						<h6>: <?php echo $kelas['nama_kelas'] ?>-<?php echo $akademik['nama_jurusan'] ?> / <?php echo $smt ?>
						</h6>
					</tr>
					<tr>
						<h6>: <?php $thn=$tahun['tahun']; echo $thn;  ?></h6>
					</tr>
					<tr>
						<h6>: Umum</h6>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<hr>
	<?php $transkrip=$data->hitung_nilai_raport($id,$kls,$smt,$thn); ?>
	<form method="post">
		<table class="table table-hover table-bordered table-responsive-md">
			<thead class="thead-light">
				<tr style="text-align: center;">
					<th>No</th>
					<th>Mata Pelajaran</th>
					<th>KKM</th>
					<th>Harian</th>
					<th>Ulangan</th>
					<th>Ujian</th>
					<th>Total</th>
					<th>Keterangan</th>
					<th>Predikat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($transkrip as $key => $value): ?>
					<tr style="text-align: center;">
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_mapel']; ?></td>
						<td><?php echo $value['kkm']; ?></td>
						<td><?php echo $value['harian']; ?></td>
						<td><?php echo $value['ulangan']; ?></td>
						<td><?php echo $value['ujian']; ?></td>
						<td><?php echo $value['total_nilai']; ?></td>
						<td><?php 
						$nilai=$value['total_nilai'];
						$kkm=$value['kkm'];
						if ($nilai>=$kkm) {
							echo "L";
						}else{
							echo "TL";
						} ?></td>
						<td><?php $nilai = $value['total_nilai']; 
						if ($nilai>=80) {
							echo "A";
						} elseif ($nilai>=70) {
							echo "B";
						} elseif ($nilai>=60) {
							echo "C";
						} elseif ($nilai>=50) {
							echo "D";
						} elseif ($nilai>=0) {
							echo "E";
						}
						?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php $nilaiakhir=$data->rata_rata($id,$kls,$smt,$thn)?>
		<?php $nilaikelas=$data->rata_rata_kelas($kls,$smt,$thn)?>
		<hr>
		<div class="row">
			<div class="col-md-3">
				Rata-Rata Nilai
				<br>
				Rata-Rata Kelas
				<br>
			</div>
			<div class="col-md-3">
				: <?php echo number_format($nilaiakhir['total_rata'],2) ?>
				<br>
				: <?php echo number_format($nilaikelas['rata_kelas'],2); ?>
				<br>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3">
				Sleman, 
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
				Kepala Sekolah
				<br><br><br>
				Dra. Sri Arti Rientarsih
			</div>
		</div>
	</form>
	<hr>
</div>
<?php $rank=$data->ranking($kls,$smt,$thn) ?>
<div style="padding: 50px">
	<div style="text-align: center;font-weight: bold;font-size: 16px;margin-top: 200px;margin-bottom: 30px">DAFTAR RANKING SISWA</div>
	<table class="table table-bordered" id="tb_ranking">
		<thead>
			<tr align="center">
				<th>Ranking</th>
				<th>Nama Siswa</th>
				<th>Nilai Rata-Rata</th>
			</tr>
		</thead>
		<?php foreach ($rank as $key => $value): ?>
			<tbody>
				<tr align="center">
					<td class="r"><?php echo $key+1; ?></td>
					<td width="50%"><?php echo $value['nama_siswa']; ?></td>
					<td><?php echo number_format($value['total_rata'],2) ?></td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
</div>
<script>
	function myFunction() {
		var prin = document.getElementById("cetak");

		window.print();
	}
</script>

<script type="text/javascript">
	$(window).on('load',function(){

	});
</script>