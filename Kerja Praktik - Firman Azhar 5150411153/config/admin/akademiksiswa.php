<div style="padding: 25px" class="animated fadeIn" id="area">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Akademik Siswa</h6>
		</div>
		<div class="col-md-6">
			<?php $niss=$data->create_niss();?>
			<div style="float: right">
				<input style="border: none;float: right;" type="hidden" id="hidddenis" name="hidddenis" value="<?php echo $niss; ?>">
			</div>
			
		</div>	
	</div>
	<hr>
	<?php $select=$data->one_select_akademik_siswa($_GET['id']) ?>
	<?php $s_n=$data->select_nama($_GET['id']) ?>
	<form method="post">
		<label>Nama</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
			</div>
			<input disabled=" type="text" class="form-control"  aria-label="]" aria-describedby="basic-addon2" value="<?php echo $s_n['nama_siswa']; ?>">
		</div>
		<label>NISS</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
			</div>
			<input readonly name="nis" id="nis" type="text" class="form-control"  aria-label="]" aria-describedby="basic-addon2" value="<?php echo $select['NISS']; ?>">
			<div class="input-group-append">
				<button disabled class="btn btn-secondary" type="button">NISS</button>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $id=$_GET['id']; ?>">

		<label>Pilih Kelas - Jurusan</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
			</div>
			<select class="form-control" id="kelas" name="kelas" class="form-group" required="">
				<option value="empty" disabled selected>Pilih Kelas - Jurusan</option>
				<?php $kelas=$data->select_kelas()?>
				<?php foreach ($kelas as $key => $value): ?>
					<?php echo "<option value='".$value['id_kelas']."'"?> 
					<?php 
					if ($value['id_kelas']==$select['id_kelas']) {
						echo "selected";
					}?> <?php echo ">"; ?><?php echo $value['nama_kelas']; ?>  -  <?php echo $value['nama_jurusan']; ?></option>
				<?php endforeach ?>
			</select>
		</div>

		<label>Semester</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
			</div>
			<select class="form-control" id="semester" name="semester" class="form-group" required="">
				<option value="" disabled selected>Pilih Semester</option>
				<option value="1" <?php if ($select['semester']=="1") {
					echo "selected";
				} ?> >Semester 1</option>
				<option value="2" <?php if ($select['semester']=="2") {
					echo "selected";
				} ?> >Semester 2</option>
			</select>
		</div>
		<label>Status</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
			</div>
			<select class="form-control" id="status" name="status" class="form-group" required="">
				<option value="" disabled selected>Pilih Status</option>
				<option value="0" <?php if ($select['status']=="0") {
					echo "selected";
				} ?> >Tidak Aktif</option>
				<option value="1" <?php if ($select['status']=="1") {
					echo "selected";
				} ?> >Aktif</option>
				<option value="2" <?php if ($select['status']=="2") {
					echo "selected";
				} ?> >Lulus</option>
			</select>
		</div>
		<label>Tahun Ajaran</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
			</div>
			<input readonly name="year" id="year" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $select['tahun_ajaran'] ?>">
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php if ($_SESSION['id']=='admin'): ?>
					<a href="index.php?halaman=siswa" class="btn btn-danger" style="float: right;margin-left: 10px";><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
					<button id="edit" name="edit" href="" class="btn btn-warning" style="color: white; float: right;margin-left: 10px"><i class="fa fa-edit"></i>&nbsp;&nbsp;Update</button>
					<button type="submit" id="simpan" name="tambah" href="" class="btn btn-success" style="float: right;margin-left: 10px"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>	
					<input type="hidden" name="hak_akses" value="siswa">	
				<?php endif ?>
				
				<?php 
				if(isset($_POST['tambah']))
				{	
					error_reporting(0);
					$data->add_akademik_siswa($_POST['nis'],$_POST['id'],$_POST['kelas'],$_POST['semester'],$_POST['year'],$_POST['status']);
					$data->add_user($_POST['nis'],$_POST['nis'],$_POST['hak_akses']);
				}
				?>	

				<?php 
				if (isset($_POST['edit'])) {

					$data->update_akademik_siswa($_POST['nis'],$_POST['id'],$_POST['kelas'],$_POST['semester'],$_POST['year'],$_POST['status']);	
					echo "<script>setTimeout(function () { 
						swal({
							title: 'Data Terupdate',
							icon: 'success',
							type: 'success',
							showConfirmButton: false,
							timer: 1000,
							});  
							},10); 
							window.setTimeout(function(){ 
								window.location.replace('index.php?halaman=siswa');
							} ,1000); </script>";
						}
						?>			
					</div>
				</div>
			</form>	
		</div>


		<script type="text/javascript">
			$(window).on('load',function(){
				if(document.getElementById("nis").value == ""){
					var x = document.getElementById("hidddenis").value;
					document.getElementById("nis").value = x;
					document.getElementById("edit").disabled = true;
				}
				else{
					document.getElementById("simpan").disabled = true;
				}
			});
		</script>

		<script type="text/javascript">
			$(window).on('load',function(){
				if(document.getElementById("year").value == "")
				{
					document.getElementById("year").value = (new Date()).getFullYear();
				}
			});
		</script>