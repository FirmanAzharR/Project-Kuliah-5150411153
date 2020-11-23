<div style="padding: 25px" class="animated fadeIn" id="input" name="input">
	<div class="row">
		<?php 
		$edit=$data->one_select_nilai_edit($_GET['id']);
		?>
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Edit Nilai</h6>
		</div>
		<div class="col-md-6">
			<button onclick="Redirect()" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-eye"></i>&nbsp;&nbsp;Data Nilai</button>
		</div>
	</div>
	<hr>
	<h6 style="text-align: center;"><?php echo $edit['nama_siswa']; ?> || <?php echo $edit['nama_mapel']; ?></h6>
	<hr>
<form method="post">	
	<div class="row">
		<div class="col-md-3">
			<div id="konten2">
				<label>Tugas 1</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input min="0" max="100" required type="number" name="tugas1" class="form-control" aria-label="kls" aria-describedby="basic-addon1"  value="<?php echo $edit['tugas1'] ?>" >
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div id="konten2">
				<label>Tugas 2</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input min="0" max="100" required type="number" name="tugas2" class="form-control" aria-label="kls" aria-describedby="basic-addon1"  value="<?php echo $edit['tugas2'] ?>" >
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div id="konten2">
				<label>Ulangan Harian</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input min="0" max="100" required type="number" name="ulangan" class="form-control" aria-label="kls" aria-describedby="basic-addon1"  value="<?php echo $edit['ulangan'] ?>">
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div id="konten2">
				<label>Ujian Semester</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input min="0" max="100" required type="number" name="ujian" class="form-control" aria-label="kls" aria-describedby="basic-addon1"  value="<?php echo $edit['ujian'] ?>" >
				</div>
			</div>
		</div>
	</div>
	<hr>
	<button  name="update" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;Update</button>
	<?php if (isset($_POST['update'])) {
		$data->edit_nilai_guru($_GET['id'],$_POST['tugas1'],$_POST['tugas2'],$_POST['ulangan'],$_POST['ujian']);
	} ?>
</form>

</div>

<script type="text/javascript">
	function Redirect() {
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

