<?php 
include '../../config/koneksi.php';
?>

<table class="table table-striped table-bordered table-responsive" id="myTable" style="text-align: center;" >
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
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include '../../config/koneksi.php';
		$view=$_POST['value'];
		$no=1;
		$data = mysqli_query($koneksi,"SELECT*FROM ".$view.""); 
		if ($view!='data_prediksi') { ?>
			<?php foreach ($data as $key => $value): ?>
				<tr id="<?php echo $value['id'] ?>">
					<td><?php echo $no++; ?></td>
					<td id="data_nim"><?php echo $value['nim']; ?></td>
					<td id="data_jenkel"><?php echo $value['jenkel']; ?></td>
					<td id="data_sks1"><?php echo $value['sks1']; ?></td>
					<td id="data_sks2"><?php echo $value['sks2']; ?></td>
					<td id="data_sks3"><?php echo $value['sks3']; ?></td>
					<td id="data_sks4"><?php echo $value['sks4']; ?></td>
					<td id="data_ipk1"><?php echo $value['ipk1']; ?></td>
					<td id="data_ipk2"><?php echo $value['ipk2']; ?></td>
					<td id="data_ipk3"><?php echo $value['ipk3']; ?></td>
					<td id="data_ipk4"><?php echo $value['ipk4']; ?></td>
					<td id="data_keterangan"><?php echo $value['keterangan']; ?></td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" id="edit1" data-role="update" data-id="<?php echo $value['id']; ?>" style="color: white" class="btn btn-warning btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
							<button id="delete1" type="button" data-id="<?php echo $value['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		<?php } else {?>
			<?php foreach ($data as $key => $value): ?>
				<tr id="<?php echo $value['id'] ?>">
					<td><?php echo $no++; ?></td>
					<td id="data_nim"><?php echo $value['nim']; ?></td>
					<td id="data_jenkel"><?php echo $value['jenkel']; ?></td>
					<td id="data_sks1"><?php echo $value['sks1']; ?></td>
					<td id="data_sks2"><?php echo $value['sks2']; ?></td>
					<td id="data_sks3"><?php echo $value['sks3']; ?></td>
					<td id="data_sks4"><?php echo $value['sks4']; ?></td>
					<td id="data_ipk1"><?php echo $value['ipk1']; ?></td>
					<td id="data_ipk2"><?php echo $value['ipk2']; ?></td>
					<td id="data_ipk3"><?php echo $value['ipk3']; ?></td>
					<td id="data_ipk4"><?php echo $value['ipk4']; ?></td>
					<td id="data_keterangan"><?php echo 'N/A' ?></td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" id="edit1" data-role="update" data-id="<?php echo $value['id']; ?>" style="color: white" class="btn btn-warning btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
							<button id="delete1" type="button" data-id="<?php echo $value['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		<?php } ?>
	</tbody>
</table>

<input type="hidden" id="pilihdata" value="<?php echo $_POST['value']; ?>">

<!-- Modal update-->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="nim" id="nim" class="form-control">
				</div>
				<div class="form-group">
					<select class="form-control" id="jenkel">
						<option value="" disabled selected>Pilih Jenis Kelamin</option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="input-group mb-3">
  							<input type="text" name="sks1" id="sks1" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">SKS 1</span>
 							 	</div>
						</div>
						<div class="input-group mb-3">
  							<input type="text" name="sks2" id="sks2" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">SKS 2</span>
 							 	</div>
						</div>
						<div class="input-group mb-3">
  							<input type="text" name="sks3" id="sks3" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">SKS 3</span>
 							 	</div>
						</div>
						<div class="input-group mb-3">
  							<input type="text" name="sks4" id="sks4" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">SKS 4</span>
 							 	</div>
						</div>
				
					</div>
					<div class="col-md-6">
						<div class="input-group mb-3">
  							<input type="text" name="ipk1" id="ipk1" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">IPK 1</span>
 							 	</div>
						</div>
						<div class="input-group mb-3">
  							<input type="text" name="ipk2" id="ipk2" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">IPK 2</span>
 							 	</div>
						</div>
						<div class="input-group mb-3">
  							<input type="text" name="ipk3" id="ipk3" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">IPK 3</span>
 							 	</div>
						</div>
						<div class="input-group mb-3">
  							<input type="text" name="ipk4" id="ipk4" class="form-control">
  								<div class="input-group-append">
  								  <span class="input-group-text" id="basic-addon2">IPK 4</span>
 							 	</div>
						</div>
						</div>
						</div>
					<?php if ($_POST['value']=='data_latih' || $_POST['value']=='data_uji'): ?>
					<div class="form-group">
					<select class="form-control" id="ket">
						<option value="" disabled selected>Pilih Keterangan</option>
						<option value="TEPAT">TEPAT</option>
						<option value="TERLAMBAT">TERLAMBAT</option>
					</select>
				</div>
					<?php endif ?>
				<input type="hidden" id="id_mhs">
				<input type="hidden" id="plh">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="save">Simpan</button>
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="mymodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="nim_delete" id="nim_delete" class="form-control">
				</div>
				<input type="hidden" id="id_mhs_delete">
				<input type="hidden" id="plh_delete">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="hapus">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	});

	$(document).ready(function(){
		$(document).on('click','#edit1',function(){

			var pilih = $('#pilihdata').val();
			var id = $(this).data('id');
			var nim = $('#'+id).children('#data_nim').text();
			var jenkel = $('#'+id).children('#data_jenkel').text();
			var sks1 = $('#'+id).children('#data_sks1').text();
			var sks2 = $('#'+id).children('#data_sks2').text();
			var sks3 = $('#'+id).children('#data_sks3').text();
			var sks4 = $('#'+id).children('#data_sks4').text();
			var ipk1 = $('#'+id).children('#data_ipk1').text();
			var ipk2 = $('#'+id).children('#data_ipk2').text();
			var ipk3 = $('#'+id).children('#data_ipk3').text();
			var ipk4 = $('#'+id).children('#data_ipk4').text();
			var keterangan = $('#'+id).children('#data_keterangan').text();
		
			$('#plh').val(pilih);
			$('#id_mhs').val(id);
			$('#nim').val(nim);
			$('#jenkel').val(jenkel);
			$('#sks1').val(sks1);
			$('#sks2').val(sks2);
			$('#sks3').val(sks3);
			$('#sks4').val(sks4);
			$('#ipk1').val(ipk1);
			$('#ipk2').val(ipk2);
			$('#ipk3').val(ipk3);
			$('#ipk4').val(ipk4);
			$("#ket").val(keterangan);
			$('#mymodal').modal('toggle');

			//save
			$('#save').click(function(){
				var dt = $('#plh').val();
				var id_mhs = $('#id_mhs').val();
				var nim = $('#nim').val();
				var jenkel = $('#jenkel').val();
				var sks1 = $('#sks1').val();
				var sks2 = $('#sks2').val();
				var sks3 = $('#sks3').val();
				var sks4 = $('#sks4').val();
				var ipk1 = $('#ipk1').val();
				var ipk2 = $('#ipk2').val();
				var ipk3 = $('#ipk3').val();
				var ipk4 = $('#ipk4').val();
				var keterangan = $('#ket').val();
				var pilih = $('#pilih').val();

				$.ajax({
					url:'tampil/update.php',
					type:'POST',
					data: {id_mhs : id_mhs,nim:nim,jenkel:jenkel,sks1:sks1,sks2:sks2,sks3:sks3,sks4:sks4,ipk1:ipk1,ipk2:ipk2,ipk3:ipk3,ipk4:ipk4,keterangan:keterangan, dt:dt},
					success:function(response) {
						$('#'+id).children('#data_nim').text(nim);
						$('#'+id).children('#data_jenkel').text(jenkel);
						$('#'+id).children('#data_sks1').text(sks1);
						$('#'+id).children('#data_sks2').text(sks2);
						$('#'+id).children('#data_sks3').text(sks3);
						$('#'+id).children('#data_sks4').text(sks4);
						$('#'+id).children('#data_ipk1').text(ipk1);
						$('#'+id).children('#data_ipk2').text(ipk2);
						$('#'+id).children('#data_ipk3').text(ipk3);
						$('#'+id).children('#data_ipk4').text(ipk4);
						$('#'+id).children('#data_keterangan').text(keterangan);

						$('#mymodal').modal('hide');
					}
				})
			})

		})
	});

	$(document).ready(function(){
		$(document).on('click','#delete1',function(){

			var pilih = $('#pilihdata').val();
			var id = $(this).data('id');
			var nim = $('#'+id).children('#data_nim').text();
			$('#plh').val(pilih);
			$('#id_mhs').val(id);
			$('#nim_delete').val(nim);

			$('#mymodal1').modal('toggle');

			//hapus
			$('#hapus').click(function(){
				var dt = $('#plh').val();
				var id_mhs = $('#id_mhs').val();

				$.ajax({
					url:'delete/delete.php',
					type:'POST',
					data: {id_mhs : id_mhs, dt : dt},
					success:function(response) {
						$('#'+id).remove();
						$('#mymodal1').modal('hide');
					}
				})
			})

		})
	});

</script>