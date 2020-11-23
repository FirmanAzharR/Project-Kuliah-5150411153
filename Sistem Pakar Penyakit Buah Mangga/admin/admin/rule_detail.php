<div class="container">
	<h2 class="mb-5">Rule Detail</h2>
	<button type="button" id="tambah" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Tambah Rule Detail</button>
	<hr>

	<table id="myTable" class="table table-bordered">
		<thead>
			<tr>
				<th scope="col" style="width: 50px">ID</th>
				<th scope="col" style="width: 50px">ID Rule</th>
				<th scope="col" style="width: 100px">ID Gejala</th>
				<th scope="col" style="width: 100px">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $rule_detail = mysqli_query($koneksi,"SELECT * FROM rule_detail"); ?>
			<?php foreach ($rule_detail as $key => $value): ?>
				<tr>
					<td><?php echo $value['id'] ?></td>
					<td><?php echo $value['id_rule'] ?></td>
					<td><?php echo $value['id_gejala'] ?></td>
					<td>
						<a href="#detail" class="btn btn-primary btn-sm" id="dt_rule" data-role="detail_rule" data-id="<?php echo $value['id'] ?>"><i class="fa fa-eye"></i>&nbsp;Detail</a>

						<button type="button" class="btn btn-warning btn-sm" id="edit_rule" data-role="edit_rule" data-id="<?php echo $value['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>

						<button type="button" class="btn btn-danger btn-sm" id="delete_rule" data-role="delete_rule" data-id="<?php echo $value['id'] ?>"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>

<div class="modal fade" id="myModal-tambah">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Rule</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<select class="form-control" id="id_rule">
					<?php $variable = mysqli_query($koneksi,"SELECT*FROM rule") ?>
					<?php foreach ($variable as $key => $value): ?>
						<option value="<?php echo $value['id_rule'] ?>"><?php echo $value['nama_rule']; ?></option>
					<?php endforeach ?>
				</select>
				<br>
				<select class="form-control" id="id_gejala">
					<?php $variables = mysqli_query($koneksi,"SELECT*FROM gejala") ?>
					<?php foreach ($variables as $key => $value): ?>
						<option value="<?php echo $value['id_gejala'] ?>">(&nbsp;<?php echo $value['id_gejala'] ?>&nbsp;) - <?php echo $value['nama_gejala']; ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="simpan2" class="btn btn-success">Simpan</button>
			</div>

		</div>
	</div>
</div>


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

	$('#tambah').click(function(){
		$('#myModal-tambah').modal('toggle');
	});

	$('#tambah').click(function(){
		$('#myModal-tambah').modal('toggle');
	});

	$('#simpan2').click(function(){
		
		var id_rule = $('#id_rule').val();
		var id_gejala = $('#id_gejala').val();

		$.ajax({
			url:'proses/tambah_detail_rule.php',
			type:'post',
			data:{id_rule:id_rule,id_gejala:id_gejala},
			success:function(hasil){
				if (hasil) {
					swal({
						title: "Detail Rule Tersimpan",
						type: "success",
						showConfirmButton: true,
					}).then(function() {
						location.reload();

					})
				}else{
					swal({
						title: "Tambah Detail Rule Gagal",
						type: "error",
						showConfirmButton: true,
					})
				}
			}
		})
	})

	$(document).on('click','button[data-role=edit_rule]',function(){
		var id = $(this).data('id');

		$.post('proses/select_detail_rule.php', { id: id },  function(data, status) {
			$('.x').html(data);
		});

		$("#myModal1").modal('toggle');

	});

	$(document).on('click','button[data-role=delete_rule]',function(){
		var id = $(this).data('id');

		$.post('proses/delete_rule_detail.php', { id: id },  function(data, status) {
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
		
		var id_rule = $('#id_rule_x').val();
		var id_gejala = $('#id_gejala_x').val();
		var id = $('#kode').val();

		$.ajax({
			url:'proses/edit_detail_rule.php',
			type:'post',
			data:{id:id,id_rule:id_rule,id_gejala:id_gejala},
			success:function(hasil){
				if (hasil) {
					swal({
						title: "Edit Detail Rule Tersimpan",
						type: "success",
						showConfirmButton: true,
					}).then(function() {
						location.reload();

					})
				}else{
					swal({
						title: "Edit Detail Rule Gagal",
						type: "error",
						showConfirmButton: true,
					})
				}
			}
		})
	})

</script>
