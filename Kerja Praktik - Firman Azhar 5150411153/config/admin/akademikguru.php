<div style="padding: 25px" class="animated fadeIn" id="area">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Akademik Guru</h6>
		</div>	
	</div>
	<hr>
	<?php $guru=$data->one_select_akademik_guru($_GET['id']); ?>
	<?php $alt=$data->one_select_guru($_GET['id']); ?>
	<?php $nik_nsup=$data->alt_select($_GET['id']); ?>
	<?php $akademik=$data->status_akademik_guru($_GET['id']) ?>
	<form method="post">
		<input type="hidden" name="getid" value=" <?php echo$alt['id_guru']?>">
		<div class="row">
			<div class="col-md-6">
				<label>Nama Guru</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					</div>
					<input disabled=" type="text" class="form-control"  aria-label="" aria-describedby="basic-addon2" value="<?php echo $guru['nama']; ?>">
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2"><?php echo $guru['kode_guru']; ?></span>
					</div>
				</div>

				<label>NIP</label>
				<div class="input-group mb-3">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input required="" id="nip" name="nip" type="number" class="form-control"  aria-label="" aria-describedby="basic-addon2" value="<?php echo $nik_nsup['NIP']; ?>">
					</div>
				</div>
				<label>Status</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<select class="form-control" id="status" name="status" class="form-group" required="">
						<option value="" disabled selected>Pilih Status</option>
						<option value="0" <?php if ($akademik['status']==0) {
							echo "selected";
						} ?> >Tidak Aktif</option>
						<option value="1" <?php if ($akademik['status']==1) {
							echo "selected";
						} ?> >Aktif</option>
					</option>
					</select>
				</div>
			</div>
			<div class="col-md-6" style="border-left: 1px #ddd solid">
				<label>Mata Pelajaran</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input disabled=" type="text" class="form-control"  aria-label="" aria-describedby="basic-addon2" value="<?php echo $guru['nama_mapel']; ?>">
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2"><?php echo $guru['kode_mapel']; ?></span>
					</div>
				</div>
				<label>NUPTK</label>
				<div class="input-group mb-3">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input required="" name="nuptk" id="nuptk" type="number" class="form-control"  aria-label="]" aria-describedby="basic-addon2" value="<?php echo $nik_nsup['NUPTK']; ?>">
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php if ($_SESSION['id']=='admin'): ?>
				<a href="index.php?halaman=guru" class="btn btn-danger" style="float: right;margin-left: 10px";><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
				<button id="edit" name="edit" href="" class="btn btn-warning" style="color: white; float: right;margin-left: 10px"><i class="fa fa-edit"></i>&nbsp;&nbsp;Update</button>
				<button type="submit" id="simpan" name="tambah" href="" class="btn btn-success" style="float: right;margin-left: 10px"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
				<input type="hidden" name="hak_akses" value="guru">	
			<?php endif ?>
				<?php
				if(isset($_POST['tambah']))
				{	
					//error_reporting(0);
					$data->add_user($_POST['nip'],$_POST['nip'],$_POST['hak_akses']);
					$data->add_akademik_guru($_POST['getid'],$_POST['nip'],$_POST['nuptk'],$_POST['status']);
				}
				?>	
				<?php 
				if (isset($_POST['edit'])) {
					$data->update_akademik_guru($_POST['nip'],$_POST['nuptk'],$_POST['getid'],$_POST['status']);	
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
								window.location.replace('index.php?halaman=guru');
							} ,1000); </script>";
						}
						?>			
					</div>
				</div>
			</form>	
		</div>

		<script type="text/javascript">
			$(window).on('load',function(){
				if(document.getElementById("nip").value == "" && document.getElementById("nuptk").value == "" ){
					document.getElementById("edit").disabled = true;
				}
				else{
					document.getElementById("simpan").disabled = true;
				}
			});
		</script>