<div class="container">
	<h2 class="mb-5">Data Gejala</h2>
	<button type="button" id="tambah" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Tambah Gejala</button>
	<hr>
	<table class="table table-bordered table-striped" id="myTable">
		<thead class="thead-light">
			<tr align="center">
				<th scope="col" style="width: 20px">No</th>
				<th scope="col" style="width: 100px">ID Gejala</th>
				<th scope="col" style="width: 100px">Nama Gejala</th>
				<th scope="col" style="width: 130px">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $petunjuk = mysqli_query($koneksi,"SELECT*FROM gejala"); ?>
			<?php foreach ($petunjuk as $key => $value): ?>
				<tr align="center">
					<td><?php echo $key+=1; ?></td>
					<td>
						<?php echo $value['id_gejala'] ?>
					</td>					
					<td>
						<?php echo $value['nama_gejala'] ?>
					</td>
					<td>
						<a href="#detail" class="btn btn-primary btn-sm" id="dt_gejala" data-role="detail_gejala" data-id="<?php echo $value['id_gejala'] ?>"><i class="fa fa-eye"></i>&nbsp;Detail</a>

						<button type="button" class="btn btn-warning btn-sm" id="edit_gejala" data-role="edit_gejala" data-id="<?php echo $value['id_gejala'] ?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>

						<button type="button" class="btn btn-danger btn-sm" id="delete_gejala" data-role="delete_gejala" data-id="<?php echo $value['id_gejala'] ?>"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div id="detail" style="margin-top: 50px">
		<?php 
		if (!isset($_POST['id'])) {

		}
		?>

	</div>

</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Data Penyakit</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body sx">
				Modal body..
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="simpan" id="simpan">Simpan</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
				<h4 class="modal-title">Data Penyakit</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-groub">
					<input type="text" name="gejala" id="gejala" class="form-control" value="">
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="simpan1" id="simpan1">Simpan</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){

		$('#tambah').on('click',function(){
			$("#myModal1").modal('toggle');
		});


		$('#simpan1').click(function(){
			var gejala = $('#gejala').val();

			$.ajax({
				url:'proses/tambah_gejala.php',
				type:'POST',
				data:{gejala:gejala},
				success:function(hasil){
					console.log(hasil);
					
					swal({
						title: "Simpan Berhasil",
						type: "success",
						showConfirmButton: true,
					}).then(function() {
						location.reload();

					})
					
				}
			})
		})


		$(document).on('click','button[data-role=delete_gejala]',function(){
			var id = $(this).data('id');

			$.ajax({
				url:'proses/delete_gejala.php',
				type:'POST',
				data:{id:id},
				success:function(hasil){
					//console.log(hasil);
					if (true) {
						swal({
							title: "Delete Berhasil",
							type: "success",
							showConfirmButton: true,
						}).then(function() {
							location.reload();

						})
					}else{
						swal({
							title: "Delete Gagal",
							type: "success",
							showConfirmButton: true,
						})
					}
					
				}
			})
		})

		$(document).on('click','button[data-role=edit_gejala]',function(){

			var id = $(this).data('id');

			$.post('proses/select_gejala.php', { id:id },  function(data, status) {
				$('.sx').html(data);
			});

			$('#myModal').modal('toggle');

		})

		$('#simpan').on('click',function(){
			var id = $('#kode').val();
			var nama = $("#gejala").val();

			$.ajax({
				url:'proses/edit_gejala.php',
				type:'POST',
				data:{id:id,nama:nama},
				success:function(hasil){
					//console.log(hasil);
					if (true) {
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
							type: "success",
							showConfirmButton: true,
						})
					}
					
				}
			})
		})

	});

	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>


</div>