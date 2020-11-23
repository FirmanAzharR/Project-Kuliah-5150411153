<div style="padding: 25px" class="animated fadeIn" id="input" name="input">
	<div class="row">
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<h6 style="font-size: 25px;margin-top: 20px">Transkrip Nilai (Semester 2)</h6>
		</div>
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<?php error_reporting(0); ?>
			<?php $id=$_GET['id']; ?>
			<?php $transkrip=$data->select_nilai_transkrip2($id); ?>
			<div>
				<?php $siswa=$data->one_select_siswa_akademik($id); ?>
				<table>
					<tr style=" color: #828285">
						<h6>Nama Lengkap : <?php echo $siswa['nama_siswa'] ?></h6>
					</tr>
					<tr style="color: #828285">
						<h6>Kelas : <?php echo $siswa['nama_kelas'] ?> - <?php echo $siswa['nama_jurusan'] ?></h6>
					</tr>
					<tr style="color: #828285">
						<h6>Tahun Ajaran : <?php echo $siswa['tahun_ajaran'] ?></h6>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6"><a href="index.php?halaman=transkrip&id=<?php echo $_GET['id']; ?>" class="btn btn-info btn-sm" style="float: right;margin-top: 5px"><i class="fa fa-eye"></i>&nbsp;&nbsp;Semester 1</a>
				</div>
			</div>
			
		</div>
	</div>
	<hr>
	<form method="post">
		<table id="myTable" class="table table-hover table-responsive-md">
			<thead class="thead-light">
				<tr style="text-align: center;">
					<th>No</th>
					<th>Mata Pelajaran</th>
					<th>Tugas 1</th>
					<th>Tugas 2</th>
					<th>Ulangan</th>
					<th>Ujian Akhir</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($transkrip as $key => $value): ?>
					<tr style="text-align: center;">
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_mapel']; ?></td>
						<td><?php echo $value['tugas1']; ?></td>
						<td><?php echo $value['tugas2']; ?></td>
						<td><?php echo $value['ulangan']; ?></td>
						<td><?php echo $value['ujian']; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</form>
</div>

<script type="text/javascript">
	function Redirect() {
		window.location="index.php?halaman=nilai";
	}
	function back() {
		window.location="index.php?halaman=datanilai";
	}
</script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>

<script type="text/javascript">
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',});
	</script>

