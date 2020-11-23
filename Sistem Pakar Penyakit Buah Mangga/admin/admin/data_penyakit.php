<div class="container">
	<h2 class="mb-5">Data Penyakit</h2>
	<button type="button" id="tambah" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Tambah Penyakit</button>
	<hr>
	<table class="table table-bordered table-striped" id="myTable">
		<thead class="thead-light">
			<tr align="center">
				<th scope="col" style="width: 20px">No</th>
				<th scope="col" style="width: 100px">ID Penyakit</th>
				<th scope="col" style="width: 100px">Nama Penyakit</th>
				<th scope="col" style="width: 70px">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $petunjuk = mysqli_query($koneksi,"SELECT*FROM penyakit"); ?>
			<?php foreach ($petunjuk as $key => $value): ?>
				<tr align="center">
					<td><?php echo $key+=1; ?></td>
					<td>
						<a class="js-scroll-trigger" href="#detail_penyakit_x" style="color: black"><?php echo $value['id_penyakit'] ?></a>
					</td>
					<td>
						<a class="js-scroll-trigger" href="#detail_penyakit_x" style="color: black"><?php echo $value['nama_penyakit'] ?></a>
					</td>
					<td>
						<a href="#detail" class="btn btn-primary btn-sm" id="dt_penyakit" data-role="detail_penyakit" data-id="<?php echo $value['id_penyakit'] ?>"><i class="fa fa-eye"></i>&nbsp;Detail</a>

						<button type="button" class="btn btn-warning btn-sm" id="edit_penyakit" data-role="edit_penyakit" data-id="<?php echo $value['id_penyakit'] ?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>

						<button type="button" class="btn btn-danger btn-sm" id="delete_penyakit" data-role="delete_penyakit" data-id="<?php echo $value['id_penyakit'] ?>"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
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
			<div class="modal-body">
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
					<input type="text" name="penyakit" id="pen" class="form-control" value="">
				</div>
				<br>
				<textarea class="form-control" name="definisi" id="def"></textarea>
				<br>
				<textarea class="form-control" name="solusi" id="sol"></textarea>
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
		})

		$(document).on('click','a[data-role=detail_penyakit]',function(){
			var id = $(this).data('id');

			$.post('proses/detail_penyakit.php', { id: id },  function(data, status) {
				$('#detail').html(data);
			});

		});


		$(document).on('click','button[data-role=edit_penyakit]',function(){
			var id = $(this).data('id');

			$.post('proses/select_penyakit.php', { id: id },  function(data, status) {
				$('.modal-body').html(data);
			});

			$("#myModal").modal('toggle');

		});

		$('#simpan').on('click',function(){

			var id = $('#kode').val();
			var nama = $('#penyakit').val();
			var definisi = $('#definisi').val();
			var solusi = $('#solusi').val();

			$.ajax({
				url:'proses/edit_penyakit.php',
				type:'POST',
				data:{id:id,nama:nama,definisi:definisi,solusi:solusi},
				success:function(hasil){

					if (hasil=="berhasil") {
						swal({
							title: "Edit Berhasil",
							type: "success",
							showConfirmButton: true,
						}).then(function() {
							location.reload();

						})

					}else{
						Swal.fire({
							title: 'Edit Gagal',
							type: 'error',
							confirmButtonText: `Ok`,
						})
					}
				}
			})
		});

		$('#simpan1').on('click',function(){

			var nama = $('#pen').val();
			var definisi = $('#def').val();
			var solusi = $('#sol').val();

			$.ajax({
				url:'proses/tambah_penyakit.php',
				type:'POST',
				data:{nama:nama,definisi:definisi,solusi:solusi},
				success:function(hasil){

					console.log(hasil);

					if (hasil=="berhasil") {
						swal({
							title: "Edit Berhasil",
							type: "success",
							showConfirmButton: true,
						}).then(function() {
							location.reload();

						})

					}else{
						Swal.fire({
							title: 'Edit Gagal',
							type: 'error',
							confirmButtonText: `Ok`,
						})
					}
				}
			})
		});
		$(document).on('click','button[data-role=delete_penyakit]',function(){
			var id = $(this).data('id');
			$.ajax({
				url:'proses/delete_penyakit.php',
				type:'POST',
				data:{id:id},
				success:function(hasil){
					if (hasil=="berhasil") {
						swal({
							title: "Delete Berhasil",
							type: "success",
							showConfirmButton: true,
						}).then(function() {
							location.reload();

						})

					}else{
						Swal.fire({
							title: 'Gagal Hapus Data',
							type: 'error',
							confirmButtonText: `Ok`,
						})
					}
				}
			})

		});

	})

	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>


</div>