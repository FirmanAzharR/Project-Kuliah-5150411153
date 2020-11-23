<div class="container">
	<h2 class="mb-5">Data Rule</h2>
	<button type="button" id="tambah" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Tambah Rule</button>
	<hr>

	<table class="table table-bordered table-striped" id="myTable">
		<thead class="thead-light">
			<tr align="center">
				<th scope="col" style="width: 20px">ID Rule</th>
				<th scope="col" style="width: 50px">ID Penyakit</th>
				<th scope="col" style="width: 100px">Nama Rule</th>
				<th scope="col" style="width: 50px">CF Pakar</th>
				<th scope="col" style="width: 70px">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $rule = mysqli_query($koneksi,"SELECT * FROM rule"); ?>
			<?php foreach ($rule as $key => $value): ?>
				<tr>
					<td><?php echo $value['id_rule'] ?></td>
					<td><?php echo $value['id_penyakit'] ?></td>
					<td><?php echo $value['nama_rule'] ?></td>
					<td><?php echo $value['cf_pakar'] ?></td>

					<td>
						<button class="btn btn-primary btn-sm" id="dt_rule" data-role="detail_rule" data-id="<?php echo $value['id_rule'] ?>"><i class="fa fa-eye"></i>&nbsp;Detail</button>

						<button type="button" class="btn btn-warning btn-sm" id="edit_rule" data-role="edit_rule" data-id="<?php echo $value['id_rule'] ?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>

						<button type="button" class="btn btn-danger btn-sm" id="delete_rule" data-role="delete_rule" data-id="<?php echo $value['id_rule'] ?>"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Data Rule</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body detail">
				Modal body..
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal-tambah">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Rule</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body tambah">
				<div class="form-groub">
					<input type="text" name="rule" id="rule" class="form-control" value="">
				</div>
				<br>
				<select class="form-control" id="nama_penyakit">
					<?php $variable = mysqli_query($koneksi,"SELECT*FROM penyakit") ?>
					<?php foreach ($variable as $key => $value): ?>
						<option value="<?php echo $value['id_penyakit'] ?>"><?php echo $value['nama_penyakit']; ?></option>
					<?php endforeach ?>
				</select>
				<br>
				<div class="form-groub">
					<input type="number" name="nilai_cf" id="nilai_cf" class="form-control" value="">
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="simpan2" class="btn btn-success">Simpan</button>
			</div>

		</div>
	</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Data Rule</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body x">
				Modal body..
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="simpan">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>

<script type="text/javascript">
	$(document).on('click','button[data-role=detail_rule]',function(){
		var id = $(this).data('id');

		$.post('proses/detail_rule.php', { id: id },  function(data, status) {
			$('.detail').html(data);
		});

		$("#myModal").modal('toggle');

	});
</script>

<script type="text/javascript">
	$(document).on('click','button[data-role=edit_rule]',function(){
		var id = $(this).data('id');

		$.post('proses/select_rule.php', { id: id },  function(data, status) {
			$('.x').html(data);
		});

		$("#myModal1").modal('toggle');

	});

	$(document).on('click','button[data-role=delete_rule]',function(){
		var id = $(this).data('id');

		$.post('proses/delete_rule.php', { id: id },  function(data, status) {
			swal({
				title: "Delete Berhasil",
				type: "success",
				showConfirmButton: true,
			}).then(function() {
				location.reload();

			})
		});
	});

	$('#simpan').click(function(){
		var id = $('#kode').val();
		var rule = $('#rules').val();
		var penyakit = $('#nama_penyakitx').val();
		var cf = $('#cf_value').val();

	$.ajax({
			url:'proses/edit_rule.php',
			type:'post',
			data:{id:id,rule:rule,penyakit:penyakit,cf:cf},
			success:function(hasil){
				console.log(hasil);
				if (hasil=='berhasil') {

					swal({
						title: "Edit Berhasil",
						type: "success",
						showConfirmButton: true,
					}).then(function() {
						location.reload();

					})
				}else{
					swal({
						title: "Edit Gagal",
						type: "error",
						showConfirmButton: true,
					})
				}
				
			}
		})

	});
</script>

<script type="text/javascript">
	$('#tambah').click(function(){
		$('#myModal-tambah').modal('toggle');
	})

	$('#simpan2').click(function(){
		
		var nama_rule = $('#rule').val();
		var id_penyakit = $('#nama_penyakit').val();
		var cf = $('#nilai_cf').val();

		$.ajax({
			url:'proses/tambah_rule.php',
			type:'post',
			data:{nama_rule:nama_rule,id_penyakit:id_penyakit,cf:cf},
			success:function(hasil){
				if (hasil) {
					swal({
						title: "Rule Tersimpan",
						type: "success",
						showConfirmButton: true,
					}).then(function() {
						location.reload();

					})
				}else{
					swal({
						title: "Tambah Rule Gagal",
						type: "error",
						showConfirmButton: true,
					})
				}
			}
		})

	})
</script>

