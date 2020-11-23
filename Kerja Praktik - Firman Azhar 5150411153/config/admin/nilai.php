<div style="padding: 25px" class="animated fadeIn" id="input" name="input">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Input Nilai</h6>
		</div>
		<div class="col-md-6">
			<button onclick="Redirect()" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-eye"></i>&nbsp;&nbsp;Data Nilai</button>
		</div>
	</div>
	<hr>
	<form method="post">
		<div class="row">
			<div class="col-md-3">
				<?php if ($_SESSION['hak_akses']=='admin'): ?>
				<label>Pilih Kelas - Jurusan</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<select class="form-control" id="kelas" name="kelas" class="form-group" onchange="getid(event)">
						<option value="" disabled selected>Jurusan - Kelas</option>
						<?php $kelas=$data->select_kelas()?>
						<?php foreach ($kelas as $key => $value): ?>
							<?php echo "<option value='".$value['id_kelas']."'>";?><?php echo $value['nama_kelas']; ?> - <?php echo $value['nama_jurusan'] ?>
						<?php endforeach ?>
					</option>
				</select>
			</div>
		<?php endif ?>
		</div>
		<div class="col-md-2" style="border-right: 1px solid #ddd">
			<?php if ($_SESSION['hak_akses']=='admin'): ?>
			<input type="hidden" id="myText" name="input" class="form-control" value="">
			<button onclick="onlanjut()" name="filter" style="margin-top: 30px;" class="btn btn-primary"><i class="fa fa-forward"></i>&nbsp;Lanjut</button>
			<?php endif ?>
		</div>
	<div class="col-md-3">
		<div id="konten1">
			<label>Pilih Jenis Nilai</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input type="hidden" id="jenis" name="get_jenis" class="form-control" value="">
					<select class="form-control" id="j_nilai" name="jenis_nilai" class="form-group" onchange="getjenis(event)">
						<option value="" disabled selected>Jenis Nilai</option>
						<?php $mapel=$data->select_jenis()?>
						<?php foreach ($mapel as $key => $value): ?>
							<?php echo "<option value='".$value['id_jenis']."'>";?><?php echo $value['jenis_nilai']; ?>
						<?php endforeach ?>
					</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div id="konten2">
			<label>Pilih Jenis Mapel</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
				</div>
				<input type="hidden" id="mapel" name="get_mapel" class="form-control" value="">
				<select class="form-control"  name="mapel" class="form-group" onchange="getmapel(event)">
					<option value="" disabled selected>Mata Pelajaran</option>
					<?php $mapel=$data->select_mapel()?>
					<?php foreach ($mapel as $key => $value): ?>
						<?php echo "<option value='".$value['kode_mapel']."'>";?><?php echo $value['nama_mapel']; ?> 
					<?php endforeach ?>
				</option>
			</select>
		</div>
		</div>
	</div>
	</div>
	<div id="demo"></div>
	<?php if ($_SESSION['hak_akses']=='admin'): ?>
	<hr>
<?php endif ?>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
		<thead class="thead-light" style="text-align: center;">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Siswa</th>
				<th scope="col">Kelas</th>
				<th scope="col">Jurusan</th>
				<th scope="col">Semester</th>
				<th scope="col">Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($_POST['filter'])){
				$idkelas=$_POST['input'];
				$filter_data=$data->filter($idkelas);
			} ?>	
		</tbody>
	</table>
	<div style="margin-top:20px;" align="center">
		<?php if ($_SESSION['hak_akses']=='admin'): ?>
		<button  data-toggle="confirmation"
        data-btn-ok-label="Simpan" data-btn-ok-class="btn-success"
        data-btn-cancel-label="Batal!" data-btn-cancel-class="btn-danger"
        data-title="Apakah Data Sudah Benar ?" data-content="Harap periksa kembali sebelum menyimpan."  data-singleton="true"  type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
		<?php
		error_reporting(0); 
		$data->multiple_input($_POST['get_jenis']); 
		?>
	<?php endif ?>
	</div>
</form>
</div>



<script type="text/javascript">
	function getid(e) {
		document.getElementById("myText").value = e.target.value
	}
	function getmapel(e) {
		document.getElementById("mapel").value = e.target.value
	}
	function getjenis(e) {
		document.getElementById("jenis").value = e.target.value
	}
</script>

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

<script type="text/javascript">
    $(window).on('load',function(){
    	
    	var x = document.getElementById("myTable").rows.length;
    	 if(x>2){
    	 	$('#konten2').show();
    	 	$('#konten1').show();
    	 }
    	 else{
    	 	$('#konten2').hide();
    	 	$('#konten1').hide();
    	 }
    });
</script>

