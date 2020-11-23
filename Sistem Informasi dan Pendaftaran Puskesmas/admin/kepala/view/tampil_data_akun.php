<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Hak Akses</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM login INNER JOIN hak_akses ON login.posisi = hak_akses.id_hak_akses") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr id="<?php echo $value['id_login'] ?>">
				<td><?php echo $key+1; ?></td>
				<td data-target="nama"><?php echo $value['nama'] ?></td>
				<td data-target="username"><?php echo $value['username'] ?></td>
				<td data-target="password"><?php echo $value['password'] ?></td>
				<td data-target="akses"><?php echo $value['nama_hak_akses'] ?></td>
				<td>
					<button type="button" id="edit" class="btn btn-sm btn-warning" data-role="update" data-id="<?php echo $value['id_login'] ?>">Edit</button>
					<button type="button" id="delete" class="btn btn-sm btn-danger" data-role="delete" data-id="<?php echo $value['id_login'] ?>">Delete</button>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Akun</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_akun" class="form-control" autocomplete="off">
				Nama
				<input type="text" id="nama" class="form-control" autocomplete="off"><br>
				Username
				<input type="text" id="username" class="form-control" autocomplete="off"><br>
				Password
				<input type="text" id="password" class="form-control" autocomplete="off"><br>
				Hak Akses
				<select id="akses" class="form-control">
					<option disabled>Pilih Hak Akses</option>
					<option dbs='1' value="admin">Admin</option>
					<option dbs='4' value="kepala">Kepala</option>
					<option dbs='2' value="pemanggil_antrian_umum">Pemanggil BP Umum</option>
					<option dbs='3' value="pemanggil_antrian_gigi">Pemanggil BP Gigi</option>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 10px">Close</button>
				<button type="button" class="btn btn-success" id="simpan" style="margin-bottom: 10px">Update</button>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('.myTable').DataTable();

		$(document).on('click','button[data-role=update]',function(){
			var id = $(this).data('id');
			var nama = $('#'+id).children('td[data-target=nama]').text();
			var username = $('#'+id).children('td[data-target=username]').text();
			var password = $('#'+id).children('td[data-target=password]').text();
			var hak_akses = $('#'+id).children('td[data-target=akses]').text();

			$('#id_akun').val(id);
			$('#nama').val(nama);
			$('#username').val(username);
			$('#password').val(password);
			$('#akses').val(hak_akses);
			$('#myModal').modal('toggle');
		});

		$(document).on('click','button[data-role=delete]',function(){
			var id = $(this).data('id');
			swal({
				title: "Hapus Akun Ini?",
				text: "Akun akan terhapus dari database",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url:'proses/delete_akun.php',
						type:'POST',
						data:{id:id},
						success:function(response){
							swal("Hapus Berhasil", "Data akun telah terhapus", "success");
							$('#'+id).remove();
						},
						error:function(response){
							swal("Hapus Gagal", "Data akun tidak terhapus", "error");
						}
					})
				} else {
					
				}
			});
		});

		$('#simpan').click(function(){
			var id = $('#id_akun').val();
			var nama = $('#nama').val();
			var username = $('#username').val();
			var password = $('#password').val();
			var hak_akses = $('#akses option:selected').attr('dbs');
			var akses_text = $('#akses').val();
			$.ajax({
				url:'proses/update_akun.php',
				type:'POST',
				data:{id:id,nama:nama,user:username,pass:password,akses:hak_akses},
				success:function(response){
					$('#'+id).children('td[data-target=nama]').text(nama);
					$('#'+id).children('td[data-target=username]').text(username);
					$('#'+id).children('td[data-target=password]').text(password);
					$('#'+id).children('td[data-target=akses]').text(akses_text);
					swal({
						title: "Update Berhasil",
						text: "Data akun Terupdate",
						icon: "success",
						button: "OK!",
					}).then((value) => {
						$('#myModal').modal('toggle');
					});
					
				},
				error:function(response){
					swal("Update Gagal", "Data akun tidak Terupdate", "error");
				}
			})
		})
	})


</script>