<style type="text/css">
tfoot input {
	width: 100%;
	padding: 3px;
	box-sizing: border-box;
	border-style: initial;
	text-align: center; 
}
</style>
<div style="padding: 25px" class="animated fadeIn" id="input" name="input">
	<div class="row">
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<h6 style="font-size: 25px;margin-top: 20px">Transkrip Nilai (Semester 2)</h6>
		</div>
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<?php error_reporting(0); ?>
			<?php $id=$_GET['idn']; ?>
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
				<div class="col-md-6"><button onclick="back()" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;Data Nilai</button><a href="index.php?halaman=detailnilai&idn=<?php echo $_GET['idn']; ?>" class="btn btn-info btn-sm" style="float: right;margin-top: 5px"><i class="fa fa-eye"></i>&nbsp;&nbsp;Semester 1</a>
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
					<?php if ($_SESSION['hak_akses']=='admin'): ?>
						<th>Option</th>
					<?php endif ?>
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
						<?php if ($_SESSION['hak_akses']=='admin'): ?>
							<td><a href="index.php?halaman=editnilai&id=<?php echo $value['id_nilai'] ?>&idn=<?php echo $value['id_siswa'] ?>" class="btn btn-warning btn-sm" style="color: white;margin-right: 5px"><i class="fa fa-edit"></i></a><a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletenilai&id=<?php echo $value['id_nilai'] ?>&idback=<?php echo $value['id_siswa'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Filter</th>
					<th>( Mata Pelajaran )</th>
					<th>( Tugas 1 )</th>
					<th>( Tugas 2 )</th>
					<th>( Ulangan )</th>
					<th>( Ujian )</th>
					<?php if ($_SESSION['hak_akses']=='admin'): ?>
						<th> </th>
					<?php endif ?>
				</tr>
			</tfoot>
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

	$(document).ready(function() {
		$('#myTable tfoot th').each( function () {
			var title = $(this).text();
			$(this).html( '<input type="text" placeholder="'+title+'" />' );
		} );
		
		var table = $('#myTable').DataTable();
		
		table.columns().every( function () {
			var that = this;
			
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
					.search( this.value )
					.draw();
				}
			} );
		} );
	} );
</script>

<script type="text/javascript">
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',});
	</script>

