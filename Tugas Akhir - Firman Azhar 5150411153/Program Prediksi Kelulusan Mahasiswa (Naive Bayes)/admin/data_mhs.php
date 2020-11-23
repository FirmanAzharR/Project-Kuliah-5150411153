<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<?php error_reporting(0); ?>
	<?php 
	if(isset($_GET['berhasil'])){
		//echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
		echo "<script>setTimeout(function () { 
			swal({
				title: 'Import Data Berhasil',
				text : '".$_GET['berhasil']." Record berhasil di import',
				type: 'success',
				});  
				},10); 
				</script>";
		}

	elseif(isset($_GET['ekstensi'])){
		//echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
		echo "<script>setTimeout(function () { 
		swal({
			title: 'Gagal Import',
			text : 'Format File Tidak Sesuai (.xls)',
			type: 'error',
			});  
			},10); 
			</script>";
		}

	elseif(isset($_GET['gagal'])){
		//echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
		echo "<script>setTimeout(function () { 
		swal({
			title: 'Gagal Import',
			text : 'silahkan cek file Excel anda!!',
			type: 'error',
			});  
			},10); 
			</script>";
		}

	elseif(isset($_GET['ada_data'])){
		//echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
		echo "<script>setTimeout(function () { 
			swal({
				title: '".$_GET['ada_data']." sudah ada',
				text : 'Hapus ".$_GET['ada_data']." terlebih dahulu',
				type: 'warning',
				});  
				},10); 
				</script>";
			}
?>

	<div class="row">
		<div class="col-md-6">
			<h3>Kelola Data</h3>
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-download"></i>&nbsp;Template Data</button>
		</div>
	</div>
	<hr style="border: 1px solid #FFC400">
	<div class="row">
		<div class="col-md-6">
			<div class="alert alert-info" style="border-radius: 0px">
				<form id="myform" method="post" enctype="multipart/form-data" action="import_data.php">
					<div class="form-group">
						<h6>Import Data</h6>
					</div>
					<div class="form-group">
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="tipe" value="data_latih" required> Data Latih
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="tipe" value="data_uji"> Data Uji
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="tipe" value="data_prediksi"> Data Prediksi
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="custom-file mb-3">
							<input name="filelatih" required="" type="file" class="custom-file-input" id="customFile" accept="application/vnd.ms-excel" onchange="checkfile(this);">
							<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="col-md-4">						
							<button type="submit" name="simpan_latih" class="btn btn-success"><i class="fa fa-upload"></i>&nbsp;Import</button>
						</div>
					</div>						
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="alert alert-warning" style="border-radius: 0px">
				<form id="kelola" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<h6>Tampil & Hapus Data</h6>
					</div>
					<div class="form-group">
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="pilih" id="pilih" value="data_latih" required> Data Latih
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="pilih" id="pilih" value="data_uji"> Data Uji
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="pilih" id="pilih" value="data_prediksi"> Data Prediksi
						</label>
					</div>
					</div>
					<div class="form-check-inline">					
						<div class="form-group">
							<button type='button' id="add" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
							<button type='button' id="show" class="btn btn-info"><i class="fa fa-eye"></i>&nbsp;Tampil</button>
							<button type='button' onclick="confirmDelete()" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
						</div>
					</div>						
					</form>
				</div>
			</div>
		</div>
		<div class="alert alert-success">
			<div class="row">
				<div class="col-2">
					<div style="font-weight: bold;">
						info Data
					</div>
				</div>
				<div class="col-3">
					<div id="dt_latih" style="text-align: center;"></div>
				</div>
				<div class="col-3">
					<div id="dt_uji" style="color: #DC3545;text-align: center;"></div>
				</div>
				<div class="col-4">
					<div id="dt_prediksi" style="color: #DC3545;text-align: center;"></div>
				</div>
			</div>
		</div>
	<div class="card" style="border-radius: 0px">
		<div class="card-header">
			<i class="fa fa-eye"></i>&nbsp;&nbsp;<label>Hasil
				<?php if ($_GET['pre']=='data_latih') {
					echo "Import Data Latih";
				}
				elseif($_GET['pre']=='data_uji'){
					echo "Import Data Uji";
				}
				elseif($_GET['pre']=='data_prediksi'){
					echo "Import Data Prediksi";
				}
				?>
			</label>
			</div>
			<div class="card-body" id="konten">
				<table class="table table-striped table-bordered table-responsive" id="myTable" style="text-align: center;">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Jen.Kel</th>
							<th>SKS1</th>
							<th>SKS2</th>
							<th>SKS3</th>
							<th>SKS4</th>
							<th>IPK1</th>
							<th>IPK2</th>
							<th>IPK3</th>
							<th>IPK4</th>
							<th>KETERANGAN</th>
						</tr>
					</thead>
					<tbody id="isi">
					<?php 
					include '../config/koneksi.php';
					$view=$_GET['pre'];
					$no=1;
					$data = mysqli_query($koneksi,"SELECT*FROM ".$view."");
					foreach ($data as $key => $value):
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $value['nim']; ?></td>
							<td><?php echo $value['jenkel']; ?></td>
							<td><?php echo $value['sks1']; ?></td>
							<td><?php echo $value['sks2']; ?></td>
							<td><?php echo $value['sks3']; ?></td>
							<td><?php echo $value['sks4']; ?></td>
							<td><?php echo $value['ipk1']; ?></td>
							<td><?php echo $value['ipk2']; ?></td>
							<td><?php echo $value['ipk3']; ?></td>
							<td><?php echo $value['ipk4']; ?></td>
							<td><?php echo $value['keterangan']; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- The download -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Download Template Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="row">
        		<div class="col-md-4">
        			<center><a href="template/data_latih.xls" download style="color: #0E9C58">
  					<i class="fa fa-file fa-5x"></i><br>
  					<label>Data Latih</label>
					</a></center>
        		</div>
        		<div class="col-md-4">
        			<center>
        				<a href="template/data_uji.xls" download style="color: #FBD343">
  					<i class="fa fa-file fa-5x"></i><br>
  					<label>Data Uji</label>
					</a>
        			</center>
        		</div>
        		<div class="col-md-4">
        			<center>
        				<a href="template/data_prediksi.xls" download style="color: #DC4F41">
  					<i class="fa fa-file fa-5x"></i><br>
  					<label>Data Prediksi</label>
					</a>
        			</center>
        		</div>
        	</div>
        </div>        
      </div>
    </div>
  </div>
  


<script type="text/javascript">

	$(document).ready(function(){
		$('#show').click(function() {
			var value = $('input[name=pilih]:checked').val(); 
			$.ajax({
				url:'tampil/tampil_data.php',
				type:'post',
				data:'value='+value,
				success:function(hasil){
					$('#konten').html(hasil);
				}
			})
		});
	});

	$(document).ready(function(){
		$('#add').click(function() {
			var value = $('input[name=pilih]:checked').val(); 
			$.ajax({
				url:'tambah/tambah_data.php',
				type:'post',
				data:'value='+value,
				success:function(hasil){
					$('#konten').html(hasil);
				}
			})
		});
	});
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );

	$(document).ready( function () {
		$("#delete").attr("disabled", true);
		$("#show").attr("disabled", true);
		$("#add").attr("disabled", true);
	} );
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('input:radio[name="pilih"]').change(
			function(){
				if (this.checked) {
					$('#delete').removeAttr("disabled");
					$('#show').removeAttr("disabled");
					$('#add').removeAttr("disabled");
				}
			})
	});

	$(document).ready(function() {
		var info1=$("#dt_latih");
		$.ajax({
			url:'info/info_dt_latih.php',
			success:function(hasil1) {
				info1.html(hasil1);
			}
		});
	});

	$(document).ready(function() {
		var info2=$("#dt_uji");
		$.ajax({
			url:'info/info_dt_uji.php',
			success:function(hasil2) {
				info2.html(hasil2);
			}
		});
	});

	$(document).ready(function() {
		var info3=$("#dt_prediksi");
		$.ajax({
			url:'info/info_dt_prediksi.php',
			success:function(hasil3) {
				info3.html(hasil3);
			}
		});
	});

</script>

<script type="text/javascript">
	function confirmDelete() {
		var tipe=$("input[name='pilih']:checked").val();
		var info1=$("#dt_latih");
		var info2=$("#dt_uji");
		var info3=$("#dt_prediksi");
		Swal.fire({
			title: 'Yakin Hapus '+tipe+'?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url:'delete/delete_dt.php',
					type:'POST',
					data:'tipe='+tipe,
					success:function(hasil){					
						Swal.fire(
							tipe+' Berhasil Dihapus',
							'',
							'success'
							);

						if (tipe=='data_latih') {
							info1.html(hasil);
							$("#konten").html(tipe+' telah dihapus');
						}
						else if (tipe=='data_uji') {
							info2.html(hasil);
							$("#konten").html(tipe+' telah dihapus');
						}
						else{
							info3.html(hasil);
							$("#konten").html(tipe+' telah dihapus');
						}
					}
				});
			}
		})
	}
</script>