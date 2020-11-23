<style type="text/css">
thead,tbody{
	text-align: center;
}
tfoot input {
	width: 100%;
	padding: 3px;
	box-sizing: border-box;
	border-style: initial;
	text-align: center; 
}
</style>

<div style="padding: 25px" class="animated fadeIn">
	<?php $nip=$_SESSION['id'];?>
	<div class="row">
		<div class="col-md-6">
			<?php $judul=$user->judul_data_wali($_SESSION['id']) ?>
			<?php foreach ($judul as $key => $value): ?>
				<h6  style="display:inline-block;font-size: 25px;">[&nbsp;<?php echo $value['nama_kelas']; ?>&nbsp;-&nbsp;<?php echo $value['nama_jurusan']; ?>&nbsp;]&nbsp;&nbsp;</h6>
			<?php endforeach ?>
		</div>
	</div>
	<hr>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm ">
		<thead class="thead-light">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Semester</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php error_reporting(0); ?>
			<?php $siswa=$user->siswa_base_on_wali($nip)?>
			<?php foreach ($siswa as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_siswa'] ?></td>
					<td><?php echo $value['nama_kelas'] ?></td>
					<td><?php echo $value['nama_jurusan'] ?></td>
					<td><?php echo $value['semester'] ?></td>
					<td><a href="index.php?halaman=cetakraport&id=<?php echo $value['id_siswa'] ?>" class="btn btn-primary btn-sm" style="color: white;margin-right: 5px" target="_blank" data-toggle="popover" title="Detail" data-content="Lihat Raport"><i class="fa fa-file"></i></a>
						<a href="index.php?halaman=detailsiswa&id=<?php echo $value['id_siswa'];?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" data-toggle="popover" title="Detail" data-content="Lihat Detail Siswa"><i class="fa fa-eye"></i></a>
						<a href="index.php?halaman=transkrip&id=<?php echo $value['id_siswa'];?>" style="color: white; margin:1px" class="btn btn-warning btn-sm" role="button" data-toggle="popover" title="Transkrip" data-content="Transkrip Nilai" ><i class="fa fa-tasks"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th>Filter</th>
				<th>( Nama )</th>
				<th>( Kelas )</th>
				<th>( Jurusan )</th>
				<th>( Semester )</th>
				<th></th>
			</tr>
		</tfoot>
	</table>	
</div>

<script type="text/javascript">
	CKEDITOR.replace("editor");
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

	

	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover({
				placement : 'top',
				trigger : 'hover'
			});
		});
	</script>